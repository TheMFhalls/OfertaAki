<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/loginComerciante.class.php';

    extract($_GET);

    $comerciante = new loginComerciante($email_com, $senha_com);

    $retorno = array();
    if($comerciante->validaLogin()){
        $retorno['retorno'] = 1;
    }else{
        $retorno['retorno'] = 0;
    }

    header("Content-type: application/json");
    echo json_encode($retorno);

?>