<?php

    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/oferta.class.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/categoria.class.php';
    extract($_GET);
    $oferta = new oferta();
    $categoria = new categoria();

    if(
        !$oferta = $oferta->buscaOfertaComEndereco($codigo_ofe)
    ){
        echo "
                -- Nenhuma oferta Encontrada --
            ";
    }

?>

<div id="load" class="col-sm-12 padding0px verOfertaInterna">
    <?php
        foreach($oferta as $ofertaItem):
        extract($ofertaItem);
    ?>
        <div class="col-sm-12 padding0px mostrarOferta">
            <div class="col-sm-12 text-center tituloDIV mb-30">
                <?php echo $titulo_ofe; ?>
            </div>
            <div class="col-sm-12 imagemVerOferta mb-30">
                <img src="/OfertaAki/img/sem_imagem.jpg" alt="">
            </div>
            <div class="col-sm-12 text-center tituloDIV mb-30">
                DESCRIÇÃO DA OFERTA
            </div>
            <div class="col-sm-12 text-justify descricao_ofe  mb-30">
                <?php echo $descricao_ofe; ?>
            </div>
            <div class="col-sm-12 text-center tituloDIV mb-30">
                VALORES
            </div>

            <?php if(($precoOferta_ofe != 0 && $precoOferta_ofe < $precoNormal_ofe)){ ?>

                <div class="col-sm-3 text-center mb-30">
                    De:
                </div>
                <div class="col-sm-3 text-center precoNormal_ofe  mb-30">
                    <span>R$ <?php echo $precoNormal_ofe; ?></span>
                </div>
                <div class="col-sm-3 text-center mb-30">
                    Por:
                </div>
                <div class="col-sm-3 text-center precoOferta_ofe  mb-30">
                    <span>R$ <?php echo $precoOferta_ofe; ?></span>
                </div>

            <?php }else{ ?>

                <div class="col-sm-6 text-center mb-30">
                    Por:
                </div>
                <div class="col-sm-6 text-center precoOferta_ofe  mb-30">
                    <span>R$ <?php echo $precoNormal_ofe; ?></span>
                </div>

            <?php } ?>
            <div class="col-sm-12 text-center tituloDIV mb-30">
                INTERVALO DA OFERTA
            </div>
            <div class="col-sm-3 text-center mb-30">
                DATA DE INICIO
            </div>
            <div class="col-sm-3 text-center dataInicio_ofe  mb-30">
                <?php
                    $date = date_create($dataInicio_ofe);
                    echo date_format($date, 'd/m/Y');
                ?>
            </div>
            <div class="col-sm-3 text-center mb-30">
                DATA FINAL
            </div>
            <div class="col-sm-3 text-center dataFinal_ofe  mb-30">
                <?php
                $date = date_create($dataFinal_ofe);
                echo date_format($date, 'd/m/Y');
                ?>
            </div>
            <div class="col-sm-12 text-center tituloDIV mb-30">
                CATEGORIA DA OFERTA
            </div>
            <div class="col-sm-12 text-center descricao_ofe  mb-30">
                <?php
                    $catAtual = $categoria->busca_catSeleta($id_cat_ofe);
                    echo $catAtual['nome_cat'];
                ?>
            </div>
            <div class="col-sm-12 text-center tituloDIV mb-30">
                DADOS DO OFERTANTE
            </div>
            <div class="col-sm-3 text-right tituloOfertante mb-30 bold">
                Nome da Empresa
            </div>
            <div class="col-sm-3 text-left mb-30">
                <?php echo $razaoSocial_com; ?>
            </div>
            <div class="col-sm-3 text-right tituloOfertante mb-30 bold">
                CNPJ da Empresa
            </div>
            <div class="col-sm-3 text-left mb-30">
                <?php echo $cnpj_com; ?>
            </div>
            <div class="col-sm-3 text-right tituloOfertante mb-30 bold">
                E-mail do Comerciante
            </div>
            <div class="col-sm-3 text-left mb-30">
                <?php echo $email_com; ?>
            </div>
            <div class="col-sm-3 text-right tituloOfertante mb-30 bold">
                CEP do Comerciante
            </div>
            <div class="col-sm-3 text-left mb-30">
                <?php echo $cep_com; ?>
            </div>
            <div class="col-sm-3 text-right tituloOfertante mb-30 bold">
                Bairro do Comerciante
            </div>
            <div class="col-sm-3 text-left mb-30">
                <?php echo $bairro_com; ?>
            </div>
            <div class="col-sm-3 text-right tituloOfertante mb-30 bold">
                Endereço do Comerciante
            </div>
            <div class="col-sm-3 text-left mb-30">
                <?php echo $endereco_com; ?>
            </div>
            <div class="col-sm-12 text-center tituloOfertante mb-30 bold"
            style="font-size: 30px;">
                Aberto das <?php echo $horarioInicio_com; ?> Às <?php echo $horarioFinal_com; ?>
            </div>
        </div>
    <?php
        endforeach;
    ?>
</div>
