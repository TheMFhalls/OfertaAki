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
function verificaComerciante(email_com){
	try{
		var raiz = location.origin;
		$.ajax({
			type     : "GET",
			dataType : "json",
			url      : raiz+"/OfertaAki/ajax/verificaComerciante.php",
			data     : { email_com : email_com},
			//async    : true,
			success  : function(resp){
				if(resp.verificaComerciante == 'cadastrado'){
					alert(true);
					return true;
				}else{
					alert(false);
					return false;
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
		}else if($('#email_com').val()==''){
			alert("Informe seu EMAIL!");
			$('#email_com').val("");
			$('#email_com').focus();
		}else if($('#senha_com').val()==''){
			alert("Informe sua SENHA!");
			$('#senha_com').val("");
			$('#senha_com').focus();
		}else if($('#senha_com2').val()!=
			$('#senha_com').val()){
			alert("Senhas informadas são invalidas!");
			$('#senha_com2').val("");
			$('#senha_com2').focus();
		}else if($('#id_cid_com').val()==''){
			alert("Informe sua CIDADE!");
			$('#id_cid_com2').val("");
			$('#id_cid_com2').focus();
		}else if($('#razaoSocial_com').val()==''){
			alert("Informe sua RAZÃO SOCIAL!");
			$('#razaoSocial_com').val("");
			$('#razaoSocial_com').focus();
		}else if($('#responsavel_com').val()==''){
			alert("Informe o RESPONSAVEL pela Empresa!");
			$('#responsavel_com').val("");
			$('#responsavel_com').focus();
		}else if($('#bairro_com').val()==''){
			alert("Informe seu BAIRRO!");
			$('#bairro_com').val("");
			$('#bairro_com').focus();
		}else if($('#endereco_com').val()==''){
			alert("Informe seu ENDEREÇO!");
			$('#endereco_com').val("");
			$('#endereco_com').focus();
		}else if(verificaComerciante($('#email_com').val())){
			alert("EMAIL '"+$('#email_com').val()+"' já cadastrado, favor informe outro EMAIL!");
			$('#email_com').val("");
			$('#email_com').focus();
		}
	}catch($e){
		alert('Erro na validação do cadastro!');
	}
}

$(document).ready(function(){
	indexGeral();
});
