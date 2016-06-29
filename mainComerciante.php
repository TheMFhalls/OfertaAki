<?php
    //INCLUDE OF HEAD
    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/security/protectComerciante.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/includes/head.php';
?>
<html>
    <body style="background-color: #ECECEC !important;">
        <div class="col-sm-12 bodyMainComerciante padding0px">
            <div class="col-sm-3 padding0px menusMainComerciante">
                <div class="col-sm-12 pb-10 pt-10 logoMainComerciante">
                    <img src="/OfertaAki/img/logo.png" alt="">
                </div>
                <div class="col-sm-12 padding0px menuOpcoesMainComerciante">
                    <ul>
                        <li class="col-sm-12"
                            onclick="ajaxLoad('.conteudoMainComerciante',
                            'ajax/comercianteLogado/ofertas/verOferta.php');
                            loadingImg('.conteudoMainComerciante');">
                            Ver Ofertas
                        </li>
                        <li class="col-sm-12"
                            onclick="ajaxLoad('.conteudoMainComerciante',
                            'ajax/comercianteLogado/ofertas/cadastroOferta.php');
                            loadingImg('.conteudoMainComerciante');">
                            Inserir Ofertas
                        </li>
                        <li class="col-sm-12"
                            onclick="ajaxLoad('.conteudoMainComerciante',
                            'ajax/comercianteLogado/editComerciante.php');
                            loadingImg('.conteudoMainComerciante');">
                            Editar Conta
                        </li>
                        <li class="col-sm-12"
                        onclick="window.location='<?php echo'http://'.$_SERVER['SERVER_NAME'].'/OfertaAki/security/sair.php';?>'">
                            Sair
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9 conteudoMainComerciante pt-30">
                <div class="col-sm-12 padding0px text-center">
                    <img src="/OfertaAki/img/carregando.gif" width="100px" alt="">
                </div>
            </div>
        </div>
    </body>
    <footer>
        <div class="container">
            <div class="rodape rodape-main">
                <div class="row">
                    <?php
                    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/includes/rodape.php';
                    ?>
                </div>
            </div>
        </div>
    </footer>
</html>
