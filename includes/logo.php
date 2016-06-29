<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/class/protect.class.php';
$protect = new protect();

if(!$protect->geral()){
	?>

	<div class="tamanhoLogo text-center">
		<img onclick="indexGeral();loadingImg('.content-home > .row');" class="logoImagemImg" src="img/logo.png">
	</div>

	<?php
}else{
	?>

	<div class="tamanhoLogo text-center">
		<img onclick="loadingImg('.content-main');ajaxLoad('.content-main', 'ajax/verOferta2.php');" class="logoImagemImg" src="img/logo.png">
	</div>

	<?php
}
?>