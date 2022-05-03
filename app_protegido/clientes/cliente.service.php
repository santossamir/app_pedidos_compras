<?php
     class ClienteService{

        private $conexao;
        private $nome_cliente;

        public function __construct(Conexao $conexao, Cliente $nome_cliente){
            $this->conexao = $conexao->conectar();
            $this->nome_cliente = $nome_cliente;
        }
        public function inserir(){
            $query_inserir = 'insert into tb_clientes(nome_cliente)values(:nome_cliente)';
            $stmt = $this->conexao->prepare($query_inserir);
            $stmt->bindValue(':nome_cliente', $this->nome_cliente->__get('nome_cliente'));
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
            $query = "update tb_clientes set nome_cliente = :nome_cliente where id = :id_cliente";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome_cliente', $this->nome_cliente->__get('nome_cliente'));
            $stmt->bindValue(':id_cliente', $this->nome_cliente->__get('id_cliente'));
            return $stmt->execute();
        }

        public function remover(){
            $query = 'delete from tb_clientes where id_cliente = :id_cliente';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_cliente', $this->nome_cliente->__get('id_cliente'));
            $stmt->execute();
        }
    }
?>