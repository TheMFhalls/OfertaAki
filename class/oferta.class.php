<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/OfertaAki/config/config.php';

class oferta extends config {

    private $connection;

    private $codigo_ofe;
    private $titulo_ofe;
    private $descricao_ofe;
    private $precoNormal_ofe;
    private $precoOferta_ofe;
    private $dataInicio_ofe;
    private $dataFinal_ofe;
    private $id_cat_ofe;
    private $razaoSocial_com;
    private $responsavel_com;
    private $bairro_com;
    private $endereco_com;

    function __construct(){
        @session_start();
        $this->setConnection();
    }

    public function buscaOfertaComerciante($cnpj_com){
        $query = "
            SELECT * FROM
            ofertas
            WHERE cnpj_com_ofe = '".$cnpj_com."'
        ";

        $busca = $this->connection->getConnection();
        $buscaValida = $busca->query($query);
        $busca = $buscaValida->fetchAll();
        if($buscaValida->rowCount()!=0)
            return $busca;
        else
            return false;

    }

}

?>