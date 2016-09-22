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

/**
 * Create an instance of repositories and store them in DI Container 
 * for use in dependency injection
 */
$container['ListRepository'] = function ($c) {
    return new App\Data\ListRepository();
};

$container['ListItemRepository'] = function ($c) {
    return new App\Data\ListItemRepository();
};

/**
 * Create an instance of controllers and inject their dependencies
 * from the DI Container;
 */
$container['ListController'] = function ($c) {
    $repository = $c->get('ListRepository');
    return new App\Controllers\ListController($repository);
};