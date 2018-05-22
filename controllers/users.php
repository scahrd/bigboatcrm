<?php
use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/signin[/{status}]', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, './signin.phtml', $args);
})->setName('user.signin');

$app->post('/signin', function (Request $request, Response $response, array $args) {
    $userDb = new userDB;
    $post = $request->getParsedBody();
    $user = $userDb->findByUsername($post['username']);
    $auth = new Login($post);

    if ($auth->check($user)){
        $auth->access();
        return $response->withStatus(302)->withHeader('Location', "/");
    } else {
        return $response->withStatus(302)->withHeader('Location', '/signin/false');
    }
})->setName('user.login');

$app->get('/signout', function (Request $request, Response $response, array $args) {
    $auth = new Login($_SESSION['user']);
    $auth->logout();
    return $response->withStatus(302)->withHeader('Location', '/signin/logged_out');
})->setName('user.signin');