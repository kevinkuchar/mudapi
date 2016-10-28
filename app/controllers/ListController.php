<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use App\Models\ToDoList;
use App\Data\ListRepository;

class ListController
{
    protected $list_repository;

    public function __construct(ListRepository $list_repository) {
        $this->list_repository = $list_repository;
    }

    /**
     * Retrieve all TodoList as JSON
     * @return {Array<ToDoList>}
     */
    public function getAll(Request $request, Response $response, $args)
    {
        $data = $this->list_repository->all();
        return $response->withJson($data, 200);
    }

    /**
     * Retrieve a single ToDoList with nested ListItem objects
     * @return {ToDoList} with {Array<ListItem>}
     */
    public function getById(Request $request, Response $response, $args) {
        $list_id = (int)$args['id'];
        $data = $this->list_repository->findById($list_id);

        return $response->withJson($data, 200);
    }

    /**
     * Create a new ToDoList
     * @param {String} list_name
     * @return {ToDoList}
     */
    public function createList(Request $request, Response $response, $args) {
        $data = $request->getParsedBody();
        $list = $this->list_repository->create([
            'list_name' => $data['list_name'],
        ]);

        return $response->withJson($list, 200);
    }

    public function updateList(Request $request, Response $response, $args) {
        $list_id = (int)$args['id'];
        $data = $request->getParsedBody();

        $list = $this->list_repository->update($data, $list_id);
    }

    public function deleteList(Request $request, Response $response, $args) {
        $list_id = (int)$args['id'];
        $this->list_repository->delete($list_id);
    }
}
