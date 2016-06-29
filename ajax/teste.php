<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/config/config.php';

extract($_GET);

$connection = new config();
$conexao = $connection->getConnection();


    $query = "
        SELECT * FROM
            oferta INNER JOIN comerciante
            ON cnpj_com_ofe = cnpj_com
            INNER JOIN cidade_com
            ON id_cid = id_cid_com
			WHERE id_cid = 4167
    ";

$retorno = array();
$retorno = $conexao->query($query);

//header("Content-type: application/json");
//echo json_encode($retorno->fetchAll());

print_r($retorno->fetchAll());

?>