<?php
// DIC configuration

use App\Controllers;
use App\Services;

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

//services
$container['PostService'] = function ($c) {
    $table = $c->get('db')->table('posts');
    return new Services\PostService($table);
};


// controllers
$container['PostController'] = function ($c) {
    $post_service = $c->get('PostService');
    return new Controllers\PostController($post_service);
};
