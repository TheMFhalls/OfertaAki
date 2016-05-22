<?php

class protect{

    function __construct(){
        @session_start();
    }

    public function testar(){
        if(
            !(
                isset($_SESSION['usuario']['id_cid_usu']) ||
                isset($_SESSION['comerciante']['cnpj_com'])
            )
        ){
            @session_destroy();
            header('location:index.php');
        }
    }

    private function geral(){
        if(
            !(
                isset($_SESSION['usuario']['id_cid_usu']) ||
                isset($_SESSION['comerciante']['cnpj_com'])
            )
        ){
            return false;
        }else{
            return true;
        }
    }

    public function redireciona($pagina=''){
        if(
            $this->geral()
        ){
            $location = 'http://'.$_SERVER['SERVER_NAME'].'/OfertaAki'.$pagina;
            echo "
                <script type='text/javascript'>
                    location.href='".$location."';
                </script>
            ";
        }
    }

    public function sair(){
        session_destroy();
        $this->redireciona();
    }

}

?>
