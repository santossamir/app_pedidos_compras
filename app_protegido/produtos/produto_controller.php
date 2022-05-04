<?php
   
   require "produto.model.php";
   require "produto.service.php";
   require "/home/samir/Newtab Academy/PHP/app_pedidos_compras/app_protegido/conexao.php";

   $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
   
   if($acao == 'inserir'){

      $nome_produto = new Produto();
      
      $nome_produto->__set('nome_produto', $_POST['nome_produto']);

      $conexao = new Conexao();

      $produtoService = new ProdutoService($conexao, $nome_produto);
      $produtoService->inserir();

      header('Location: produtos.php?inclusao=1');

   }else if($acao == 'recuperar'){

      $nome_produto = new Produto();
      $conexao = new Conexao();

      $produtoService = new ProdutoService($conexao, $nome_produto);
      $produtos = $produtoService->recuperar();

   } else if($acao == 'atualizar'){

      $nome_produto = new Produto();

      $nome_produto->__set('id_produto', $_POST['id_produto']);
      $nome_produto->__set('nome_produto', $_POST['nome_produto']);

      $conexao = new Conexao();

      $produtoService = new ProdutoService($conexao, $nome_produto);
      if($produtoService->atualizar()){

         if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
            header('location: index.php');
         }else{
            header('location: produtos.php');
         }
      };

   }

?>