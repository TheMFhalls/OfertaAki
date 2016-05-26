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
		$busca = $this->connection->getConnection();
		$busca = $busca->query($query);
		$busca = $busca->fetchAll();
		return $busca[0];
	}

	public function gerar(){
		$comerciante = $this->busca_com();
		$this->cnpj_com = $comerciante['cnpj_com'];
		$this->senha_com = $comerciante['senha_com'];
		$this->email_com = $comerciante['email_com'];
		$this->nomeFicticio_com = $comerciante['nomeFicticio_com'];
		$this->id_cid_com = $comerciante['id_cid_com'];
		$this->id_tel_com = $comerciante['id_tel_com'];
		$this->horarioInicio_com = $comerciante['horarioInicio_com'];
		$this->horarioFinal_com = $comerciante['horarioFinal_com'];
		$this->razaoSocial_com = $comerciante['razaoSocial_com'];
		$this->responsavel_com = $comerciante['responsavel_com'];
		$this->bairro_com = $comerciante['bairro_com'];
		$this->endereco_com = $comerciante['endereco_com'];
	}

	public function setConnection(){
		$this->connection = new config();
	}

}

?>