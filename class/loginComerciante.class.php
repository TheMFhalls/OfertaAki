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
		foreach($comerciante as $coluna => $valor){
			$_SESSION['comerciante'][$coluna] =
				$valor;
		}
	}

	public function validaLogin(){
		$comerciante = $this->busca_com();
		if($comerciante['cnpj_com'] != ''){
			$this->gerar();
			return true;
		}else{
			return false;
		}
	}

	public function setConnection(){
		$this->connection = new config();
	}

	public function setTelefoneCom(){

	}

	public function getBairroCom()
	{
		return $this->bairro_com;
	}

	public function getCnpjCom()
	{
		return $this->cnpj_com;
	}

	public function getEmailCom()
	{
		return $this->email_com;
	}

	public function getEnderecoCom()
	{
		return $this->endereco_com;
	}

	public function getHorarioFinalCom()
	{
		return $this->horarioFinal_com;
	}

	public function getHorarioInicioCom()
	{
		return $this->horarioInicio_com;
	}

	public function getIdCidCom()
	{
		return $this->id_cid_com;
	}

	public function getIdTelCom()
	{
		return $this->id_tel_com;
	}

	public function getNomeFicticioCom()
	{
		return $this->nomeFicticio_com;
	}

	public function getRazaoSocialCom()
	{
		return $this->razaoSocial_com;
	}

	public function getResponsavelCom()
	{
		return $this->responsavel_com;
	}

	public function getSenhaCom()
	{
		return $this->senha_com;
	}

	public function setBairroCom($bairro_com)
	{
		$this->bairro_com = $bairro_com;
	}

	public function setCnpjCom($cnpj_com)
	{
		$this->cnpj_com = $cnpj_com;
	}

	public function setEmailCom($email_com)
	{
		$this->email_com = $email_com;
	}

	public function setEnderecoCom($endereco_com)
	{
		$this->endereco_com = $endereco_com;
	}

	public function setHorarioFinalCom($horarioFinal_com)
	{
		$this->horarioFinal_com = $horarioFinal_com;
	}

	public function setHorarioInicioCom($horarioInicio_com)
	{
		$this->horarioInicio_com = $horarioInicio_com;
	}

	public function setIdCidCom($id_cid_com)
	{
		$this->id_cid_com = $id_cid_com;
	}

	public function setIdTelCom($id_tel_com)
	{
		$this->id_tel_com = $id_tel_com;
	}

	public function setNomeFicticioCom($nomeFicticio_com)
	{
		$this->nomeFicticio_com = $nomeFicticio_com;
	}

	public function setRazaoSocialCom($razaoSocial_com)
	{
		$this->razaoSocial_com = $razaoSocial_com;
	}

	public function setResponsavelCom($responsavel_com)
	{
		$this->responsavel_com = $responsavel_com;
	}

	public function setSenhaCom($senha_com)
	{
		$this->senha_com = $senha_com;
	}

}

?>