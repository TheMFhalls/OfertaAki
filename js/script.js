//VARIAVEIS GLOBAIS
	var retornoVerificaComerciante = true;
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
	var raiz = location.origin+'/OfertaAki/ajax/opcoesComerciante.html #load';
	$(".content-home > .row").load(raiz);
}
function logarComerciante(){
	var raiz = location.origin+'/OfertaAki/ajax/logarComerciante.html #load';
	$(".content-home > .row").load(raiz);
}
function cadastroComerciante(){
	var raiz = location.origin+'/OfertaAki/ajax/cadastroComerciante.html #load';
	$(".content-home > .row").load(raiz);
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
			}
		});
	}catch($e){
		alert('Erro na verificaComerciante : '+$e);
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
				alert('Tudo Certo com o Form!');
			}
		}
	}catch($e){
		alert('Erro na validação do cadastro!');
	}
}

$(document).ready(function(){
	indexGeral();
});
