<?php

class config{

        private $host = 'mysql:host=astelnorte.com.br;';
        private $dbname = 'dbname=astel196_OfertaAki';
        private $user = 'astel196';
        private $pass = 'kjkszpj130696';
        private $connection;

        function __construct(){
                $this->connection = new PDO(
                        $this->host.
                        $this->dbname,
                        $this->user,
                        $this->pass
                );
        }

        public function getDbname(){
                return $this->dbname;
        }
        public function getPass(){
                return $this->pass;
        }
        public function getUser(){
                return $this->user;
        }
        public function getHost(){
                return $this->host;
        }
        public function getConnection(){
                return $this->connection;
        }

        public function setDbname($dbname){
                $this->dbname = $dbname;
        }
        public function setHost($host){
                $this->host = $host;
        }
        public function setPass($pass){
                $this->pass = $pass;
        }
        public function setUser($user){
                $this->user = $user;
        }

        public function newConnection(){
                $this->connection = new PDO(
                    $this->host.
                    $this->dbname,
                    $this->user,
                    $this->pass
                );
        }
        public function __sleep(){
                return array('connection');
        }

}

?>