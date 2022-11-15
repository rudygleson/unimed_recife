<?php
    class Atendimento{
        private $id;
        private $nome;
        private $cpf;
        private $dt_nasc;

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }
    }
?>