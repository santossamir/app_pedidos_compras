<?php
	$acao = 'recuperar';
	require 'cliente_controller.php';
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Pedidos de Compra</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
			function editar(id_cliente, txt_cliente){
		
				//Form de Edicação
				let form = document.createElement('form');
				form.action = 'cliente_controller.php?acao=atualizar';
				form.method = 'post';
				form.className = 'row';

				//Input para entrada de texto
				let inputCliente = document.createElement('input');
				inputCliente.type = 'text';
				inputCliente.name = 'cliente';
				inputCliente.className = 'col-7 form-control';
				inputCliente.value = txt_cliente;

				//Criar um input hidden para guardar o id_cliente do cliente
				let inputIdCliente = document.createElement('input');
				inputIdCliente.type = 'hidden';
				inputIdCliente.name = 'id_cliente';
				inputIdCliente.value = id_cliente;
				
				//Button para envio do form
				let button = document.createElement('button');
				button.type = 'submit';
				button.className = 'col-4 btn btn-info';
				button.innerHTML = 'Atualizar';

				//Incluir inputCliente no form
				form.appendChild(inputCliente);

				//Incluir inputIdCliente no form
				form.appendChild(inputIdCliente);
				
				//Incluir button no form
				form.appendChild(button)

				//Selecionar elemento cliente
				let cliente = document.getElementById('cliente_'+id_cliente);
				
				//Limpar o texto cliente
				cliente.innerHTML = '';

				//incluir form na pagina
				cliente.insertBefore(form, cliente[0])
			}

			function remover(id_cliente){
				location.href = 'todos_clientes.php?acao=remover&id_cliente='+id_cliente;
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
					<li class="list-group-item"><a href="index.php">Todos os pedidos</a></li>
					<li class="list-group-item"><a href="novo_produto.php">Novo produto</a></li>
					<li class="list-group-item"><a href="todos_produtos.php">Todos os produtos</a></li>
					<li class="list-group-item"><a href="novo_cliente.php">Novo cliente</a></li>
					<li class="list-group-item active"><a href="todos_clientes.php">Todos os clientes</a></li>
				</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h3 class="text-primary">Todos os clientes</h3>
								<hr />
								<table class="table table-borderless ">
									<thead class="text-secondary">
										<tr>
											<th>Id. Cliente</th>
											<th>Nome</th>
											<th>E-mail</th>
											<th>CPF</th>
											<th>Excluir</th>
											<th>Editar</th>
										</tr>
									</thead>
									<tbody >
										<?php 
											foreach($clientes as $cliente){ 
										?>
											<tr>
												<th>
													<?=$cliente->id_cliente?>
												</th>
												<td id="cliente_<?= $cliente->id_cliente?>">
													<?=$cliente->nome_cliente?>
												</td>
												<td id="email_cliente_<?= $cliente->id_cliente?>">
													<?=$cliente->email_cliente?>
												</td>
												<td>
													<?=$cliente->cpf_cliente?>
												</td>
												<td>
													<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?=$cliente->id_cliente?>)"></i>
												</td>
												<td>
													<i class="fas fa-edit fa-lg text-info" onclick="editar(<?=$cliente->id_cliente?>, '<?=$cliente->nome_cliente?>','<?=$cliente->email_cliente?>')"></i>
												</td>
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
