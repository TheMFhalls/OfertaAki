<?php
    extract($_GET);
    //INCLUDE OF HEAD
    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/security/protect.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/categoria.class.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/oferta.class.php';

    $oferta = new oferta();
    $oferta = $oferta->buscaOferta($codigo_ofe);
    extract($oferta[0]);

    //INSERIR CATEGORIAS
    $categoria = new categoria();
    $arrayCategorias = $categoria->busca_cat();
    $catAtual = $categoria->busca_catSeleta($id_cat_ofe);
    //FIM INSERIR CATEGORIAS
?>

<div id="load" class="col-sm-12 padding0px formCadastroOferta">
    <div class="col-sm-12 text-center tituloFormCadastroOferta mb-30">
        -- Cadastro de Ofertas --
    </div>
    <div class="col-sm-12 padding0px">
        <label for="titulo_ofe" class="titulo_ofe col-sm-4 mb-30">
            Informe o Titulo da Oferta
        </label>
        <input type="text" class="titulo_ofe col-sm-8 mb-30" id="titulo_ofe"
               maxlength="150" value="<?php echo $titulo_ofe; ?>" />
    </div>
    <div class="col-sm-12 padding0px">
        <label for="descricao_ofe" class="descricao_ofe col-sm-4 mb-30">
            Informe a Descrição da Oferta
        </label>
        <!--<input type="text" class="descricao_ofe col-sm-6 mb-30" id="descricao_ofe" />-->
        <textarea name="descricao_ofe" id="descricao_ofe" cols="30" rows="10"
        class="descricao_ofe col-sm-8 mb-30"><?php echo $descricao_ofe; ?></textarea>
    </div>
    <div class="col-sm-6 padding0px">
        <label for="precoNormal_ofe" class="precoNormal_ofe col-sm-6 mb-30">
            Informe o valor do Produto
        </label>
        <input type="number" class="precoNormal_ofe col-sm-6 mb-30" id="precoNormal_ofe"
               value="<?php echo $precoNormal_ofe; ?>" />
    </div>
    <div class="col-sm-6 padding0px">
        <label for="precoOferta_ofe" class="precoOferta_ofe col-sm-6 mb-30">
            Informe o valor na Oferta
        </label>
        <input type="number" class="precoOferta_ofe col-sm-6 mb-30" id="precoOferta_ofe"
               value="<?php echo $precoOferta_ofe; ?>" />
    </div>
    <div class="col-sm-6 padding0px">
        <label for="dataInicio_ofe" class="dataInicio_ofe col-sm-6 mb-30">
            Informe a Data de Inicio da Oferta
        </label>
        <input type="date" class="dataInicio_ofe col-sm-6 mb-30" id="dataInicio_ofe"
               value="<?php echo $dataInicio_ofe; ?>" />
    </div>
    <div class="col-sm-6 padding0px">
        <label for="dataFinal_ofe" class="dataFinal_ofe col-sm-6 mb-30">
            Informe a Data de Inicio da Oferta
        </label>
        <input type="date" class="dataFinal_ofe col-sm-6 mb-30" id="dataFinal_ofe"
               value="<?php echo $dataFinal_ofe; ?>" />
    </div>
    <div class="col-sm-6 padding0px">
        <label for="id_cat_ofe" class="id_cat_ofe col-sm-6 mb-30">
            Informe a Categoria da Oferta
        </label>
        <select name="id_cat_ofe" id="id_cat_ofe"
                class="id_cat_ofe col-sm-6 mb-30">
            <option value="<?php echo $catAtual['id_cat']; ?>"><?php echo $catAtual['nome_cat']; ?></option>
            <?php
            foreach($arrayCategorias as $categoria){
                echo "
                        <option value='".$categoria['id_cat']."'> ".$categoria['nome_cat']." </option>
                    ";
            }
            ?>
            <option value="">-- Selecione uma Categoria --</option>
        </select>
        <input type="hidden" value="<?php echo $codigo_ofe; ?>" id="codigo_ofe"
        class="codigo_ofe"/>
    </div>
    <div class="col-sm-12 padding0px">
        <input type="submit" class="col-sm-12 mb-30" value="SALVAR ALTERAÇÕES"
               onclick="editOferta();">
    </div>
</div>