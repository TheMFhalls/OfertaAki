<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/oferta.class.php';

    $oferta = new oferta();

    if(
        !$ofertas = $oferta->buscaOfertaComerciante($_SESSION['comerciante']['cnpj_com'])
    ){
        echo "
            -- Nenhuma oferta Encontrada --
        ";
    }



?>