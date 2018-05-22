<?php

class Database{
    private $host = '159.89.120.29:3306';
    private $user = 'bigboatdb';
    private $pswd = '@WqQYDAdy)6LF!';

    private $base   = 'bigboat';
    //private $host = 'localhost:3306';
    //private $user = 'root';
    //private $pswd = 'leuccoqw';

    protected function connect(){
        return new mysqli($this->host, $this->user, $this->pswd, $this->base);
    }
}
