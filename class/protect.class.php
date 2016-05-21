<?php

class protect{

    function __construct(){
        @session_start();
    }

    public function testar(){
        if(
            $_SESSION['usuario']['id_cid_usu'] ||
            $_SESSION['usuario']['id_cid_usu']
        ){

        }else{

        }
    }
}

?>