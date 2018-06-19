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

    public function beutify($string) {
        $replace = array(
            '@' => '&#64;',     'à' => '&agrave;',  'á' => '&aacute;',
            'â' => '&acirc;',   'ã' => '&atilde;',  'ä' => '&auml;',
            'ç' => '&ccedil;',  'è' => '&egrave;',  'é' => '&eacute;',
            'ê' => '&ecirc;',   'ë' => '&euml;',    'ì' => '&igrave;',
            'í' => '&iacute;',  'î' => '&icirc;',   'ï' => '&iuml;',
            'ñ' => '&ntilde;',  'ó' => '&ograve;',  'ò' => '&oacute;',
            'õ' => '&ocirc;',   'ô' => '&otilde;',  'ö' => '&divide;',
            'ù' => '&oslash;',  'û' => '&uacute;',  'ú' => '&ucirc;',
            'ý' => '&uuml;',    'ü' => '&yacute;',  'ÿ' => '&thorn;',
            'À' => '&Agrave;',  'Á' => '&Aacute;',  'Â' => '&Acirc;',
            'Ã' => '&Atilde;',  'Ä' => '&Auml;',    'Å' => '&Aring;',
            'Ç' => '&Ccedil;',  'È' => '&Egrave;',  'É' => '&Eacute;',
            'Ê' => '&Ecirc;',   'Ë' => '&Euml;',    'Ì' => '&Igrave;',
            'Í' => '&Iacute;',  'Î' => '&Icirc;',   'Ï' => '&Iuml;',
            'Ñ' => '&Ntilde;',  'Ò' => '&Ograve;',  'Ó' => '&Oacute;',
            'Ô' => '&Ocirc;',   'Õ' => '&Otilde;',  'Ö' => '&Ouml;',
            'Ù' => '&Ugrave;',  'Ú' => '&Uacute;',  'Û' => '&Ucirc;',
            'Ü' => '&Uuml;'
        );
        return strtr($string,$replace);

    }
}
