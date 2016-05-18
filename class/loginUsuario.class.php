<?php

class loginUsuario{

	private $id_cid_usu;
	private $ip_usu;

	function __construct($id_cidade){
		session_start();
		$this->id_cid_usu = $id_cidade;
		$this->ip_usu = $_SERVER["REMOTE_ADDR"];
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
		session_start();
		$_SESSION['usuario']['id_cid_usu']
			= $this->id_cid_usu;
		$_SESSION['usuario']['id_cid_usu']
			= $this->ip_usu;
		return true;
	}

}

?>