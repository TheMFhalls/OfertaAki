<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/config/config.php';

extract($_GET);
session_start();

$connection = new config();
$conexao = $connection->getConnection();

    $query = "
        INSERT INTO oferta(
            titulo_ofe,
            descricao_ofe,
            precoNormal_ofe,
            precoOferta_ofe,
            dataInicio_ofe,
            dataFinal_ofe,
            id_cat_ofe,
            cnpj_com_ofe
        ) VALUES(
            '".$titulo_ofe."',
            '".$descricao_ofe."',
            '".$precoNormal_ofe."',
            '".$precoOferta_ofe."',
            '".$dataInicio_ofe."',
            '".$dataFinal_ofe."',
            '".$id_cat_ofe."',
            '".$_SESSION['comerciante']['cnpj_com']."'
        )
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