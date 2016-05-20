<?php
    extract($_GET);
    include_once '../../class/loginComerciante.class.php';
    $comerciante = new loginComerciante($email_com, $senha_com);
    $comerciante->gerar();
    header('location:../../main.php');
?>