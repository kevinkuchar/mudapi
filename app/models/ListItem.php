<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    protected $fillable = ['item_name', 'is_complete'];

    /**
    * Get the post that owns the comment.
    */
    public function to_do_list()
    {
        return $this->belongsTo('App\Models\ToDoList', 'list_id');
    }
    
}
