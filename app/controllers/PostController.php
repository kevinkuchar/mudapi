<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models;
use App\Services;

class PostController
{
    protected $post_service;

    public function __construct(Services\PostService $post_service)
    {
        $this->post_service = $post_service;
    }
    
    public function getAll(Request $request, Response $response, $args)
    {
        $data = $this->post_service->GetList();
        return $response->withJson($data, 200);
    }
    
    public function getById(Request $request, Response $response, $args)
    {
        $post_id = (int)$args['id'];
        $data = $this->post_service->GetById($post_id);
        return $response->withJson($data, 200);
    }
    
    public function createPost(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();        
       
        $data = Models\Post::create([
            'title'   => filter_var($data['title'], FILTER_SANITIZE_STRING),
            'content' => filter_var($data['content'], FILTER_SANITIZE_STRING)
        ]);
        
        return $response->withJson($data, 201);
    }    
}