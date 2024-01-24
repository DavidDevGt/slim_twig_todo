<?php
require __DIR__ . '/vendor/autoload.php';

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Nyholm\Psr7\Factory\Psr17Factory;
use Slim\Psr7\Factory\ServerRequestCreator;

$psr17Factory = new Psr17Factory();
AppFactory::setResponseFactory($psr17Factory);

$app = AppFactory::create();

// Configuration
$twig = Twig::create(__DIR__ . '/templates');
$app->add(TwigMiddleware::create($app, $twig));

// Load tasks
$app->get('/tareas', function (Request $request, Response $response) {
    $tareas = json_decode(file_get_contents(__DIR__ . '/db.json'), true);
    return Twig::fromRequest($request)->render($response, 'tareas.twig', ['tareas' => $tareas]);
});

// Add task
$app->post('/tareas', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $tarea = $data['tarea'] ?? '';
    if (!empty($tarea)) {
        $tareas = json_decode(file_get_contents(__DIR__ . '/db.json'), true);
        $tareas[] = $tarea;
        file_put_contents(__DIR__ . '/db.json', json_encode($tareas));
    }
    return $response->withHeader('Location', '/tareas')->withStatus(302);
});

// Delete task
$app->post('/tareas/{id}', function (Request $request, Response $response, array $args) {
    $id = (int) $args['id'];
    $tareas = json_decode(file_get_contents(__DIR__ . '/db.json'), true);
    if (isset($tareas[$id])) {
        unset($tareas[$id]);
        file_put_contents(__DIR__ . '/db.json', json_encode(array_values($tareas)));
    }
    return $response->withHeader('Location', '/tareas')->withStatus(302);
});

// Edit task
$app->post('/tareas/editar/{id}', function (Request $request, Response $response, array $args) {
    $id = (int) $args['id'];
    $data = $request->getParsedBody();
    $nuevaTarea = $data['tarea'] ?? '';

    $tareas = json_decode(file_get_contents(__DIR__ . '/db.json'), true);
    if (isset($tareas[$id])) {
        $tareas[$id] = $nuevaTarea;
        file_put_contents(__DIR__ . '/db.json', json_encode($tareas));
    }
    return $response->withHeader('Location', '/tareas')->withStatus(302);
});

$app->run();
