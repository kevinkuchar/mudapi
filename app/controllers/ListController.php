<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\Models\ToDoList;

class ListController
{
    public function __construct() { }
    
    public function getAll(Request $request, Response $response, $args)
    {
        $data = ToDoList::all();
        return $response->withJson($data, 200);
    }

    public function getById(Request $request, Response $response, $args) {
        $list_id = (int)$args['id'];
        $data = ToDoList::with('items')->get()->find($list_id);

        return $response->withJson($data, 200);
    }

    public function createList(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();

        $list = ToDoList::create([
            'list_name' => $data['list_name'],
        ]);
        
        return $response->withJson($list, 200);
    }

    public function updateList(Request $request, Response $response, $args) {
        $list_id = (int)$args['id'];
        $data = $request->getParsedBody();

        $list = ToDoList::find($list_id);
        $list->list_name = $data['list_name'];
        $list-save();
    }

    public function deleteList(Request $request, Response $response, $args) {
        $list_id = (int)$args['id'];
        $list = ToDoList::find($list_id);
        $list->delete();
    }
}