<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/loginComerciante.class.php';

    extract($_GET);

    $comerciante = new loginComerciante($email_com, $senha_com);

    $comerciante->validaLogin();

?>