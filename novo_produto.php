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
			let writingPattern = /[^0-9]/;

			function currencyFormat(moeda){
				if(writingPattern.test(moeda.key)){
					moeda.preventDefault();
					return;
				}
				
				if(!moeda.target.value) return;

				valor = moeda.target.value.toString();
				valor = valor.replace(/[\D]+/g, '');
				valor = valor.replace(/([0-9]{1})$/g, ",$1");

				if(valor.length >= 6){
					while(/([0-9]{4})[,|\.]/g.test(valor)){
						valor = valor.replace(/([0-9]{1})$/g, ",$1");
						valor = valor.replace(/([0-9]{3})[,|\.]/g, ".$1");
					}
				}

				moeda.target.value = valor;
			}
		</script>
		
		<?php 
			if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1){
	    ?>
			<div class="bg-primary pt-2 text-white d-flex justify-content-center">
				<h5>Produto cadastrado com sucesso!</h5>
			</div>
		<?php } 
		?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="novo_pedido.php">Novo pedido</a></li>
						<li class="list-group-item"><a href="index.php">Todos os pedidos</a></li>
                        <li class="list-group-item active"><a href="novo_produto.php">Novo produto</a></li>
						<li class="list-group-item"><a href="todos_produtos.php">Todos os produtos</a></li>
                        <li class="list-group-item"><a href="novo_cliente.php">Novo cliente</a></li>
                        <li class="list-group-item"><a href="todos_clientes.php">Todos os clientes</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h3 class="text-primary">Novo produto</h3>
								<hr />

								<form method="post" action="produto_controller.php?acao=inserir">
									<div class="form-group">
										<label class="text-secondary">Dados do produto:</label>
										<input type="text" name="nome_produto" class="form-control" placeholder="Nome do produto" required>
										<input type="text" name="valor_produto" class="form-control" placeholder="Valor" onkeypress="currencyFormat(event)" required>

									</div>

									<button class="btn btn-primary">Cadastrar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>