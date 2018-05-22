<?php

class Login
{
    private $user;
    private $data;

    public function __construct($data){
        $this->data = $data;
    }

    public function check($user){  
        if (!isset($user['senha']) or !isset($this->data['password']))
            return false;
        if (md5($this->data['username'].'+'.$this->data['password']) == $user['senha'])
            return true;

        return false;
    }

    public function access(){
        $_SESSION['user'] = $this->data;
    }

    public function logout(){
        unset($_SESSION['user']);
        return true;
    }

}