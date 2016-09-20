<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models;

/**
 * List API Routes
 */
$app->group('/api/list', function () {
    $this->get('', 'ListController:getAll');
    $this->get('/{id}', 'ListController:getById');
    $this->post('', 'ListController:createList');
    $this->put('/{id}', 'ListController:updateList');
    $this->delete('/{id}', 'ListController:deleteList');
});

/**
 * Posts API
 */
$app->get('/api/post', 'PostController:getAllPosts');
$app->get('/api/post/{id}', 'PostController:getPostById');
$app->post('/api/post', 'PostController:createPost');
$app->post('/api/post/{id}', 'PostController:editPost');