<!DOCTYPE html>
<html>
<?php
	//INCLUDE OF HEAD
	include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/security/protect.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/includes/head.php';
?>
<body>
	<div class="container bodyGeral bodyGeral-main">
		<div class="topGeral topGeral-main">
			<div class="row">
				<?php 
					include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/includes/topGeral.php';
				?>
			</div>
		</div>
		<div class="destaqueGeral menuGeral-main">
			<div class="row">				
				<?php
					include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/includes/destaqueGeral.php';
				?>
			</div>
		</div>		
		<div class="content content-main">
			<div class="row">
				<?php
					include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/includes/content.php';
				?>
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