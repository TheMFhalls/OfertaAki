<?php
    extract($_GET);
    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/loginComerciante.class.php';
    $comerciante = new loginComerciante($email_com, $senha_com);
    $comerciante->gerar();
    //header('location:'.$_SERVER['DOCUMENT_ROOT'].'/OfertaAki/main.php');
?>