<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/oferta.class.php';
    extract($_GET);
    $oferta = new oferta();

    if(
        !$oferta = $oferta->buscaOferta($codigo_ofe)
    ){
        echo "
                -- Nenhuma oferta Encontrada --
            ";
    }

?>

<div id="load" class="col-sm-12 padding0px verOfertaInterna">
    <div class="col-sm-12 text-center tituloFormCadastroOferta mb-30">
        -- Minhas Ofertas --
    </div>
    <?php
        foreach($oferta as $ofertaItem):
        extract($ofertaItem);
    ?>
        <div class="col-sm-4 mb-30">
            <div class="text-center verOfertaInternaItem">
                <div class="col-sm-12 padding0px mb-10 mt-20 tituloVerOfertaInterna">
                    <?php echo substr($titulo_ofe, 0, 30); ?>
                </div>
                <div class="col-sm-12 padding0px imagemVerOfertaInterna">
                    <img src="/OfertaAki/img/sem_imagem.jpg" alt="">
                </div>

                <?php if(($precoOferta_ofe != 0 && $precoOferta_ofe < $precoNormal_ofe)){ ?>

                    <div class="col-sm-12 padding0px precoVerOfertaInterna mb-10 mt-10">
                        De: <span>R$ <?php echo $precoNormal_ofe; ?></span>
                    </div>
                    <div class="col-sm-12 padding0px precoOfertaVerOfertaInterna mb-10 mt-10">
                        Por: <span>R$ <?php echo $precoOferta_ofe; ?></span>
                    </div>

                <?php }else{ ?>

                    <div class="col-sm-12 padding0px precoOfertaVerOfertaInterna mb-10 mt-10">
                        Por: <span>R$ <?php echo $precoNormal_ofe; ?></span>
                    </div>

                <?php } ?>

                <div class="col-sm-4 visualizarVerOfertaInterna">
                    <button class="btn btn-info">
                        Abrir
                    </button>
                </div>
                <div class="col-sm-4 editarVerOfertaInterna">
                    <button class="btn btn-warning">
                        Editar
                    </button>
                </div>
                <div class="col-sm-4 excluirVerOfertaInterna">
                    <button class="btn btn-danger">
                        Excluir
                    </button>
                </div>

                <div class="cb"></div>
            </div>
        </div>
    <?php
        endforeach;
    ?>
</div>
