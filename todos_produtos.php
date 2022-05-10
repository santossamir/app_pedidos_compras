<?php
	$acao = 'recuperar';
	require 'produto_controller.php';
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>App Pedidos de Compra</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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

		<script>
			function editar(id_produto, txt_produto){
				//Form de Edicação
				let form = document.createElement('form');
				form.action = 'produto_controller.php?acao=atualizar';
				form.method = 'post';
				form.className = 'row';

				//Input para entrada de texto
				let inputProduto = document.createElement('input');
				inputProduto.type = 'text';
				inputProduto.name = 'produto';
				inputProduto.className = 'col-6 form-control';
				inputProduto.value = txt_produto; 

				//Criar input hidden para guardar o id da tarefa
				let inputIdProduto = document.createElement('input');
				inputIdProduto.type = 'hidden';
				inputIdProduto.name = 'id_produto';
				inputIdProduto.value = id_produto;
				
				//Button para envio do form
				let button = document.createElement('button');
				button.type = 'submit';
				button.className = 'col-3 btn btn-info';
				button.innerHTML = 'Atualizar';

				//Incluir inputTarefa no form
				form.appendChild(inputProduto);

				//Incluir inputId no form
				form.appendChild(inputIdProduto);

				//Incluir inputTarefa no form
				form.appendChild(button);

				//Selecionando a div tarefa
				let produto = document.getElementById('produto_'+id_produto);

				//Limpar texto da tarefa para incluir o form
				produto.innerHTML = '';

				//Incluir form na pag
				produto.insertBefore(form, produto[0]);
			}

			function remover(id_produto){
				location.href = 'produtos.php?acao=remover&id_produto='+id_produto;
			}
		</script>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
				<ul class="list-group">
					<li class="list-group-item"><a href="novo_pedido.php">Novo pedido</a></li>
					<li class="list-group-item"><a href="index.php">Todos os pedidos</a></li>
					<li class="list-group-item"><a href="novo_produto.php">Novo produto</a></li>
					<li class="list-group-item active"><a href="todos_produtos.php">Todos os produtos</a></li>
					<li class="list-group-item"><a href="novo_cliente.php">Novo cliente</a></li>
					<li class="list-group-item"><a href="todos_clientes.php">Todos os clientes</a></li>
				</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h3 class="text-primary">Lista de produtos</h3>
								<hr />
								<table class="table table-borderless">
									<thead class="text-secondary">
										<tr>
											<th>Id. do Produto</th>
											<th>Produto</th>
											<th>Valor</th>
											<th>Excluir</th>
											<th>Editar</th>
										</tr>
									</thead>
									<tbody >
										<?php 
											foreach($produtos as $produto){ 
										?>
											<tr>
												<th><?=$produto->id_produto?></th>
												<td id="produto_<?= $produto->id_produto?>">
													<?=$produto->nome_produto?>
												</td>
												<td>R$ <?=$produto->valor_produto?></td>
												<td><i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?=$produto->id_produto?>)"></i></td>
												<td><i class="fas fa-edit fa-lg text-info" onclick="editar(<?=$produto->id_produto?>, '<?=$produto->nome_produto ?>')"></i></td>
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