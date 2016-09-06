<?php

namespace App\Services;

use App\Models;

class PostService
{    
    public function GetList()
    {
        $post = Models\Post::all();
        return $post;
    }
    
    public function GetById($post_id)
    {
        $post = Models\Post::find($post_id);
        return $post;
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