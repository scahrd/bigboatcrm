<?php
use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/pedidos', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, './pedidos.phtml', $args);
})->setName('pedidos');


$app->get('/pedidos/new', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, './pedidos-new.phtml', $args);
})->setName('pedidos.new');