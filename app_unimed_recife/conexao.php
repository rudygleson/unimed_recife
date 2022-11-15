<?php

    class Conexao{

        private $host = 'localhost';
        private $dbname = 'unimed_recife';
        private $usuario = 'root';
        private $senha = '';

        public function conectar(){

            try{

                $conexao = new PDO(
                    "mysql:host=$this->host; dbname=$this->dbname", //dsn
                    "$this->usuario",
                    "$this->senha"
                );

                return $conexao;

            }catch(PDOException $e){
                echo '<p>'.$e->getMessege().'</p>';
            }

        }

    }

?>