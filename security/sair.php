<?php
    @session_start();
    session_destroy();
    $sair = 'location:'.$_SERVER['DOCUMENT_ROOT'].'/OfertaAki/sair.php';
    header($sair);
?>