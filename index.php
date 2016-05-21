<!DOCTYPE html>
<html>
<?php
	//INCLUDE OF HEAD
	include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/includes/head.php';
?>
<body>
	<div class="container bodyGeral bodyGeral-home">
		<div class="topGeral topGeral-home">
			<div class="row">
				<?php
					include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/includes/topGeral.php';
				?>
			</div>
		</div>
		<div class="content content-home">
			<div class="row">
				<div class="col-sm-6 cidadeGeral">
					<div class="col-sm-12 padding0px">
						<label for="cidade" class="cidateLabel col-sm-12 padding0px text-center">
							Informe sua Cidade :
						</label>
						<div class="col-sm-12 padding0px">
							<input class="cidadeClass" autocomplete="off" id="cidadeId" type="text"
								   name="cidade" onkeyup="javascript:getCidade();"
								   onblur="javascript:setReturnCidade();"
								   placeholder="Ex: Belo Horizonte"/>
							<div class="returnCidade padding0px col-sm-12" id="returnCidade">
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 text-center">
					<div class="souComerciante col-sm-12 paddin0px"
					onclick="introdutionHome();">
						<span>
							Sou Comerciante
						</span>
					</div>
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