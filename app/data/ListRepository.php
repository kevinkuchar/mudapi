<?php

namespace App\Data;

use App\Models\ToDoList;

class ListRepository extends AbstractEloquentRepository {
 
  /**
   * @var Model
   */
  protected $model;
 
  /**
   * Constructor
   */
  public function __construct(ToDoList $model)
  {
    $this->model = $model;
  }
 
}