<?php
    extract($_GET);
    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/loginUsuario.class.php';
    $usuario = new loginUsuario($id_cid);
    $usuario->gerar();
    header('location:../../main.php');
?>