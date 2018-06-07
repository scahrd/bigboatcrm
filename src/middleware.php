<?php
use Slim\Http\Request;
use Slim\Http\Response;

$is_logged = function (Request $request, Response $response, $next){
    $route = $request->getAttribute('route');
    if (empty($route)) {
        return $response->withStatus(404)->write(json_encode(array('status'=>false, 'message'=>'The path you are trying to execute does not exist.')));
    }
    $routeName = $route->getName();
    $publicRoutes = array(
            'user.signin',
            'user.login',
            'api.getOrders',
            'api.getMenu',
        );
    $privateRoutes = array(
            'home',
            'dashboard.home',
            'dashboard.menu'
        );
    $apiRoutes = array(
            'api.getOrders',
            'api.getMenu',
        );
       
    if ((!isset($_SESSION['user']) or !is_array($_SESSION['user'])) && !in_array($routeName, $publicRoutes)) {
        if (in_array($routeName, $apiRoutes)) {
            $auth = $request->getHeader('Authorization');
            if (isset($auth[0]) && !empty($auth[0])) {
                $auth = explode(' ', $auth[0]);
                $auth = explode(':', base64_decode($auth[1]));
                $auth['username'] = $auth[0]; unset($auth[0]);
                $auth['password'] = $auth[1]; unset($auth[1]);

                $userDb = new userDB;
                $user = $userDb->findByUsername($auth['username']);

                $autorizaded = new Login($auth);
                if ($autorizaded->check($user)) {
                    return $next($request, $response);
                }else{
                    return $response->withStatus(401)->write(json_encode(array('status'=>false, 'message'=>'Username or password incorrecet')));
                }
            } else {
                return $response->withStatus(401)->write(json_encode(array('status'=>false, 'Unauthorized')));
            }
        } else {
            return $response->withStatus(302)->withHeader('Location', '/signin/unauthorized');
        }
    } else {
        return $next($request, $response);
    }
};