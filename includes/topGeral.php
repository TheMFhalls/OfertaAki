<div class="col-sm-2 logo logo-home">
	<?php
		include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/includes/logo.php';
	?>
</div>
<div class="col-sm-8 menu menu-home mt-30">

	<?php

	include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/protect.class.php';
	$protect = new protect();

	if($protect->geral()){

	?>

		<div class="col-sm-12 padding0px buscaGeral">
			<input type="text" placeholder="Informe o nome do produto desejado ..."
			class="col-sm-10" id="buscaGeral">
			<div class="col-sm-2">
				<input type="submit" value="Buscar"
				onclick="buscaGeral($('#buscaGeral').val());">
			</div>
		</div>

	<?php
	}
	?>

</div>
<div class="col-sm-2">
	<?php
		include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/includes/carrinho.php';
	?>
</div>