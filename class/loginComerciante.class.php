<?php

include_once '../config/config.php';

class loginComerciante{

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

	function __construct($cnpj_com, $senha_com){
		@session_start();
		$this->cnpj_com = $cnpj_com;
		$this->senha_com = $senha_com;
	}

	private function busca_com(){
		$query = "
			SELECT *
			FROM comerciante LEFT JOIN telefone_com
			ON cnpj_com = cnpj_com_tel
		";
	}

	public function setIdCidUsu($id_cid_usu){
		$this->id_cid_usu = $id_cid_usu;
	}

	public function getIdCidUsu(){
		return $this->id_cid_usu;
	}

	public function getIpUsu(){
		return $this->ip_usu;
	}

	public function gerar(){
		$_SESSION['usuario']['id_cid_usu']
			= $this->id_cid_usu;
		$_SESSION['usuario']['ip_usu']
			= $this->ip_usu;
	}

}

?>