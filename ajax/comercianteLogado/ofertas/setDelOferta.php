<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/config/config.php';

extract($_GET);
session_start();

$connection = new config();
$conexao = $connection->getConnection();

$query = "
        DELETE FROM
            oferta
        WHERE
            codigo_ofe = '".$codigo_ofe."'
    ";

$retorno = array();
if($conexao->query($query)){
    $retorno['retorno'] = 'inserido';
}else{
    $retorno['retorno'] = 0;
}

header("Content-type: application/json");
echo json_encode($retorno);

?>