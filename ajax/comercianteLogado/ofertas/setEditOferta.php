<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/config/config.php';

extract($_GET);
session_start();

$connection = new config();
$conexao = $connection->getConnection();

$query = "
        UPDATE oferta SET
            titulo_ofe = '".$titulo_ofe."',
            descricao_ofe = '".$descricao_ofe."',
            precoNormal_ofe = '".$precoNormal_ofe."',
            precoOferta_ofe = '".$precoOferta_ofe."',
            dataInicio_ofe = '".$dataInicio_ofe."',
            dataFinal_ofe = '".$dataFinal_ofe."',
            id_cat_ofe = '".$id_cat_ofe."'
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