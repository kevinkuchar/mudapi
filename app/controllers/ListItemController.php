<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\Models\ListItem;

class ListItemController
{
    public function __construct() { }
    
    /**
     * Adds a list item to a list current list via POST request.
     * POST params are listed below.
     * @param {int} list_id 
     * @param {string} item_name
     * @return {ToDoList}
     */
    public function addItemToList(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();
        $list = $this->list_repository->create([
            'list_name' => $data['list_name'],
        ]);
        
        return $response->withJson($list, 200);
    }

    public function completeItem(Request $request, Response $response, $args) {

    }

    public function deleteItem(Request $request, Response $response, $args) {

    }


}