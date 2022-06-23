<?php
     class PedidoService{

        private $conexao;
        private $pedido;
        private $id_cliente;
        private $id_pedido;

        public function __construct(Conexao $conexao, Pedido $pedido){
            $this->conexao = $conexao->conectar();
            $this->pedido = $pedido;
            $this->id_cliente = $id_cliente;
        }
        
        public function inserir(){
            print_r($_POST);
            $id_cliente = $_POST["id_cliente"];
            $id_produto = $_POST["pedido"];

            $query_inserir = 'insert into tb_pedidos (id_cliente, id_produto, data_pedido) values (:id_cliente, :pedido, now())';
            $stmt = $this->conexao->prepare($query_inserir);
           
            $stmt->bindValue(':id_cliente', $id_cliente);
            $stmt->bindValue(':pedido', $id_produto);
            $stmt->execute();
        }

        public function recuperar(){
            $query_consultar = '
                select 
                   p.id_pedido, p.id_cliente, c.nome_cliente, b.nome_produto,  s.status, p.data_pedido
                from
                   tb_pedidos as p
                   left join tb_clientes as c on (p.id_cliente = c.id_cliente)
                   left join tb_status as s on (p.id_status = s.id_status)
                   left join tb_produtos as b on (p.id_produto = b.id_produto)

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
            $query_remover = 'delete from tb_pedidos where id_pedido = :id_pedido';
            $stmt = $this->conexao->prepare($query_remover);
            $stmt->bindValue(':id_pedido', $this->pedido->__get('id_pedido'));
            $stmt->execute();
        }

        public function marcarPago(){
            $query_atualizar = "update tb_pedidos set id_status = :id_status where id_pedido = :id_pedido";
            $stmt = $this->conexao->prepare($query_atualizar);
            $stmt->bindValue(':id_status', $this->pedido->__get('id_status'));
            $stmt->bindValue(':id_pedido', $this->pedido->__get('id_pedido'));
            return $stmt->execute();
        }
    }
?>