<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListItem extends Model
{
    use SoftDeletes;

    protected $fillable = ['list_id', 'item_name', 'is_complete', 'expires_on'];
    protected $dates = ['deleted_at'];

    /**
     * Relationship
     * @return {ToDoList} The ToDoList that the list item belongs to.
     */
    public function to_do_list()
    {
        return $this->belongsTo('App\Models\ToDoList', 'list_id');
    }

}
