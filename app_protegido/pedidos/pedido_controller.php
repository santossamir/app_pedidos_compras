<?php
   
   require "pedido.model.php";
   require "pedido.service.php";
   require "/home/samir/Newtab Academy/PHP/app_pedidos_compras/app_protegido/conexao.php";

   $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
   
   if($acao == 'inserir'){
      
      $id_produto = new Pedido();
      $id_cliente = new Pedido();
      
      $id_produto->__set('id_produto', $_POST['pedido']);
      $id_cliente->__set('id_cliente', $_POST['id_cliente']);
   
      $conexao = new Conexao();

      $pedidoService = new PedidoService($conexao, $id_produto, $id_cliente);
      $pedidoService->inserir();

      header('Location: novo_pedido.php?inclusao=1');

   }else if($acao == 'recuperar'){

      $id_produto = new Pedido();
      $conexao = new Conexao();

      $pedidoService = new PedidoService($conexao, $id_produto);
      $pedidos = $pedidoService->recuperar();

   } else if($acao == 'atualizar'){
      
      $pedido = new Pedido();

      $pedido->__set('id_cliente', $_POST['id_cliente']);
      $pedido->__set('pedido', $_POST['pedido']);

      $conexao = new Conexao();

      $pedidoService = new PedidoService($conexao, $pedido);
      if($pedidoService->atualizar()){
         header('Location: index.php');
      }
         /*if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
            header('location: index.php');
         }else{
            header('location: todos_pedidos.php');
         }
      };*/

   }else if($acao == 'remover'){

      $pedido = new Pedido();
      $pedido->__set('id_cliente', $_GET['id_cliente']);

      $conexao = new Conexao();

      $pedidoService = new PedidoService($conexao, $pedido);
      $pedidoService->remover();

      header('Location: index.php');

      /*if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
         header('location: index.php');
      }else{
         header('location: todos_pedidos.php');
      }*/

   }else if($acao == 'marcarPago'){

      $pedido = new Pedido();

      $pedido->__set('id_cliente', $_GET['id_cliente']);
      $pedido->__set('id_status', 2);

      $conexao = new Conexao();

      $pedidoService = new PedidoService($conexao, $pedido);
      $pedidoService->marcarPago();

      header('location: index.php');

      /*if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
         header('location: index.php');
      }else{
         header('location: index.php');
      }*/

   }

?>