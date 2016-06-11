<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/config/config.php';

extract($_GET);

$connection = new config();
$conexao = $connection->getConnection();


    $query = "
        SELECT * FROM oferta
    ";

$retorno = array();
$retorno = $conexao->query($query);

//header("Content-type: application/json");
//echo json_encode($retorno->fetchAll());

print_r($retorno->fetchAll());

?>