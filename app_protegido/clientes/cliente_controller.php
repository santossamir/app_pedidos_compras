<?php
   
   require "cliente.model.php";
   require "cliente.service.php";
   require "./app_protegido/conexao.php";

   $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

   if($acao == 'inserir'){
      
      foreach ( $_POST as $chave => $valor ) {
         // Remove todas as tags HTML e emove os espaços em branco do valor
         $$chave = trim( strip_tags( $valor ) );
         
         // Verifica se tem algum valor nulo
         if ( empty ( $valor ) ) {
            
            header('Location: novo_cliente.php?inclusao=2');
         
            return $acao = ' ';
         }
      }

      // Verifica se $email_cliente realmente existe e se é um email. 
      if ( (!isset( $email_cliente ) || !filter_var( $email_cliente, FILTER_VALIDATE_EMAIL))) {
         
         header('Location: novo_cliente.php?inclusao=2');
         
            return $acao = ' ';
      }
      
      // Verifica se $nome_cliene realmente existe e se é um número.
      if ( (!isset( $nome_cliente ) || is_numeric( $nome_cliente))) {

         header('Location: novo_cliente.php?inclusao=2');
         
            return $acao = ' ';
      }

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
      $nome_cliente->__set('cliente', $_POST['cliente']);

      $conexao = new Conexao();

      $clienteService = new ClienteService($conexao, $nome_cliente);
      if($clienteService->atualizar()){
         header('Location: todos_clientes.php');
      };

   }else if($acao == 'remover'){
      $nome_cliente = new Cliente();
      $nome_cliente->__set('id_cliente', $_GET['id_cliente']);

      $conexao = new Conexao();

      $clienteService = new ClienteService($conexao, $nome_cliente);
      $clienteService->remover();

      header('Location: todos_clientes.php');
   } 
?>