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

    public function buscaOfertasComerciante($cnpj_com)
    {
        $query = "
            SELECT * FROM
            oferta
            WHERE cnpj_com_ofe = '" . $cnpj_com . "'
        ";

        $busca = $this->connection->getConnection();
        $buscaValida = $busca->query($query);
        $busca = $buscaValida->fetchAll();
        if ($buscaValida->rowCount() != 0) {
            return $busca;
        }else{
            return false;
        }

    }

    public function buscaOferta($codigo_ofe)
    {
        $query = "
            SELECT * FROM
            oferta
            WHERE codigo_ofe = '" . $codigo_ofe . "'
        ";

        $busca = $this->connection->getConnection();
        $buscaValida = $busca->query($query);
        $busca = $buscaValida->fetchAll();
        if ($buscaValida->rowCount() != 0) {
            return $busca;
        }else{
            return false;
        }

    }

    public function buscaOfertaComEndereco($codigo_ofe)
    {
        $query = "
            SELECT * FROM
            oferta INNER JOIN comerciante
            ON cnpj_com = cnpj_com_ofe
            WHERE codigo_ofe = '" . $codigo_ofe . "'
        ";

        $busca = $this->connection->getConnection();
        $buscaValida = $busca->query($query);
        $busca = $buscaValida->fetchAll();
        if ($buscaValida->rowCount() != 0) {
            return $busca;
        }else{
            return false;
        }

    }

    public function setConnection(){
        $this->connection = new config();
    }

}

?>