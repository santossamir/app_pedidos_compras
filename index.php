<?php
	$acao = 'recuperar';
	require 'pedido_controller.php';
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Pedidos de Compra</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		
		<script>
			function editar(id_cliente, txt_pedido){
				
				//Form de Edicação
				let form = document.createElement('form');
				form.action = 'pedido_controller.php?acao=atualizar';
				form.method = 'post';
				form.className = 'row';

				//Input para entrada de texto
				let inputPedido = document.createElement('input');
				inputPedido.type = 'text';
				inputPedido.name = 'pedido';
				inputPedido.className = 'col-6 form-control';
				inputPedido.value = txt_pedido; 

				//Criar input hidden para guardar o id da tarefa
				let inputIdPedido = document.createElement('input');
				inputIdPedido.type = 'hidden';
				inputIdPedido.name = 'id_cliente';
				inputIdPedido.value = id_cliente;
				
				//Button para envio do form
				let button = document.createElement('button');
				button.type = 'submit';
				button.className = 'col-4 btn btn-info';
				button.innerHTML = 'Atualizar';

				//Incluir inputTarefa no form
				form.appendChild(inputPedido);

				//Incluir inputId no form
				form.appendChild(inputIdPedido);

				//Incluir inputTarefa no form
				form.appendChild(button);

				//Selecionando a div tarefa
				let pedido = document.getElementById('pedido_'+id_cliente);

				//Limpar texto da tarefa para incluir o form
				pedido.innerHTML = '';

				//Incluir form na pag
				pedido.insertBefore(form, pedido[0]);
			}

			function remover(id_pedido){
				location.href = 'index.php?acao=remover&id_pedido='+id_pedido;
			}

			function marcarPago(id_pedido){
				location.href = 'index.php?acao=marcarPago&id_pedido='+id_pedido;
			}
		</script>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/carrinho-de-compras.png" class="d-inline-block align-top" alt="">
					<span>App Pedidos de Compra</span>
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="novo_pedido.php">Novo pedido</a></li>
						<li class="list-group-item active"><a href="index.php">Todos os pedidos</a></li>
						<li class="list-group-item"><a href="novo_produto.php">Novo produto</a></li>
						<li class="list-group-item"><a href="todos_produtos.php">Todos os produtos</a></li>
						<li class="list-group-item"><a href="novo_cliente.php">Novo cliente</a></li>
						<li class="list-group-item"><a href="todos_clientes.php">Todos os clientes</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h3 class="text-primary">Todos os pedidos</h3>
								<hr />
								<table class="table table-borderless">
									<thead class="text-secondary">
										<tr>
											<th>Id. Cliente</th>
											<th>Nome</th>
											<th>Pedido</th>
											<th>Data</th>
											<th>Excluir</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody >
										<?php 
											foreach($pedidos as $pedido){ 
										?>
											<tr>
												<th><?=$pedido->id_cliente?></th>
												<td><?=$pedido->nome_cliente?></td>
												<td id="pedido_<?= $pedido->id_cliente?>">
													<?=$pedido->nome_produto?> (<?= $pedido->status?>)
												</td>
												<td><?=$pedido->data_pedido?></td>
												<td><i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?=$pedido->id_pedido?>)"></i></td>
												
												<?php if($pedido->status == 'Aberto'){?>
													<td><i class="fas fa-check-square fa-lg text-success" onclick="marcarPago(<?=$pedido->id_pedido?>)"></i></td>
												<?php }
												?>

											</tr>
										<?php }
										?>
									</tbody>	
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>