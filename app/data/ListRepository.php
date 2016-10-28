<?php

namespace App\Data;

use App\Models\ToDoList;

use App\Data\RepositoryInterface;
use App\Data\Repository;

class ListRepository extends Repository {

    /**
     * Specify Model class name
     * @return mixed
     */
    function model()
    {
        return 'App\Models\ToDoList';
    }

    function findById($list_id) {
        return $this->model->with('items')->get()->find($list_id);
    }
}
