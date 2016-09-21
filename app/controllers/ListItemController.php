<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\Models\ListItem;

class ListItemController
{
    public function __construct() { }
    

    public function addToList(Request $request, Response $response, $args) {
        $list_id = (int)$args['id'];
        $data = ToDoList::with('items')->get()->find($list_id);

        return $response->withJson($data, 200);
    }

}