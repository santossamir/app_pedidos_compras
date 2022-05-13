<?php
   
   require "produto.model.php";
   require "produto.service.php";
   require "./app_protegido/conexao.php";

   $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
   
   if($acao == 'inserir'){

      $nome_produto = new Produto();
      $valor_produto = new Produto();
      
      $nome_produto->__set('nome_produto', $_POST['nome_produto']);
      $valor_produto->__set('valor_produto', $_POST['valor_produto']);

      $conexao = new Conexao();

      $produtoService = new ProdutoService($conexao, $nome_produto, $valor_produto);
      $produtoService->inserir();

      header('Location: novo_produto.php?inclusao=1');

   }else if($acao == 'recuperar'){

      $nome_produto = new Produto();
      $conexao = new Conexao();

      $produtoService = new ProdutoService($conexao, $nome_produto);
      $produtos = $produtoService->recuperar();

   } else if($acao == 'atualizar'){

      $nome_produto = new Produto();
   
      $nome_produto->__set('id_produto', $_POST['id_produto']);
      $nome_produto->__set('produto', $_POST['produto']);

      $conexao = new Conexao();

      $produtoService = new ProdutoService($conexao, $nome_produto);

      if($produtoService->atualizar()){
         header('Location: todos_produtos.php');
         }

   }else if($acao == 'remover'){

      $nome_produto = new Produto();
      $nome_produto->__set('id_produto', $_GET['id_produto']);

      $conexao = new Conexao();

      $produtoService = new ProdutoService($conexao, $nome_produto);
      $produtoService->remover();

      header('Location: todos_produtos.php');
   }

?>