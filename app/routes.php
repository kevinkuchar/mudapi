<?php

$app->get('/blog', 'PostController:getAll');
$app->get('/blog/{id}', 'PostController:getById');
$app->post('/blog/add', 'PostController:insert');