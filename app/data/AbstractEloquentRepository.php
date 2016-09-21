<?php

namespace App\Data;

abstract class AbstractEloquentRepository {
 
    public function all($columns = array('*')) {
        return $this->model->get($columns);
    }
 
}