<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/protect.class.php';
	$protect = new protect();
	if($protect->comercianteLogado()){
		header("location: mainComerciante.php");
	}else if($protect->geral()){
		header("location: main.php");
	}
?>
<!DOCTYPE html>
<html>
<?php
	//INCLUDE OF HEAD
	include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/includes/head.php';
?>
<body>
	<div class="container bodyGeral bodyGeral-home">
		<div class="topGeral topGeral-home mt-30">
			<div class="row">
				<?php
					include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/includes/topGeral.php';
				?>
			</div>
		</div>
		<div class="content content-home">
			<div class="row">

			</div>
		</div>
	</div>
</body>
<footer>
	<div class="container containerTesteFooter">
		<div class="rodape rodape-home">
			<div class="row">
				<?php 
					include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/includes/rodape.php';
				?>
			</div>
		</div>
	</div>	
</footer>
</html>
