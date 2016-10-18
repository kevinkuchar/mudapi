<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['item_name', 'is_complete'];

    /**
     * Relationship
     * @return {ToDoList} The ToDoList that the list item belongs to.
     */
    public function to_do_list()
    {
        return $this->belongsTo('App\Models\ToDoList', 'list_id');
    }

}
