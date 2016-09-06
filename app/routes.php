<?php
//Web Route
$app->get('/', function ($request, $response, $args) {
    $data = ["name" => "Kevin!"];
    return $this->renderer->render($response, "index.php", $data);
});

//API Routes
$app->get('/api/post', 'PostController:getAllPosts');
$app->get('/api/post/{id}', 'PostController:getPostById');
$app->post('/api/post', 'PostController:createPost');
$app->post('/api/post/{id}', 'PostController:editPost');
