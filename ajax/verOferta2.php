<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/oferta.class.php';

    $oferta = new oferta();

    if(
        !$ofertas = $oferta->buscaOfertasCidade($_SESSION['usuario']['id_cid_usu'])
    ){
        echo "
            -- Nenhuma oferta Encontrada --
        ";
    }

?>

<div id="load" class="col-sm-12 padding0px verOferta">
    <?php
        if($ofertas):
    ?>
    <div class="col-sm-12 text-center tituloFormCadastroOferta mb-30">
        -- Ofertas de <span class="text-uppercase bold">
            <?php
                $nomeCidade = $oferta->cidadeOferta($_SESSION['usuario']['id_cid_usu']);
                echo $nomeCidade[0]['nome_cid'];
            ?>
        </span> --
    </div>
    <?php
        foreach($ofertas as $ofertaItem):
            extract($ofertaItem);
    ?>
            <div class="col-sm-4 mb-30"
                 onclick="ajaxLoad('.content-main',
                     'ajax/getOferta.php?codigo_ofe=<?php echo $codigo_ofe; ?>');
                     loadingImg('.content-main');"
                style="cursor: pointer;">
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

                    <div class="cb"></div>
                </div>
            </div>
    <?php
        endforeach;
    else:
    ?>
        <div class="col-sm-12 text-center tituloFormCadastroOferta mb-30">
            -- Sem ofertas em <span class="text-uppercase bold">
                <?php
                    $nomeCidade = $oferta->cidadeOferta($_SESSION['usuario']['id_cid_usu']);
                    echo $nomeCidade[0]['nome_cid'];
                ?>
            </span> --
        </div>
    <?php
        endif;
    ?>
</div>
