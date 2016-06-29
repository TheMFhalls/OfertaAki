//VARIAVEIS GLOBAIS
	var retornoVerificaComerciante = true;
	var contagemTelefoneComerciante = 1;
//FIM VARIAVEIS GLOBAIS

function getCidade(el){
	try{
		var cidade = $(el).val();
		var raiz = location.origin;
		$.ajax({
			type     : "GET",
			dataType : "json",
			url      : raiz+"/OfertaAki/ajax/getCidade.php",
			data     : { q : cidade},
			async    : true,
			success  : function (resp){
				var retorno = "<ul class='ulListaCidade'>";
				for(row in resp){
					retorno += "<li class='liListaCidade' onclick='javascript:setCidade("+resp[row].id_cid+");'>"
						+resp[row].nome_cid+" - "+resp[row].sigla_est+"</li>";
				}
				retorno += "</ul>";
				$("#returnCidade").empty().append(retorno);
			}
		});
	}catch($e){
		alert('Erro na getCidade : '+$e);
	}
}
function getCidade2(el){
	try{
		var cidade = $(el).val();
		var raiz = location.origin;
		$.ajax({
			type     : "GET",
			dataType : "json",
			url      : raiz+"/OfertaAki/ajax/getCidade.php",
			data     : { q : cidade},
			async    : true,
			success  : function (resp){
				var retorno = "<ul class='ulListaCidade'>";
				for(row in resp){
					retorno += "<li class='liListaCidade' onclick='javascript:setCidade2("+
					resp[row].id_cid+",\""+resp[row].nome_cid+"\",\""+resp[row].sigla_est+"\");'>"+
					resp[row].nome_cid+" - "+resp[row].sigla_est+"</li>";
				}
				retorno += "</ul>";
				$("#returnCidade").empty().append(retorno);
			}
		});
	}catch($e){
		alert('Erro na getCidade2 : '+$e);
	}
}
function setReturnCidade(){
	setTimeout('$("#returnCidade").empty();', 3000);
}
function setCidade(id_cid){
	window.location = '/OfertaAki/config/connection/loginUsuario.php?id_cid='+id_cid;
}
function setCidade2(id_cid, nome_cid, sigla_est){
	$('#id_cid_com2').val(nome_cid+' - '+sigla_est);
	$('#id_cid_com').val(id_cid);
}
function opcoesComerciante(){
	contagemTelefoneComerciante = 1;
	var raiz = location.origin+'/OfertaAki/ajax/opcoesComerciante.html #load';
	$(".content-home > .row").load(raiz);
}
function ajaxLoad(onquevai, onquevem){
	$(onquevai).load(location.origin+"/OfertaAki/"+onquevem+" #load");
}
function logarComerciante(){
	var raiz = location.origin+'/OfertaAki/ajax/logarComerciante.html #load';
	$(".content-home > .row").load(raiz);
}
function cadastroComerciante(){
	var raiz = location.origin+'/OfertaAki/ajax/cadastroComerciante.html #load';
	$(".content-home > .row").load(raiz);
}
function removeTelefoneComerciante($el){
	$($el).attr('style', 'display: none;');
	contagemTelefoneComerciante--;
}
function setComerciante(){
	try{
		var raiz = location.origin;
		$.ajax({
			type     : "GET",
			dataType : "json",
			url      : raiz+"/OfertaAki/ajax/setComerciante.php",
			data     : {
				cnpj_com : $('#cnpj_com').val(),
				email_com : $('#email_com').val(),
				senha_com : $('#senha_com').val(),
				logo_com : $('#logo_com').val(),
				nomeFicticio_com : $('#nomeFicticio_com').val(),
				id_cid_com : $('#id_cid_com').val(),
				horarioInicio_com : $('#horarioInicio_com').val(),
				horarioFinal_com : $('#horarioFinal_com').val(),
				razaoSocial_com : $('#razaoSocial_com').val(),
				responsavel_com : $('#responsavel_com').val(),
				cep_com : $('#cep_com').val(),
				bairro_com : $('#bairro_com').val(),
				endereco_com : $('#endereco_com').val()
			},
			async    : true,
			success  : function (resp){
				if(resp['retorno'] == 'inserido'){
					openPopUp('Usuario Inserido com sucesso!');
				}else{
					openPopUp('Falha ao cadastrar!');
				}
			}
		});
	}catch($e){
		alert('Erro na setComerciante : '+$e);
	}
}
function setEditComerciante(){
	try{
		var raiz = location.origin;
		$.ajax({
			type     : "GET",
			dataType : "json",
			url      : raiz+"/OfertaAki/ajax/comercianteLogado/setEditComerciante.php",
			data     : {
				cnpj_com : $('#cnpj_com').val(),
				email_com : $('#email_com').val(),
				senha_com : $('#senha_com').val(),
				logo_com : $('#logo_com').val(),
				nomeFicticio_com : $('#nomeFicticio_com').val(),
				id_cid_com : $('#id_cid_com').val(),
				horarioInicio_com : $('#horarioInicio_com').val(),
				horarioFinal_com : $('#horarioFinal_com').val(),
				razaoSocial_com : $('#razaoSocial_com').val(),
				responsavel_com : $('#responsavel_com').val(),
				cep_com : $('#cep_com').val(),
				bairro_com : $('#bairro_com').val(),
				endereco_com : $('#endereco_com').val()
			},
			async    : true,
			success  : function (resp){
				if(resp['retorno'] == 'inserido'){
					openPopUp('Usuario Alterado com sucesso!');
				}else{
					openPopUp('Falha ao Editar Comerciante!');
				}
			}
		});
	}catch($e){
		alert('Erro na setEditComerciante : '+$e);
	}
}
function setOferta(){
	try{
		var raiz = location.origin;
		$.ajax({
			type     : "GET",
			dataType : "json",
			url      : raiz+"/OfertaAki/ajax/comercianteLogado/ofertas/setOferta.php",
			data     : {
				titulo_ofe : $('#titulo_ofe').val(),
				descricao_ofe : $('#descricao_ofe').val(),
				precoNormal_ofe : $('#precoNormal_ofe').val(),
				precoOferta_ofe : $('#precoOferta_ofe').val(),
				dataInicio_ofe : $('#dataInicio_ofe').val(),
				dataFinal_ofe : $('#dataFinal_ofe').val(),
				id_cat_ofe : $('#id_cat_ofe').val()
			},
			async    : true,
			success  : function (resp){
				if(resp['retorno'] == 'inserido'){
					openPopUp('Oferta Inserida com sucesso!');
				}else{
					openPopUp('Falha ao cadastrar Oferta!');
				}
			},
			error	: function(){
				openPopUp('Falha ao cadastrar Oferta!');
			}
		});
	}catch($e){
		alert('Erro na setComerciante : '+$e);
	}
}
function setDelOferta(codigo_ofe){
	try{
		var r = confirm("Deseja mesmo deletar Oferta ?");
		if(r){
			var raiz = location.origin;
			$.ajax({
				type     : "GET",
				dataType : "json",
				url      : raiz+"/OfertaAki/ajax/comercianteLogado/ofertas/setDelOferta.php",
				data     : {
					codigo_ofe : codigo_ofe
				},
				async    : true,
				success  : function (resp){
					if(resp['retorno'] == 'inserido'){
						openPopUp('Oferta Deletada com sucesso!');
						loadingImg('.conteudoMainComerciante');
						ajaxLoad('.conteudoMainComerciante', 'ajax/comercianteLogado/ofertas/verOferta.php');
					}else{
						openPopUp('Falha ao Deletar Oferta!');
					}
				},
				error	: function(){
					openPopUp('Falha ao Deletar Oferta!');
				}
			});
		}
	}catch($e){
		alert('Erro na setEditComerciante : '+$e);
	}
}
function setEditOferta(){
	try{
		var raiz = location.origin;
		$.ajax({
			type     : "GET",
			dataType : "json",
			url      : raiz+"/OfertaAki/ajax/comercianteLogado/ofertas/setEditOferta.php",
			data     : {
				titulo_ofe : $('#titulo_ofe').val(),
				codigo_ofe : $('#codigo_ofe').val(),
				descricao_ofe : $('#descricao_ofe').val(),
				precoNormal_ofe : $('#precoNormal_ofe').val(),
				precoOferta_ofe : $('#precoOferta_ofe').val(),
				dataInicio_ofe : $('#dataInicio_ofe').val(),
				dataFinal_ofe : $('#dataFinal_ofe').val(),
				id_cat_ofe : $('#id_cat_ofe').val()
			},
			async    : true,
			success  : function (resp){
				if(resp['retorno'] == 'inserido'){
					openPopUp('Oferta Alterada com sucesso!');
					loadingImg('.conteudoMainComerciante');
					ajaxLoad('.conteudoMainComerciante', 'ajax/comercianteLogado/ofertas/verOferta.php');
				}else{
					openPopUp('Falha ao Alterar Oferta!');
				}
			},
			error	: function(){
				openPopUp('Falha ao Alterar Oferta!');
			}
		});
	}catch($e){
		alert('Erro na setEditComerciante : '+$e);
	}
}
function addTelefoneComerciante(){
	var texto = "";
	texto += "	<div class='col-sm-6 telefone_com_"+contagemTelefoneComerciante+"'>";
	texto += "		<label for='telefone_com_"+contagemTelefoneComerciante+"' class='text-center col-sm-5 mb-30'>";
	texto += "			Informe o "+contagemTelefoneComerciante+"º Telefone:";
	texto += "		</label>";
	texto += "		<input type='text' class='telefone_com_"+contagemTelefoneComerciante+" col-sm-5 mb-30' ";
	texto += "		id='telefone_com_"+contagemTelefoneComerciante+"' onfocus='$(this).mask(\"99 9 9999-9999\");' ";
	texto += "		name='telefone_com_"+contagemTelefoneComerciante+"' />";
	texto += "		<div class='col-sm-2 deleteTelefone' onclick='removeTelefoneComerciante(\".telefone_com_"+contagemTelefoneComerciante+"\");'>";
	texto += "		</div>";
	texto += "	</div>";
	$('#inserirTelefone').val('Inserir Mais Telefones');
	$('.telefone_comerciante').append(texto);
	contagemTelefoneComerciante++;
	$('#countTelefone').val(contagemTelefoneComerciante);
}
function indexGeral(){
	var raiz = location.origin+'/OfertaAki/ajax/indexGeral.html #load';
	$(".content-home > .row").load(raiz);
}
function validarCNPJ(cnpj){

	cnpj = cnpj.replace(/[^\d]+/g,'');

	if(cnpj == '') return true;

	if (cnpj.length != 14)
		return true;

	// Elimina CNPJs invalidos conhecidos
	if (cnpj == "00000000000000" ||
		cnpj == "11111111111111" ||
		cnpj == "22222222222222" ||
		cnpj == "33333333333333" ||
		cnpj == "44444444444444" ||
		cnpj == "55555555555555" ||
		cnpj == "66666666666666" ||
		cnpj == "77777777777777" ||
		cnpj == "88888888888888" ||
		cnpj == "99999999999999")
		return true;

	// Valida DVs
	tamanho = cnpj.length - 2
	numeros = cnpj.substring(0,tamanho);
	digitos = cnpj.substring(tamanho);
	soma = 0;
	pos = tamanho - 7;
	for (i = tamanho; i >= 1; i--) {
		soma += numeros.charAt(tamanho - i) * pos--;
		if (pos < 2)
			pos = 9;
	}
	resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	if (resultado != digitos.charAt(0))
		return true;

	tamanho = tamanho + 1;
	numeros = cnpj.substring(0,tamanho);
	soma = 0;
	pos = tamanho - 7;
	for (i = tamanho; i >= 1; i--) {
		soma += numeros.charAt(tamanho - i) * pos--;
		if (pos < 2)
			pos = 9;
	}
	resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	if (resultado != digitos.charAt(1))
		return true;

	return false;

}
function validaEmail(email){
	var er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
	if(er.exec(email)){
		return false;
	}else{
		return true;
	}
}
function buscaPorCep(cep){
	cep = cep.val();
	if(cep.length >= 10){
		cep = cep.replace(/[^\d]+/g,'');
		var raiz = location.origin;
		$.ajax({
			type     : "GET",
			dataType : "json",
			url      : "https://viacep.com.br/ws/"+cep+"/json",
			async    : true,
			success  : function (resp){
				$('#id_cid_com2').val(resp.localidade);
				$('#bairro_com').val(resp.bairro);
				$('#endereco_com').val(resp.logradouro);
				$.ajax({
					type     : "GET",
					dataType : "json",
					url      : raiz+"/OfertaAki/ajax/getCidade.php",
					data     : { q : resp.localidade},
					async    : true,
					success  : function (resp){
						for(row in resp){
							$('#id_cid_com').val(resp[row].id_cid);
						}
					}
				});
			}
		});
	}
}
function verificaComerciante(email_com){
	try{
		var raiz = location.origin;
		$.ajax({
			type     : "GET",
			dataType : "json",
			url      : raiz+"/OfertaAki/ajax/verificaComerciante.php",
			data     : { email_com : email_com},
			async    : true,
			success  : function(resp){
				if(resp.verificaComerciante == 'cadastrado'){
					retornoVerificaComerciante = true;
				}else{
					retornoVerificaComerciante = false;
				}
			},
			error	: function(){
				retornoVerificaComerciante = false;
			}
		});
	}catch($e){
		alert('Erro na verificaComerciante : '+$e);
	}
}
function validaEditCadastroComerciante(){
	try{
		if($('#cnpj_com').val()==''){
			alert("Informe seu CNPJ!");
			$('#cnpj_com').val("");
			$('#cnpj_com').focus();
			return false;
		}else if(validarCNPJ($('#cnpj_com').val())){
			alert("CNPJ Invalido!");
			$('#cnpj_com').val("");
			$('#cnpj_com').focus();
		}else if($('#email_com').val()==''){
			alert("Informe seu EMAIL!");
			$('#email_com').val("");
			$('#email_com').focus();
			return false;
		}else if(validaEmail($('#email_com').val())){
			alert("EMAIL Invalido!");
			$('#email_com').val("");
			$('#email_com').focus();
			return false;
		}else if($('#senha_com').val()==''){
			alert("Informe sua SENHA!");
			$('#senha_com').val("");
			$('#senha_com').focus();
			return false;
		}else if($('#senha_com2').val()!=
			$('#senha_com').val()){
			alert("Senhas informadas são invalidas!");
			$('#senha_com2').val("");
			$('#senha_com2').focus();
			return false;
		}else if($('#cep_com').val()==''){
			alert("Informe seu CEP!");
			$('#cep_com').val("");
			$('#cep_com').focus();
			return false;
		}else if($('#id_cid_com').val()==''){
			alert("Informe sua CIDADE!");
			$('#id_cid_com2').val("");
			$('#id_cid_com2').focus();
			return false;
		}else if($('#razaoSocial_com').val()==''){
			alert("Informe sua RAZÃO SOCIAL!");
			$('#razaoSocial_com').val("");
			$('#razaoSocial_com').focus();
			return false;
		}else if($('#responsavel_com').val()==''){
			alert("Informe o RESPONSAVEL pela Empresa!");
			$('#responsavel_com').val("");
			$('#responsavel_com').focus();
			return false;
		}else if($('#bairro_com').val()==''){
			alert("Informe seu BAIRRO!");
			$('#bairro_com').val("");
			$('#bairro_com').focus();
			return false;
		}else if($('#endereco_com').val()==''){
			alert("Informe seu ENDEREÇO!");
			$('#endereco_com').val("");
			$('#endereco_com').focus();
			return false;
		}else{
			loadingPopup();
			setEditComerciante();
			loadingImg('.conteudoMainComerciante');
			ajaxLoad('.conteudoMainComerciante', 'ajax/comercianteLogado/ofertas/verOferta.php');
		}
	}catch($e){
		alert('Erro na validação do cadastro!');
	}
}
function validaCadastroComerciante(){
	try{
		if($('#cnpj_com').val()==''){
			alert("Informe seu CNPJ!");
			$('#cnpj_com').val("");
			$('#cnpj_com').focus();
			return false;
		}else if(validarCNPJ($('#cnpj_com').val())){
			alert("CNPJ Invalido!");
			$('#cnpj_com').val("");
			$('#cnpj_com').focus();
		}else if($('#email_com').val()==''){
			alert("Informe seu EMAIL!");
			$('#email_com').val("");
			$('#email_com').focus();
			return false;
		}else if(validaEmail($('#email_com').val())){
			alert("EMAIL Invalido!");
			$('#email_com').val("");
			$('#email_com').focus();
			return false;
		}else if($('#senha_com').val()==''){
			alert("Informe sua SENHA!");
			$('#senha_com').val("");
			$('#senha_com').focus();
			return false;
		}else if($('#senha_com2').val()!=
			$('#senha_com').val()){
			alert("Senhas informadas são invalidas!");
			$('#senha_com2').val("");
			$('#senha_com2').focus();
			return false;
		}else if($('#cep_com').val()==''){
			alert("Informe seu CEP!");
			$('#cep_com').val("");
			$('#cep_com').focus();
			return false;
		}else if($('#id_cid_com').val()==''){
			alert("Informe sua CIDADE!");
			$('#id_cid_com2').val("");
			$('#id_cid_com2').focus();
			return false;
		}else if($('#razaoSocial_com').val()==''){
			alert("Informe sua RAZÃO SOCIAL!");
			$('#razaoSocial_com').val("");
			$('#razaoSocial_com').focus();
			return false;
		}else if($('#responsavel_com').val()==''){
			alert("Informe o RESPONSAVEL pela Empresa!");
			$('#responsavel_com').val("");
			$('#responsavel_com').focus();
			return false;
		}else if($('#bairro_com').val()==''){
			alert("Informe seu BAIRRO!");
			$('#bairro_com').val("");
			$('#bairro_com').focus();
			return false;
		}else if($('#endereco_com').val()==''){
			alert("Informe seu ENDEREÇO!");
			$('#endereco_com').val("");
			$('#endereco_com').focus();
			return false;
		}else{
			verificaComerciante($('#email_com').val());
			if(retornoVerificaComerciante){
				alert("EMAIL '"+$('#email_com').val()+"' já cadastrado, favor informe outro EMAIL!");
				$('#email_com').val("");
				$('#email_com').focus();
				retornoVerificaComerciante = true;
				return false;
			}else{
				loadingPopup();
				setComerciante();
			}
		}
	}catch($e){
		alert('Erro na validação do cadastro!');
	}
}
function openPopUp(valor){
	$('.popupGeral').attr('style', 'display: block;');
	$('.conteudoPopup').text(valor);
}
function validaLoginComerciante(){
	try{
		loadingPopup();
		var raiz = location.origin;
		$.ajax({
			type     : "GET",
			dataType : "json",
			url      : raiz+"/OfertaAki/ajax/getLogarComerciante.php",
			data     : {
				email_com : $('#email_com').val(),
				senha_com : $('#senha_com').val()
			},
			async    : true,
			success  : function(resp){
				if(resp.retorno == 1){
					openPopUp('Usuario logado com sucesso!');
					setTimeout(function(){
						window.location=raiz+"/OfertaAki/mainComerciante.php";
					},3000);
				}
			},
			error	: function(){
				openPopUp('Dados incorretos!');
			}
		});
	}catch($e){
		alert('Erro na validaLoginComerciante : '+$e);
	}
}
function editOferta() {
	try{
		if($('#titulo_ofe').val() == '') {
			alert("Informe o Titulo da Oferta!");
			$('#titulo_ofe').val("");
			$('#titulo_ofe').focus();
			return false;
		}else if($('#descricao_ofe').val() == '') {
			alert("Informe a Descrição da Oferta!");
			$('#descricao_ofe').val("");
			$('#descricao_ofe').focus();
			return false;
		}else if($('#precoNormal_ofe').val() == '') {
			alert("Informe o Valor do Produto!");
			$('#precoNormal_ofe').val("");
			$('#precoNormal_ofe').focus();
			return false;
		}else if($('#dataInicio_ofe').val() == '') {
			alert("Informe a Data de Inicio da Oferta!");
			$('#dataInicio_ofe').val("");
			$('#dataInicio_ofe').focus();
			return false;dataFinal_ofe
		}else if($('#dataFinal_ofe').val() == '') {
			alert("Informe a Data de Final da Oferta!");
			$('#dataFinal_ofe').val("");
			$('#dataFinal_ofe').focus();
			return false;
		}else if($('#id_cat_ofe').val() == '') {
			alert("Informe a Categoria da Oferta!");
			$('#id_cat_ofe').val("");
			$('#id_cat_ofe').focus();
			return false;
		}else if($('#dataFinal_ofe').val() < $('#dataInicio_ofe').val()) {
			alert("A Data de Inicio deve ser menor que a Data Final da Oferta!");
			$('#dataFinal_ofe').val("");
			$('#dataInicio_ofe').val("");
			$('#dataFinal_ofe').focus();
			return false;
		}else{
			setEditOferta();
		}
	}catch($e){
		alert('Erro na validação do Editar Oferta : '+$e);
	}
}
function validaOferta() {
	try{
		if($('#titulo_ofe').val() == '') {
			alert("Informe o Titulo da Oferta!");
			$('#titulo_ofe').val("");
			$('#titulo_ofe').focus();
			return false;
		}else if($('#descricao_ofe').val() == '') {
			alert("Informe a Descrição da Oferta!");
			$('#descricao_ofe').val("");
			$('#descricao_ofe').focus();
			return false;
		}else if($('#precoNormal_ofe').val() == '') {
			alert("Informe o Valor do Produto!");
			$('#precoNormal_ofe').val("");
			$('#precoNormal_ofe').focus();
			return false;
		}else if($('#dataInicio_ofe').val() == '') {
			alert("Informe a Data de Inicio da Oferta!");
			$('#dataInicio_ofe').val("");
			$('#dataInicio_ofe').focus();
			return false;dataFinal_ofe
		}else if($('#dataFinal_ofe').val() == '') {
			alert("Informe a Data de Final da Oferta!");
			$('#dataFinal_ofe').val("");
			$('#dataFinal_ofe').focus();
			return false;
		}else if($('#id_cat_ofe').val() == '') {
			alert("Informe a Categoria da Oferta!");
			$('#id_cat_ofe').val("");
			$('#id_cat_ofe').focus();
			return false;
		}else if($('#dataFinal_ofe').val() < $('#dataInicio_ofe').val()) {
			alert("A Data de Inicio deve ser menor que a Data Final da Oferta!");
			$('#dataFinal_ofe').val("");
			$('#dataInicio_ofe').val("");
			$('#dataFinal_ofe').focus();
			return false;
		}else{
			setOferta();
		}
	}catch($e){
		alert('Erro na validação da Oferta : '+$e);
	}
}
function loadingImg(caminho){
	$(caminho).html("<div class='col-sm-12 padding0px text-center'><img src='/OfertaAki/img/carregando.gif' width='100px'></div>");
}
function loadingPopup(){
	$('.popupGeral').attr('style', 'display: block;');
	loadingImg('.conteudoPopup');
}

$(document).ready(function(){
	indexGeral();
	ajaxLoad('.conteudoMainComerciante', 'ajax/comercianteLogado/ofertas/verOferta.php');
});
