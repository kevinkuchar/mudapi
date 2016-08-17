<?php

namespace App\Services;

use Illuminate\Database\Query\Builder;
use App\Models;

class PostService
{
    protected $table;

    public function __construct(Builder $table)
    {
        $this->table = $table;
    }
    
    public function GetList()
    {
        $data = Models\Post::all();
        return $data;
    }
    
    public function GetById($post_id)
    {
        $post_id = (int)$post_id;
        $data = Models\Post::find($post_id);
        return $data;
    }
    
    public function Add($data)
    {
        $data = Models\Post::create([
            'title'   => filter_var($data['title'], FILTER_SANITIZE_STRING),
            'content' => filter_var($data['content'], FILTER_SANITIZE_STRING)
        ]);
        
        return $data;
    }
}