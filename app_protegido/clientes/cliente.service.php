<?php
     class ClienteService{

        private $conexao;
        private $nome_cliente;
        private $email_cliente;
        private $cpf_cliente;

        public function __construct(Conexao $conexao, Cliente $nome_cliente){
            $this->conexao = $conexao->conectar();
            $this->nome_cliente = $nome_cliente;
            $this->email_cliente = $email_cliente;
            $this->cpf_cliente = $cpf_cliente;
        }

        public function inserir(){
            $nome_cliente = $_POST["nome_cliente"];
            $email_cliente = $_POST["email_cliente"];
            $cpf_cliente = $_POST["cpf_cliente"];

            $query_inserir = 'insert into tb_clientes(nome_cliente, email_cliente, cpf_cliente)values(:nome_cliente, :email_cliente, :cpf_cliente)';
            $stmt = $this->conexao->prepare($query_inserir);
            $stmt->bindValue(':nome_cliente', $nome_cliente);
            $stmt->bindValue(':email_cliente',$email_cliente);
            $stmt->bindValue(':cpf_cliente', $cpf_cliente);
            $stmt->execute();
        }

        public function recuperar(){
            $query_consultar = '
                select 
                   *
                from
                   tb_clientes
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