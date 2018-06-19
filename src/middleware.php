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
            'user.login'
        );
    $privateRoutes = array(
            'home',
            'dashboard.home',
            'menu',
            'menu.new',
            'pedidos',
            'pedidos.new',
        );
    $apiRoutes = array(
            'api.getOrders',
            'api.getMenu',
            'api.getMenuItem',
        );
       
    if ((!isset($_SESSION['user']) or !is_array($_SESSION['user'])) && !in_array($routeName, $publicRoutes)) {
        if (in_array($routeName, $apiRoutes)) {
            $authorization = $request->getHeader('Authorization');
            $apikey = $request->getHeader('ApiKey');

            if (!empty($authorization)){
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
            }elseif(!empty($apikey)){
                if($apikey[0] == 'ad78fabc48e94ea97cbace7191e78d33'){
                    return $next($request, $response);
                }else{
                    return $response->withStatus(401)->write(json_encode(array('status'=>false, 'Unauthorized')));
                }
            }else{
                return $response->withStatus(401)->write(json_encode(array('status'=>false, 'Unauthorized')));
            }
        } else {
            return $response->withStatus(302)->withHeader('Location', '/signin/unauthorized');
        }
    } else {
        return $next($request, $response);
    }
};