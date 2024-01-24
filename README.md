# Lista de Tareas en PHP con Slim Framework

Este proyecto es una aplicación de lista de tareas simple desarrollada usando el framework Slim 4 de PHP. La aplicación permite a los usuarios añadir, editar y eliminar tareas.

## Requisitos Previos

Para ejecutar esta aplicación, necesitarás tener instalados PHP y Composer en tu sistema. Puedes descargarlos e instalarlos desde los siguientes enlaces:

- PHP: https://www.php.net/downloads.php
- Composer: https://getcomposer.org/download/

## Instalación

Una vez que hayas clonado o descargado el proyecto, navega al directorio del proyecto en tu terminal y ejecuta el siguiente comando para instalar las dependencias:

```bash
composer install
```

Este comando descargará e instalará todas las dependencias necesarias para el proyecto.

## Ejecutando la Aplicación

Para iniciar el servidor de desarrollo, ejecuta el siguiente comando en tu terminal:

```bash
php -S localhost:8080
```

Esto iniciará un servidor de desarrollo local en `http://localhost:8080`. Ahora puedes abrir tu navegador y acceder a la aplicación en esa URL.

## Funcionalidades

La aplicación permite realizar las siguientes acciones:

- Añadir nuevas tareas.
- Editar tareas existentes.
- Eliminar tareas.

## Estructura del Proyecto

El proyecto sigue la estructura típica de una aplicación Slim 4, con plantillas Twig para el frontend y lógica de servidor en PHP.

- `templates/`: Contiene las plantillas Twig para la interfaz de usuario.
- `public/index.php`: Archivo principal que inicia la aplicación.
- `composer.json`: Define las dependencias del proyecto.

## Contribuir

Si deseas contribuir a este proyecto, sientete libre de hacer un fork y enviar tus pull requests.

---

Hecho con ❤️ y PHP
