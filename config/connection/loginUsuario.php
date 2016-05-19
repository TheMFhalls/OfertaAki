<?php
    extract($_GET);
    include_once '../../class/loginUsuario.class.php';
    $usuario = new loginUsuario($id_cid);
    $usuario->gerar();
    header('location:../../main.php');
?>