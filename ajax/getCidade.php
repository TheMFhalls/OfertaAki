<?php

	include_once $_SERVER['DOCUMENT_ROOT'] . '/OfertaAki/config/config.class.php';

	extract($_GET);

	$query = "
		select id_cid, nome_cid, sigla_est
		from cidade_com left join estado_com
		on id_est_cid = id_est where nome_cid like '$q%'
	";

	$connection = new config();
	$conexao = $connection->getConnection();

	$getCidade = $conexao->query($query);

	header("Content-type: application/json");
	echo json_encode($getCidade->fetchAll());

?>