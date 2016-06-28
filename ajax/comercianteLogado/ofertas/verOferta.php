<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/oferta.class.php';

    $oferta = new oferta();

    if(
        !$ofertas = $oferta->buscaOfertasComerciante($_SESSION['comerciante']['cnpj_com'])
    ){
        echo "
            -- Nenhuma oferta Encontrada --
        ";
    }

?>

<div id="load" class="col-sm-12 padding0px verOferta">
    <div class="col-sm-12 text-center tituloFormCadastroOferta mb-30">
        -- Minhas Ofertas --
    </div>
    <?php
        foreach($ofertas as $ofertaItem):
            extract($ofertaItem);
    ?>
            <div class="col-sm-4 mb-30">
                <div class="text-center verOfertaItem">
                    <div class="col-sm-12 padding0px mb-10 mt-20 tituloVerOferta">
                        <?php echo substr($titulo_ofe, 0, 30); ?>
                    </div>
                    <div class="col-sm-12 padding0px imagemVerOferta">
                        <img src="/OfertaAki/img/sem_imagem.jpg" alt="">
                    </div>

                    <?php if(($precoOferta_ofe != 0 && $precoOferta_ofe < $precoNormal_ofe)){ ?>

                        <div class="col-sm-12 padding0px precoVerOferta mb-10 mt-10">
                            De: <span>R$ <?php echo $precoNormal_ofe; ?></span>
                        </div>
                        <div class="col-sm-12 padding0px precoOfertaVerOferta mb-10 mt-10">
                            Por: <span>R$ <?php echo $precoOferta_ofe; ?></span>
                        </div>

                    <?php }else{ ?>

                        <div class="col-sm-12 padding0px precoOfertaVerOferta mb-10 mt-10">
                            Por: <span>R$ <?php echo $precoNormal_ofe; ?></span>
                        </div>

                    <?php } ?>

                    <div class="col-sm-12 padding0px botoesnessabobagem">
                        <div class="col-sm-4 visualizarVerOferta">
                            <button class="btn btn-info" onclick="ajaxLoad('.conteudoMainComerciante',
                                'ajax/getOferta.php?codigo_ofe=<?php echo $codigo_ofe; ?>');
                                loadingImg('.conteudoMainComerciante');">
                                Abrir
                            </button>
                        </div>
                        <div class="col-sm-4 editarVerOferta">
                            <button class="btn btn-warning" onclick="ajaxLoad('.conteudoMainComerciante',
                                'ajax/comercianteLogado/ofertas/editOferta.php?codigo_ofe=<?php echo $codigo_ofe; ?>');
                                loadingImg('.conteudoMainComerciante');">
                                Editar
                            </button>
                        </div>
                        <div class="col-sm-4 excluirVerOferta">
                            <button class="btn btn-danger"
                                    onclick="setDelOferta('<?php echo $codigo_ofe; ?>');">
                                Excluir
                            </button>
                        </div>
                    </div>

                    <div class="cb"></div>
                </div>
            </div>
    <?php
        endforeach;
    ?>
</div>
