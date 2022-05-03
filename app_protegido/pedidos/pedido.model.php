<?php
    class Pedido {
        private $id_cliente;
        private $pedido;
        private $status;
        private $data_pedido;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

    }
?>