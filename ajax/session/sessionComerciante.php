<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/loginComerciante.class.php';
    extract($_GET);
    extract($_SESSION);

    $comerciante = new loginComerciante($email_com, $senha_com);

?>