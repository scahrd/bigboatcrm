<?php

class userDB extends Database
{
    public function __construct(){
        $this->db = $this->connect();
    }

    function findByUsername($login){
        $query = "
            SELECT 
                *
            FROM usuarios
            WHERE
                login = '{$login}'
            LIMIT 1;
        ";

        $result = $this->db->query($query);
        $userdata = $result->fetch_assoc();
        $result->free();
        return $userdata;
    }

    public function generateApiKey($login){
        if (!empty($login)) {
            $user = $this->findByUsername($login);
            $apiKey = md5($user.md5($user['username'].'+'.$user['password']));

            $query = "UPDATE usuarios SET api_key = '{$apiKey}' WHERE id = {$user['id']}";

            if ($this->db->query($query)) {
                $retorno = array('status' => true, 'api_key' => $apiKey);
            } else {
                $retorno = array('status'=>false, 'message'=>'Error on generating new API Key');
            }
        } else {
            $retorno = array('status'=>false, 'message'=>'Error on generating new API Key');
        }

        return json_encode($retorno);
    }

    public function signUp($user, $password){
        
    }
}