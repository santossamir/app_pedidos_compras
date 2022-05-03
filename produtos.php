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
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Pedidos de Compra
				</a>
			</div>
		</nav>

		<script>
			function editar(id, txt_tarefa){
				//Form de Edicação
				let form = document.createElement('form');
				form.action = 'tarefa_controller.php?acao=atualizar';
				form.method = 'post';
				form.className = 'row';

				//Input para entrada de texto
				let inputTarefa = document.createElement('input');
				inputTarefa.type = 'text';
				inputTarefa.name = 'tarefa';
				inputTarefa.className = 'col-9 form-control';
				inputTarefa.value = txt_tarefa; 

				//Criar input hidden para guardar o id da tarefa
				let inputId = document.createElement('input');
				inputId.type = 'hidden';
				inputId.name = 'id';
				inputId.value = id;
				
				//Button para envio do form
				let button = document.createElement('button');
				button.type = 'submit';
				button.className = 'col-3 btn btn-info';
				button.innerHTML = 'Atualizar';

				//Incluir inputTarefa no form
				form.appendChild(inputTarefa);

				//Incluir inputId no form
				form.appendChild(inputId);

				//Incluir inputTarefa no form
				form.appendChild(button);

				//Selecionando a div tarefa
				let tarefa = document.getElementById('tarefa_'+id);

				//Limpar texto da tarefa para incluir o form
				tarefa.innerHTML = '';

				//Incluir form na pag
				tarefa.insertBefore(form, tarefa[0]);
			}

			function remover(id){
				location.href = 'todas_tarefas.php?acao=remover&id='+id;
			}

			function marcarRealizada(id){
				location.href = 'todas_tarefas.php?acao=marcarRealizada&id='+id;
			}
		</script>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
				<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Pedidos pendentes</a></li>
						<li class="list-group-item"><a href="novo_pedido.php">Novo pedido</a></li>
						<li class="list-group-item"><a href="todos_pedidos.php">Todos os pedidos</a></li>
                        <li class="list-group-item active"><a href="produtos.php">Produtos</a></li>
                        <li class="list-group-item"><a href="novo_cliente.php">Novo cliente</a></li>
                        <li class="list-group-item"><a href="todos_clientes.php">Todos os clientes</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Produtos</h4>
								<hr />

								<?php
									foreach($produto as $dado => $produto){ 
								?>
									<div class="row mb-3 d-flex align-items-center tarefa">
										<div class="col-sm-9" id="tarefa_<?php echo $produto->id_produto ?>"><?php echo $produto->produto ?> (<?php echo $produto->status?>)</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?php echo $produto->id_produto?>)"></i>
											
											<?php if($tarefa->status == 'pendente'){?>
												<i class="fas fa-edit fa-lg text-info" onclick="editar(<?php echo $produto->id_produto?>, '<?php echo $produto->produto ?>')"></i>
												<i class="fas fa-check-square fa-lg text-success" onclick="marcarRealizada(<?php echo $produto->id_produto?>)"></i>
											<?php } ?>
										</div>
									</div>

								<?php }
								?>	
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>