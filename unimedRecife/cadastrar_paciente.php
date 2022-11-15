<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastro - Unimed Recife</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
				<img src="http://localhost/unimedRecife/img/marca-unimed-recife.png" width="200" height="90" class="d-inline-block align-top" alt="">
					<!--Caso queria por título ao lado da logo: App de Consultas-->
				</a>
			</div>
		</nav>

		<!--se existir inclusão executa a mensagem-->
		<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1 ) { ?>
			<div class="bg-success pt-2 text-white d-flex justify-content-center">
				<h5>Paciente cadastrado com sucesso!</h5>
			</div>
		<?php } ?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Pacientes para Atendimento</a></li>
						<li class="list-group-item active"><a href="#">Cadastrar pacientes</a></li>
						<li class="list-group-item"><a href="pacientes_atendidos.php">Pacientes Atendidos</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Cadastrar Paciente</h4>
								<hr />
								
								<form method="POST" action="controle_atendimento.php?acao=inserir">
									<div class="form-group">
										<label>Name:</label>
								  		<input type="text" name="nome" class="form-control" placeholder="Nome do Paciente"/>

										<label>CPF:</label>
        								<input type="numb" name="cpf" class="form-control" placeholder="Nome do Paciente"/>

										<label>Data de Nascimento:</label>
       								   	<input type="date" name="dt_nasc" class="form-control"/>
									</div>
        							<input type="submit" value="Enviar!" class="btn btn-success" />
    							</form>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>