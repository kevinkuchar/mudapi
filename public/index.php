<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Controllers;

require '../vendor/autoload.php';

$config = [
    'determineRouteBeforeAppMiddleware' => false,
    'displayErrorDetails' => true,
    'addContentLengthHeader' => false,
    'db' => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'mud',
        'username' => 'root',
        'password' => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]
];

spl_autoload_register(function ($classname) {
    require ("../" . $classname . ".php");
});

$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();

$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};

$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$container['PostController'] = function ($c) {
    $table = $c->get('db')->table('posts');
    return new Controllers\PostController($table);
};

require("../app/routes.php");

$app->run();