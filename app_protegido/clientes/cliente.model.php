<?php
    class Cliente {
        private $id_cliente;
        private $nome_cliente;
        private $email_cliente;
        private $senha_cliente;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

    }
?>