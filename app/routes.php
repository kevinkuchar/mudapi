<?php
//Routes

$app->get('/post', 'PostController:getAll');
$app->post('/post', 'PostController:createPost');
$app->get('/post/{id}', 'PostController:getById');
