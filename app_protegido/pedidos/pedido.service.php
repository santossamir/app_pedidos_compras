<?php
     class PedidoService{

        private $conexao;
        private $pedido;

        public function __construct(Conexao $conexao, Tarefa $pedido){
            $this->conexao = $conexao->conectar();
            $this->pedido = $pedido;
        }
        public function inserir(){
            $query_inserir = 'insert into tb_pedidos(pedido)values(:pedido)';
            $stmt = $this->conexao->prepare($query_inserir);
            $stmt->bindValue(':pedido', $this->pedido->__get('pedido'));
            $stmt->execute();
        }

        public function recuperar(){
            $query_consultar = '
                select 
                   ?????????? 
                from
                   ??????????
            ';
            $stmt = $this->conexao->prepare($query_consultar);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function atualizar(){
            $query = "update tb_pedidos set pedido = :pedido where id = :id_cliente";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':pedido', $this->pedido->__get('pedido'));
            $stmt->bindValue(':id_cliente', $this->pedido->__get('id_cliente'));
            return $stmt->execute();
        }

        public function remover(){
            $query = 'delete from tb_pedidos where id_cliente = :id_cliente';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_cliente', $this->pedido->__get('id_cliente'));
            $stmt->execute();
        }
    }
?>