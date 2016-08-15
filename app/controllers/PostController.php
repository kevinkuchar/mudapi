<?php

namespace App\Controllers;

use Illuminate\Database\Query\Builder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models;

class PostController
{
    protected $table;

    public function __construct(Builder $table)
    {
        $this->table = $table;
    }
    
    public function getAll(Request $request, Response $response, $args)
    {
        $response = Models\Post::all();
        return json_encode($response);
    }
    
    public function getById(Request $request, Response $response, $args)
    {
        $post_id = (int)$args['id'];
        $response = Models\Post::find($post_id);
        
        if ($response) {
            return json_encode($response);    
        }
        return json_encode([
            "message" => "no results found"
        ]);
    }
    
    public function insert(Request $request, Response $response, $args)
    {
        $data = $request->getParsedBody();        
       
        $response = Models\Post::create([
            'title'   => filter_var($data['title'], FILTER_SANITIZE_STRING),
            'content' => filter_var($data['content'], FILTER_SANITIZE_STRING)
        ]);
        
        return json_encode($response);
    }    
}