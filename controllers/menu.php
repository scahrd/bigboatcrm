<?php
use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/menu', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, './menu.phtml', $args);
})->setName('menu');


$app->get('/menu/new', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, './menu-new.phtml', $args);
})->setName('menu.new');