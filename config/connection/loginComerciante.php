<?php
    extract($_GET);
    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/loginComerciante.class.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/protect.class.php';

    $_SESSION['comerciante'] = new loginComerciante($email_com, $senha_com);

    if($_SESSION['comerciante']->gerar()){
        header('location:../../main.php');
    }else{

    }
?>