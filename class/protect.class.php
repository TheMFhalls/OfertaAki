<?php

class protect extends config{

    function __construct(){
        @session_start();
    }

    public function testar(){
        if(
            !isset($_SESSION['usuario']['id_cid_usu']) ||
            !isset($_SESSION['comerciante']['cnpj_com'])
        ){
            @session_destroy();
            header('location:'.$_SERVER['DOCUMENT_ROOT'].'/OfertaAki/index.php');
        }
    }
}

?>