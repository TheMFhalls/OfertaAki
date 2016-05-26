<?php
    @session_start();
    //print_r(unserialize($_SESSION['usuario']));
    $valor = unserialize($_SESSION['usuario']);
    echo $valor->getIdCidUsu();
?>