<?php
use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/dashboard', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, './dashboard.phtml', $args);
})->setName('dashboard.home');

$app->get('/menu', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, './menu.phtml', $args);
})->setName('dashboard.menu');


$app->get('/menu/new', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, './menu-new.phtml', $args);
})->setName('dashboard.menu');