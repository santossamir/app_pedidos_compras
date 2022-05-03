<?php
   
   require "pedido.model.php";
   require "pedido.service.php";
   require "/home/samir/Newtab Academy/PHP/app_pedidos_compras/app_protegido/conexao.php";

   $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
   
   if($acao == 'inserir'){

      $pedido = new Pedido();
      
      $pedido->__set('pedido', $_POST['pedido']);

      $conexao = new Conexao();

      $pedidoService = new PedidoService($conexao, $pedido);
      $pedidoService->inserir();

      header('Location: novo_pedido.php?inclusao=1');

   }else if($acao == 'recuperar'){

      $pedido = new Pedido();
      $conexao = new Conexao();

      $pedidoService = new PedidoService($conexao, $pedido);
      $pedido = $pedidoService->recuperar();

   } else if($acao == 'atualizar'){

      $pedido = new Pedido();

      $tarefa->__set('id_cliente', $_POST['id_cliente']);
      $tarefa->__set('pedido', $_POST['pedido']);

      $conexao = new Conexao();

      $pedidoService = new PedidoService($conexao, $pedido);
      if($tarefaService->atualizar()){

         if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
            header('location: index.php');
         }else{
            header('location: todos_pedidos.php');
         }
      };

   }else if($acao == 'remover'){

      $pedido = new Pedido();
      $pedido->__set('id_cliente', $_GET['id_cliente']);

      $conexao = new Conexao();

      $pedidoService = new PedidoService($conexao, $pedido);
      $pedidoService->remover();

      if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
         header('location: index.php');
      }else{
         header('location: todos_pedidos.php');
      }

   }else if($acao == 'marcarRealizada'){

      $pedido = new Pedido();

      $pedido->__set('id', $_GET['id_cliente']);
      $pedido->__set('id_status', 2);

      $conexao = new Conexao();

      $pedidoService = new PedidoService($conexao, $pedido);
      $pedidoService->marcarRealizada();

      if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
         header('location: index.php');
      }else{
         header('location: todas_tarefas.php');
      }

   }

?>