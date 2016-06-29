<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/config/config.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/loginComerciante.class.php';

extract($_GET);
session_start();

$connection = new config();
$conexao = $connection->getConnection();

if(isset($cnpj_com))
    $query = "
        UPDATE comerciante SET
            senha_com = '".$senha_com."',
            logo_com = '".$logo_com."',
            nomeFicticio_com = '".$nomeFicticio_com."',
            id_cid_com = '".$id_cid_com."',
            horarioInicio_com = '".$horarioInicio_com."',
            horarioFinal_com = '".$horarioFinal_com."',
            razaoSocial_com = '".$razaoSocial_com."',
            responsavel_com = '".$responsavel_com."',
            cep_com = '".$cep_com."',
            bairro_com = '".$bairro_com."',
            endereco_com = '".$endereco_com."'
        WHERE
            cnpj_com = '".$_SESSION['comerciante']['cnpj_com']."'
    ";

$retorno = array();
if($conexao->query($query)){
    $retorno['retorno'] = 'inserido';
}else{
    $retorno['retorno'] = 0;
}

$comerciante = new loginComerciante($email_com, $senha_com);
$comerciante->gerar();

header("Content-type: application/json");
echo json_encode($retorno);

?>