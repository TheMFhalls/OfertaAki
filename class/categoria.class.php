<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/config/config.php';

class categoria extends config {

    private $connection;

    private $id_cat;
    private $nome_cat;

    function __construct(){
        $this->setConnection();
    }

    public function busca_cat(){
        $query = "
			SELECT * FROM
			categoria
		";
        $busca = $this->connection->getConnection();
        $busca = $busca->query($query);
        $busca = $busca->fetchAll();
        return $busca;
    }

    public function setConnection(){
        $this->connection = new config();
    }

}

?>