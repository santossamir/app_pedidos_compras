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

			function cpfFormat(digitos){
				if(writingPattern.test(digitos.key)){
					digitos.preventDefault();
					return;
				}

				if(!digitos.target.value) return;

				valor = digitos.target.value.toString();
				valor = valor.replace(/\D/g,"")                    
				valor = valor.replace(/(\d{3})(\d)/,"$1.$2")      
				valor = valor.replace(/(\d{3})(\d)/,"$1.$2")      									          
				valor = valor.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
				
				digitos.target.value = valor;
			}
		</script>
		<?php 
			if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1){
	    ?>
			<div class="bg-primary pt-2 text-white d-flex justify-content-center">
				<h5>Cliente cadastrado com sucesso!</h5>
			</div>
		<?php } 
		?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="novo_pedido.php">Novo pedido</a></li>
						<li class="list-group-item"><a href="index.php">Todos os pedidos</a></li>
						<li class="list-group-item"><a href="novo_produto.php">Novo produto</a></li>
						<li class="list-group-item"><a href="todos_produtos.php">Todos os produtos</a></li>
                        <li class="list-group-item active"><a href="novo_cliente.php">Novo cliente</a></li>
                        <li class="list-group-item"><a href="todos_clientes.php">Todos os clientes</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h3 class="text-primary">Novo cliente</h3>
								<hr />

								<form method="post" action="cliente_controller.php?acao=inserir">
									<div class="form-group">
										<label class="text-secondary">Dados do cliente:</label>
										<input type="text" name="nome_cliente" class="form-control" placeholder="Nome" required>
										<input type="text" name="email_cliente" class="form-control" placeholder="E-mail" required>
										<input type="text" name="cpf_cliente" class="form-control" placeholder="CPF" onkeypress="cpfFormat(event)" required>

									</div>

									<button class="btn btn-primary">Cadastrar</button>
									
									<?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 2) { ?>

											<small class="form-text text-danger">
											<h4>*Erro ao tentar realizar cadastro. Verifique se os
											campos foram preenchidos corretamente.</4>
											</small>

									<?php } ?>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>