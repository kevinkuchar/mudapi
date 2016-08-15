<?php
// DIC configuration

use App\Controllers;

$container = $app->getContainer();

// monolog
$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};

//eloquent database
$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

// controllers
$container['PostController'] = function ($c) {
    $table = $c->get('db')->table('posts');
    return new Controllers\PostController($table);
};
