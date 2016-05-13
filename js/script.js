//FUNÇÃO DE BUSCA DA CIDADE
	function getCidade(){
		var cidade = $('#cidadeId').val();
		$.ajax({
			type     : "GET",
			dataType : "json",
			url      : "/ofertaaki/OfertaAki/ajax/getCidade.php",
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
	}
	function setReturnCidade(){
		setTimeout('$("#returnCidade").empty();', 3000);
	}
	function setCidade(id_cid){
		window.location = '?id_cid='+id_cid;
	}
	