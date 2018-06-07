<?php
header('Access-Control-Allow-Origin:*');
use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/api/orders[/:id]', function (Request $request, Response $response, array $args) {
    return $this->renderer->render($response, 'index.phtml', $args);
})->setName('api.getOrders');

$app->get('/api/menu', function (Request $request, Response $response, array $args) {
    return json_encode(
        array(
            "menu" => array(
                "combinados" => array(
                    0 => array(
                        'id'                =>  '0',
                        'nome'              =>  'Combinado 1',
                        'valor_unitario'    =>  '155.22',
                        'status'            =>  '1',
                        'descricao'         =>  'Combinado 1 descrição é grande, vai muita coisa',
                        'imagem'            =>  'https://img.stpu.com.br/?img=https://s3.amazonaws.com/pu-mgr/default/a0R0f00000wKrzFEAS/5984e607e4b03424676c8a33.jpg&w=620&h=400',
                    )
                ),
                "simples" => array(
                    1 => array(
                        'id'                =>  '1',
                        'nome'              =>  'Sashimi',
                        'valor_unitario'    =>  '15.00',
                        'status'            =>  '1',
                        'descricao'         =>  'Combo de sashimi dahora',
                        'imagem'            =>  'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSuHEMi4PczuT09Czh_wg1upVK0_DuQ9yzMRMVJ0k_42wzCpS_C',
                    ),
                    3 => array(
                        'id'                =>  '1',
                        'nome'              =>  'Sashimi',
                        'valor_unitario'    =>  '15.00',
                        'status'            =>  '1',
                        'descricao'         =>  'Combo de sashimi dahora',
                        'imagem'            =>  'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSuHEMi4PczuT09Czh_wg1upVK0_DuQ9yzMRMVJ0k_42wzCpS_C'
                    )
                )
            ),
        )
    );
})->setName('api.getMenu');