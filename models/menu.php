<?php

class Menu extends Database
{
    public function __construct(){
        $this->db = $this->connect();
    }

    function getMenu($params=''){
        $query = "
            SELECT 
                a.id, a.nome, a.valor_unitario, a.descricao, a.imagem, a.composto, a.observacao,
                GROUP_CONCAT(b.idproduto_composicao SEPARATOR ', ') as composicao
            FROM produtos as a 
                LEFT JOIN produto_composto b on a.composto = 1 AND a.id = b.idproduto_composto
            WHERE 
                a.status = 1 
                AND a.valor_unitario > 0
            GROUP BY a.id
            ORDER BY a.nome;";

        $result = $this->db->query($query);
        $pratos = array();
        while($a = $result->fetch_assoc()){
            foreach ($a as $k => $p) { $a[$k] = ($p); }
            $pratos[] = $a;
        }
        $result->free();
        return json_encode($pratos);
    }

    function getMenuItem(int $id = 0){
        if ($id > 0) {
            $query = "
                SELECT 
                    a.id, a.nome, a.valor_unitario, a.descricao, a.imagem, a.composto, a.observacao,
                    GROUP_CONCAT(b.idproduto_composicao SEPARATOR ', ') as composicao
                FROM produtos as a 
                    LEFT JOIN produto_composto b on a.composto = 1 AND a.id = b.idproduto_composto
                WHERE 
                    a.id = {$id}
                GROUP BY a.id
            ";
            $result = $this->db->query($query);
            $item = $result->fetch_assoc();
            if ($item['composto'] > 0){
                $queryComposicao = "
                    SELECT 
                        a.id, a.quantidade, b.nome
                    FROM produto_composto AS a
                    JOIN produtos b on b.status = 1 AND a.idproduto_composicao = b.id
                    WHERE a.idproduto_composto = {$id}
                ";
                $resultComposicao = $this->db->query($queryComposicao);
                $pratos = array();
                while($a = $resultComposicao->fetch_assoc()){
                    foreach ($a as $k => $p) { $a[$k] = ($p); }
                    $composicao[] = $a;
                }
                $result->free();
                $item['composicao'] = $composicao;
            }
            $result->free();
            return json_encode($item);
        }else{
            return json_encode(false);
        }
    }

    function createProdutos() {
        $inserts = array(
            array('Molho Tar&ecirc;','3.00','1','','http://bigboatsushi.com/assets/images/tare.jpg','0',''),
            array('Filad&eacute;lfia Salm&atilde;o','0.00','1','','http://takesushi.com.br/wp-content/uploads/2015/12/uramaki-salmao-filadelfia1.jpg','0',''),
            array('Filad&eacute;lfia KaniKama','0.00','1','','http://daracomdigital.com.br/temp/telemaki/wp-content/uploads/2017/01/Uramaki-Kani-Kama.jpg','0',''),
            array('Filad&eacute;lfia Camar&atilde;o','0.00','1','','http://www.konbinisushi.com.br/wp-content/uploads/2016/01/uramaki-kani.jpg','0',''),
            array('Filad&eacute;lfia Skin','0.00','1','Pele de salm&atilde;o grelhada','https://abuze-pics.s3.amazonaws.com/photos/3829/normal_oferta-oysushib.jpg?1478794772','0',''),
            array('Hossomaki Salm&atilde;o','0.00','1','','https://media-cdn.tripadvisor.com/media/photo-s/0c/4c/63/ea/hossomaki-de-salmao.jpg','0',''),
            array('Hossomaki KaniKama','0.00','1','','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRGSiDMymTD0FzyS3hjmpnNsSGj9181vE88VOgB_Y18X6dkJnK','0',''),
            array('Hossomaki Mix','0.00','1','Salm&atilde;o e Kanikama','http://www.ohashiexpress.com.br/shop/wp-content/uploads/2016/04/hossomaki-salm%C3%A3o-abacaxi.jpg','0',''),
            array('Niguiri Salm&atilde;o','0.00','1','Tradicional','http://sushihokkai.com.br/media/catalog/product/cache/1/thumbnail/700x700/9df78eab33525d08d6e5fb8d27136e95/n/i/niguiri_salm_o_2_unid._modelo_2.jpg','0',''),
            array('Niguiri Salm&atilde;o Selado','0.00','1','Feito com ma&ccedil;arico','https://sushidrive.com.br/wp-content/uploads/2015/08/nig.jpg','0',''),
            array('Hot Filad&eacute;lfia com Alho Por&oacute;','0.00','1','','https://s3-sa-east-1.amazonaws.com/delivery-direto/img/items/599b48056bdd8.jpeg','0',''),
            array('Hot Doce','0.00','1','Banana com doce de leite','https://media-cdn.tripadvisor.com/media/photo-s/09/53/c5/37/banana-com-doce-de-leite.jpg','0',''),
            array('BigBoat 90','69.90','1','','http://bigboatsushi.com/assets/images/bb90.jpg','1','Acompanha Wassabi, Hashi e Shoyu.<br>Kit para duas pessoas.'),
            array('Coca-Cola 1.5L','6.00','1','','http://bigboatsushi.com/assets/images/coca.png','0',''),
            array('Wassabi','3.00','1','','http://bigboatsushi.com/assets/images/wassabi.jpg','0',''),
            array('Gengibre','3.00','1','','http://bigboatsushi.com/assets/images/gengibre.jpg','0',''),
            array('Temaki Skin','13.90','1','','http://clubmaki.com.br/wp-content/uploads/2017/12/temaki-skin.png','0',''),
            array('Temaki Filad&eacute;fia','13.90','1','','https://daikosushi.com.br/image/data/Temakis/Filadelfia.jpg','0',''),
            array('Tamki Salm&atilde;o','13.90','1','','http://www.ikesushi.com.br/_imagens/culinaria-japonesa/temaki_salmao.jpg','0',''),
            array('Temaki Kanikama','13.90','1','','http://adminchefmio.azurewebsites.net/foto/383/produtos/temaki-kanikama-39281.jpg','0',''),
            array('Temaki Camar&atilde;o','13.90','1','','https://media-cdn.tripadvisor.com/media/photo-s/0e/61/1e/75/temaki-de-camarao.jpg','0','')
        );
        foreach($inserts as $a){
            $query = "INSERT INTO `bigboat`.`produtos` (`nome`,`valor_unitario`,`status`,`descricao`,`imagem`,`composto`,`observacao`) VALUES ('{$a[0]}', '{$a[1]}', '{$a[2]}', '{$a[3]}', '{$a[4]}', '{$a[5]}', '{$a[6]}');";
            $r = $this->db->query($query);
            echo 'Query: '.$query.'<br>Result: '.$r.'<br>';
        }

    }
}