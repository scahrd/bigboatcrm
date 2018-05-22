<?php
use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/dashboard', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, './dashboard.phtml', $args);
})->setName('dashboard.home');