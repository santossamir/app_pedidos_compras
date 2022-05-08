<?php
    class Pedido {
        private $id_pedido;
        private $id_cliente;
        private $pedido;
        private $id_produto;
        private $data_pedido;
        private $id_status;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

    }
?>