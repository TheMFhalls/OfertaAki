<?php
    //INCLUDE OF HEAD
    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/security/protect.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/includes/head.php';
?>
<html>
    <body>
        <div class="col-sm-12 bodyMainComerciante padding0px">
            <div class="col-sm-3 padding0px menusMainComerciante">
                <div class="col-sm-12 pb-10 pt-10 logoMainComerciante">
                    <img src="/OfertaAki/img/logo.png" alt="">
                </div>
                <div class="col-sm-12 padding0px menuOpcoesMainComerciante">
                    <ul>
                        <li class="col-sm-12"
                            onclick="">
                            Ver Ofertas
                        </li>
                        <li class="col-sm-12"
                        onclick="ajaxLoad('.conteudoMainComerciante',
                            'ajax/comercianteLogado/ofertas/cadastroOferta.php');">
                            Inserir Ofertas
                        </li>
                        <li class="col-sm-12">
                            Alterar Ofertas
                        </li>
                        <li class="col-sm-12">
                            Deletar Ofertas
                        </li>
                        <li class="col-sm-12">
                            Editar Conta
                        </li>
                        <li class="col-sm-12"
                        onclick="window.location='<?php echo'http://'.$_SERVER['SERVER_NAME'].'/OfertaAki/security/sair.php';?>'">
                            Sair
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9 conteudoMainComerciante">

            </div>
        </div>
    </body>
</html>
