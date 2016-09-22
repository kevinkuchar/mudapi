<?php

namespace App\Data;

use App\Models\ListItem;

use App\Data\RepositoryInterface;
use App\Data\Repository;
 
class ListRepository extends Repository {
 
    /**
     * Specify Model class name
     * @return mixed
     */
    function model()
    {
        return 'App\Models\ListItem';
    }
}