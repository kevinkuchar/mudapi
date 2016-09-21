<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$container = $app->getContainer();

// Database
$capsule = new Capsule;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Logger
$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler("../logs/app.log");
    $logger->pushHandler($file_handler);
    return $logger;
};

//services
$container['PostService'] = function ($c) {
    return new App\Services\PostService();
};

// controllers
$container['PostController'] = function ($c) {
    $post_service = $c->get('PostService');
    return new App\Controllers\PostController($post_service);
};

$container['ListController'] = function ($c) {
    $repository = new App\Data\ListRepository( new App\Models\ToDoList() );
    return new App\Controllers\ListController($repository);
};