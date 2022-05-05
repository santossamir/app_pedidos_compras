<?php
   
   require "cliente.model.php";
   require "cliente.service.php";
   require "/home/samir/Newtab Academy/PHP/app_pedidos_compras/app_protegido/conexao.php";

   $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
   
   if($acao == 'inserir'){

      $nome_cliente = new Cliente();
      $email_cliente = new Cliente();
      $cpf_cliente = new Cliente();
      
      $nome_cliente->__set('nome_cliente', $_POST['nome_cliente']);
      $email_cliente->__set('email_cliente', $_POST['email_cliente']);
      $cpf_cliente->__set('cpf_cliente', $_POST['cpf_cliente']);

      $conexao = new Conexao();

      $clienteService = new ClienteService($conexao, $nome_cliente, $email_cliente, $cpf_cliente);
      $clienteService->inserir();

      header('Location: novo_cliente.php?inclusao=1');

   }else if($acao == 'recuperar'){

      $nome_cliente = new Cliente();
      $conexao = new Conexao();

      $clienteService = new ClienteService($conexao, $nome_cliente);
      $clientes = $clienteService->recuperar();

   } else if($acao == 'atualizar'){

      $nome_cliente = new Cliente();

      $nome_cliente->__set('id_cliente', $_POST['id_cliente']);
      $nome_cliente->__set('nome_cliente', $_POST['nome_cliente']);

      $conexao = new Conexao();

      $clienteService = new ClienteService($conexao, $nome_cliente);
      if($clienteService->atualizar()){

         if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
            header('location: index.php');
         }else{
            header('location: todos_clientes.php');
         }
      };

   }else if($acao == 'remover'){

      $nome_cliente = new Cliente();
      $nome_cliente->__set('id_cliente', $_GET['id_cliente']);

      $conexao = new Conexao();

      $clienteService = new ClienteService($conexao, $nome_cliente);
      $clienteService->remover();

      if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
         header('location: index.php');
      }else{
         header('location: todos_clientes.php');
      }

   }else if($acao == 'marcarRealizada'){

      $nome_cliente = new Cliente();

      $nome_cliente->__set('id_cliente', $_GET['id-cliente']);
      $nome_cliente->__set('id_status', 2);

      $conexao = new Conexao();

      $clienteService = new ClienteService($conexao, $nome_cliente);
      $clienteService->marcarRealizada();

      if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
         header('location: index.php');
      }else{
         header('location: todos_clientes.php');
      }

   }else if($acao == 'recuperarTarefasPendentes'){

      $nome_cliente = new Cliente();
      $nome_cliente->__set('id_status', 1);

      $conexao = new Conexao();

      $clienteService = new ClienteService($conexao, $nome_cliente);
      $nome_cliente = $clienteService->recuperarTarefasPendentes();
   }

?>