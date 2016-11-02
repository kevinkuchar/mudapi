<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\Models\ListItem;
use App\Data\ListRepository;

class ListItemController
{
    protected $list_item_repository;

    public function __construct($list_item_repository) {
        $this->list_item_repository = $list_item_repository;
    }

    /**
     * Route: /api/list/item
     * Add an item to an existing list.
     * @method POST
     * @param list_id
     * @param item_name
     */
    public function addItem(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();

        $expires_on = null;
        if (isset($data['expires_on'])) {
            $expires_on = new \DateTime($data['expires_on']);
            $expires_on = $expires_on->format('Y-m-d');
        }

        $list_item = $this->list_item_repository->create([
            'list_id' => $data['list_id'],
            'item_name' => $data['item_name'],
            'expires_on' => $expires_on
        ]);

        return $response->withJson($list_item, 200);
    }

    /**
     * Route: /api/list/item/complete{id}
     * Pass list_items id to route to update 'is_complete = 1'
     * @method PUT
     */
    public function completeItem(Request $request, Response $response, $args) {
        $list_item_id = (int)$args['id'];
        $this->list_item_repository->markComplete($list_item_id);
    }

    /**
     * Route: /api/list/item/incomplete/{id}
     * Pass list_items id to route to update 'is_complete = 0'
     * @method PUT
     */
    public function incompleteItem(Request $request, Response $response, $args) {
        $list_item_id = (int)$args['id'];
        $this->list_item_repository->markIncomplete($list_item_id);
    }

    /**
     * Route: /api/list/item/{id}
     * Soft delete list_item by id
     * @method DELETE
     */
    public function deleteItem(Request $request, Response $response, $args) {
        $list_item_id = (int)$args['id'];
        $this->list_item_repository->delete($list_item_id);
    }


}
