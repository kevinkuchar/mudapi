<?php

namespace App\Data;

use App\Models\ListItem;
use App\Data\RepositoryInterface;
use App\Data\Repository;


class ListItemRepository extends Repository {

    /**
     * Specify Model class name
     * @return mixed
     */
    function model()
    {
        return 'App\Models\ListItem';
    }

    function markComplete($list_item_id) {
        $this->model->where('id', '=', $list_item_id)->update(['is_complete' => 1]);
    }

    function markIncomplete($list_item_id) {
        $this->model->where('id', '=', $list_item_id)->update(['is_complete' => 0]);
    }
}
