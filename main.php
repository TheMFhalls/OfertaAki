<!DOCTYPE html>
<html>
<?php
	//INCLUDE OF HEAD
	include_once 'http://'.$_SERVER['SERVER_NAME'].'/OfertaAki/includes/head.php';
?>
<body>
	<div class="container bodyGeral bodyGeral-home">
		<div class="topGeral topGeral-home">
			<div class="row">
				<?php 
					include_once 'http://'.$_SERVER['SERVER_NAME'].'/OfertaAki/includes/topGeral.php';
				?>
			</div>
		</div>
		<div class="destaqueGeral menuGeral-home">
			<div class="row">				
				<?php
					include_once 'http://'.$_SERVER['SERVER_NAME'].'/OfertaAki/includes/destaqueGeral.php';
				?>
			</div>
		</div>		
		<div class="content content-home">
			<div class="row">
				<?php
					include_once 'http://'.$_SERVER['SERVER_NAME'].'/OfertaAki/includes/content.php';
				?>
			</div>
		</div>
	</div>
</body>
<footer>
	<div class="container">
		<div class="rodape rodape-home">
			<div class="row">
				<?php 
					include_once 'http://'.$_SERVER['SERVER_NAME'].'/OfertaAki/includes/rodape.php';
				?>
			</div>
		</div>
	</div>	
</footer>
</html>