<!DOCTYPE html>
<html>
<?php
	//INCLUDE OF HEAD
	include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/includes/head.php';
?>
<body>
	<div class="container bodyGeral bodyGeral-home">	
		<div class="content content-home">
			<div class="row">
				<label for="cidade" class="cidateLabel col-sm-6 text-center">
					Informe sua Cidade: 
				</label>
				<input class="cidadeClass col-sm-6 padding0px" autocomplete="off" id="cidadeId" type="text" 
				name="cidade" onkeyup="javascript:getCidade();" onblur="javascript:setReturnCidade();" />
				<div class="returnCidade padding0px col-sm-offset-6 col-sm-6" id="returnCidade">					
				</div>
			</div>
		</div>
	</div>
</body>
<footer>
	<div class="container">
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