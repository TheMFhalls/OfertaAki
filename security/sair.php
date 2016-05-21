<?php
    @session_start();
    session_destroy();
    $sair = 'http://'.$_SERVER['SERVER_NAME'].'/OfertaAki';
    echo "
        <script type='text/javascript'>
            location.href='".$sair."';
        </script>
    ";
?>