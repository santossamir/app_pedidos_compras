<?php
     class PedidoService{

        private $conexao;
        private $pedido;
        private $id_cliente;

        public function __construct(Conexao $conexao, Pedido $pedido){
            $this->conexao = $conexao->conectar();
            $this->pedido = $pedido;
            $this->id_cliente = $id_cliente;
        }
        
        public function inserir(){

            $id_cliente = $_POST["id_cliente"];
            $pedido = $_POST["pedido"];

            $query_inserir = 'insert into tb_pedidos (id_cliente, pedido, data_pedido) values (:id_cliente, :pedido, now())';
            $stmt = $this->conexao->prepare($query_inserir);
           
            $stmt->bindValue(':id_cliente', $id_cliente);
            $stmt->bindValue(':pedido', $pedido);
            $stmt->execute();
        }

        public function recuperar(){
            $query_consultar = '
                select 
                   p.id_cliente, p.pedido, p.data_pedido, s.status 
                from
                   tb_pedidos as p
                   left join tb_status as s on (p.id_status = s.id_status)
            ';
            $stmt = $this->conexao->prepare($query_consultar);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function atualizar(){
            $query_atualizar = "update tb_pedidos set pedido = :pedido where id_cliente = :id_cliente";
            $stmt = $this->conexao->prepare($query_atualizar);
            $stmt->bindValue(':pedido', $this->pedido->__get('pedido'));
            $stmt->bindValue(':id_cliente', $this->pedido->__get('id_cliente'));
            return $stmt->execute();
        }

        public function remover(){
            $query_remover = 'delete from tb_pedidos where id_cliente = :id_cliente';
            $stmt = $this->conexao->prepare($query_remover);
            $stmt->bindValue(':id_cliente', $this->pedido->__get('id_cliente'));
            $stmt->execute();
        }
    }
?>