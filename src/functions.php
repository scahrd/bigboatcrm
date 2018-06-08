<?php

/**
*  Random and general functions
*/
class BigBoat{

    public static function getHeader(){
        include_once('./headerManage.php');
    }

    public static function getFooter($page='dashboard'){
        include_once('./footerManage.php');
    }

    public static function getAddressByCep($cep){
        //Passar processamento pro Front
        $url = "https://viacep.com.br/ws/{$cep}/json/";
    }
}