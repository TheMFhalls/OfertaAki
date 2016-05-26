<?php
    extract($_GET);
    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/loginComerciante.class.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/protect.class.php';

    $comerciante = new loginComerciante($email_com, $senha_com);
    $_SESSION['comerciante'] = serialize($comerciante);

    if(unserialize($_SESSION['comerciante'])->gerar()){
        header('location:../../main.php');
    }else{

    }
?>