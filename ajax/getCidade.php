<?php

	include_once '../config/config.php';

	extract($_GET);

	$query = "
		select id_cid, nome_cid, sigla_est
		from cidade_com left join estado_com
		on id_est_cid = id_est where nome_cid like '$q%'
	";

	$getCidade = $connection->query($query);

	header("Content-type: application/json");
	echo json_encode($getCidade->fetchAll());

?>