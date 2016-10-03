<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToDoList extends Model
{
    /**
    * The table associated with the model.
    * @var string
    */
    protected $table = 'lists';

    /**
    * The attributes that are mass assignable.
    * @var array
    */
    protected $fillable = ['list_name'];

    /**
     * Relationship
     * @return {ListItem} ListItems related to the list. 
     */
    public function items()
    {
        return $this->hasMany('App\Models\ListItem', 'list_id');
    }
}