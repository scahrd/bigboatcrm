<?php
use Slim\Http\Request;
use Slim\Http\Response;
require_once __DIR__ . '/../controllers/dashboard.php';
require_once __DIR__ . '/../controllers/api.php';
require_once __DIR__ . '/../controllers/users.php';

$app->get('/', function (Request $request, Response $response, array $args) {
    $logged = true;
    if ($logged) {
        return $response->withRedirect('/dashboard');
    }
})->setName('home');
