<?php

namespace App\Services;

use App\Models;

class PostService
{
    protected $table;

    public function __construct()
    {
        
    }
    
    public function GetList()
    {
        $data = Models\Post::all();
        return $data;
    }
    
    public function GetById($post_id)
    {
        $data = Models\Post::find($post_id);
        return $data;
    }
    
    public function Edit($post_id, $data)
    {
        $post = $this->GetById($post_id);
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->save();

        return $post;
    }

    public function Add($data)
    {
        $post = Models\Post::create([
            'title'   => $data['title'],
            'content' => $data['content']
        ]);
        
        return $post;
    }
}