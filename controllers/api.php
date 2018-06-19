<?php
header('Access-Control-Allow-Origin:*');
use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/api/orders[/:id]', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'index.phtml', $args);
})->setName('api.getOrders');

$app->get('/api/menu', function (Request $request, Response $response, array $args) {
    $menuClass = new Menu();
    echo $menuClass->getMenu();
})->setName('api.getMenu');

$app->post('/api/menu/:id', function (Request $request, Response $response, array $args) {
    var_dump($args);
})->setName('api.getMenuItem');