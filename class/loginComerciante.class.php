<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/config/config.php';

class loginComerciante extends config {

	private $connection;

	private $cnpj_com;
	private $senha_com;
	private $email_com;
	private $nomeFicticio_com;
	private $id_cid_com;
	private $id_tel_com;
	private $horarioInicio_com;
	private $horarioFinal_com;
	private $razaoSocial_com;
	private $responsavel_com;
	private $bairro_com;
	private $endereco_com;

	function __construct($email_com, $senha_com){
		@session_start();
		$this->email_com = $email_com;
		$this->senha_com = $senha_com;
		$this->setConnection();
	}

	private function busca_com(){
		$query = "
			SELECT * FROM
			comerciante WHERE
			email_com = '".$this->email_com."' AND
			senha_com = '".$this->senha_com."'
		";
		$this->connection->query($query);
	}

	public function gerar(){
		$this->busca_com();
	}

	public function setConnection(){
		$this->connection = new config();
	}

}

?>