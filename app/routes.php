<?php
//Web Route
$app->get('/', function ($request, $response, $args) {
    $data = [
        "name" => "Kevin!"
    ];
    return $this->renderer->render($response, "app.php", $data);
});

//api
$app->get('/post', 'PostController:getAllPosts');
$app->get('/post/{id}', 'PostController:getPostById');
$app->post('/post', 'PostController:createPost');
$app->post('/post/{id}', 'PostController:editPost');

