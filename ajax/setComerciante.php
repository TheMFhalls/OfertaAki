<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/config/config.php';

    extract($_GET);

    $connection = new config();
    $conexao = $connection->getConnection();

    if(isset($cnpj_com))
    $query = "
        INSERT INTO comerciante(
            cnpj_com,
            email_com,
            senha_com,
            logo_com,
            nomeFicticio_com,
            id_cid_com,
            horarioInicio_com,
            horarioFinal_com,
            razaoSocial_com,
            responsavel_com,
            cep_com,
            bairro_com,
            endereco_com
        ) VALUES(
            '".$cnpj_com."',
            '".$email_com."',
            '".$senha_com."',
            '".$logo_com."',
            '".$nomeFicticio_com."',
            '".$id_cid_com."',
            '".$horarioInicio_com."',
            '".$horarioFinal_com."',
            '".$razaoSocial_com."',
            '".$responsavel_com."',
            '".$cep_com."',
            '".$bairro_com."',
            '".$endereco_com."'
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