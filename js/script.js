function getCidade(){
	try{
		var cidade = $('#cidadeId').val();
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
function setReturnCidade(){
	setTimeout('$("#returnCidade").empty();', 3000);
}
function setCidade(id_cid){
	window.location = '/OfertaAki/config/connection/loginUsuario.php?id_cid='+id_cid;
}
function introdutionHome(){
	var raiz = location.origin+'/OfertaAki/ajax/opcoesComerciante.html #load';
	$(".content-home > .row").load(raiz);
}
function logarComerciante(){
	var raiz = location.origin+'/OfertaAki/ajax/logarComerciante.html #load';
	$(".content-home > .row").load(raiz);
}