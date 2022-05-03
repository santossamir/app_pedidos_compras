<?php
    class Produto {
        private $id_produto;
        private $nome_produto;
        private $valor_produto;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

    }
?>