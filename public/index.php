<?php

require __DIR__ . '/../vendor/autoload.php';
spl_autoload_register(function ($classname) {
    require __DIR__ . "/../" . $classname . ".php";
});

// Instantiate the app
$settings = require __DIR__ . '/../app/settings.php';
$app = new \Slim\App($settings);

// Register dependencies
require __DIR__ . '/../app/dependencies.php';

// Register routes
require __DIR__ . '/../app/routes.php';

$app->run();