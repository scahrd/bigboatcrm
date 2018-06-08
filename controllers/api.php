<?php
header('Access-Control-Allow-Origin:*');
use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/api/orders[/:id]', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'index.phtml', $args);
})->setName('api.getOrders');

$app->get('/api/menu', function (Request $request, Response $response, array $args) {
    
})->setName('api.getMenu');