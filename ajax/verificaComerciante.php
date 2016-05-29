<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/config/config.php';

    extract($_GET);

    $query = "
            select cnpj_com
            from comerciante
            where email_com = '".$email_com."'
        ";

    $connection = new config();
    $conexao = $connection->getConnection();
    $teste = array();

    $verificaComerciante = $conexao->query($query);
    if($verificaComerciante->rowCount()!=0){
        $teste['verificaComerciante'] = 'cadastrado';
    }else{
        $teste['verificaComerciante'] = '';
    }
    header("Content-type: application/json");
    echo json_encode($teste);

?>