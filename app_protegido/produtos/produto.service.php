<?php
     class ProtudoService{

        private $conexao;
        private $nome_produto;

        public function __construct(Conexao $conexao, Produto $nome_produto){
            $this->conexao = $conexao->conectar();
            $this->nome_produto = $nome_produto;
        }
        public function inserir(){
            $query_inserir = 'insert into tb_produtos(nome_produto)values(:nome_produto)';
            $stmt = $this->conexao->prepare($query_inserir);
            $stmt->bindValue(':nome_produto', $this->nome_produto->__get('nome_produto'));
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
            $query = "update tb_produtos set nome_produto = :nome_produto where id = :id_produto";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome_produto', $this->nome_produto->__get('nome_produto'));
            $stmt->bindValue(':id_produto', $this->nome_produto->__get('id_produto'));
            return $stmt->execute();
        }

        public function remover(){
            $query = 'delete from tb_produtos where id_produto = :id_produto';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id_produto', $this->nome_produto->__get('id_produto'));
            $stmt->execute();
        }
    }
?>