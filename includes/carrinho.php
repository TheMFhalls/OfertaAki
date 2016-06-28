<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/protect.class.php';
	$protect = new protect();

	if(!$protect->geral()){
?>

		<div class="carinho souComerciante text-center"
		onclick="opcoesComerciante();loadingImg('.content-home > .row');">
			<span>
				SOU COMERCIANTE
			</span>
		</div>

<?php
	}else{
?>

		<div class="carinho souComerciante text-center"
		onclick="window.location='http://<?php echo $_SERVER['SERVER_NAME']; ?>/OfertaAki/security/sair.php';">
			<span>
				SAIR
			</span>
		</div>

<?php
	}
?>