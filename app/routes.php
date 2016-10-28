<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models;
/**
 * List API Routes
 */
$app->group('/api/list', function () {
    $this->get('', 'ListController:getAll');
    $this->get('/{id}', 'ListController:getById');
    $this->post('', 'ListController:createList');
    $this->put('/{id}', 'ListController:updateList');
    $this->delete('/{id}', 'ListController:deleteList');
});

$app->group('/api/list/item', function() {
    $this->post('', 'ListItemController:addItem');
    $this->delete('/{id}', 'ListItemController:deleteItem');
    $this->put('/complete/{id}', 'ListItemController:completeItem');
    $this->put('/incomplete/{id}', 'ListItemController:incompleteItem');
});
