<?php
	$acao = 'recuperar';
	require 'controle_atendimento.php';
?>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pacientes Atendidos</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<script>
			function editar(nome, cpf, dt_nasc, id){
				//Criar um form de edição
				let form = document.createElement('form')
				form.action = 'controle_atendimento.php?acao=atualizar'
				form.method = 'post'
				form.className = 'row'

				//Criar os input's para entrada do dados
				let inputNome = document.createElement('input')
				inputNome.type = 'text'
				inputNome.name = 'nome'
				inputNome.value = nome
				inputNome.className = 'col-12  form-control'
				
				let inputCpf = document.createElement('input')
				inputCpf.type = 'numb'
				inputCpf.name = 'cpf'
				inputCpf.value = cpf
				inputCpf.className = 'col-6 form-control'

				let inputDtNasc = document.createElement('input')
				inputDtNasc.type = 'date'
				inputDtNasc.name = 'dt_nasc'
				inputDtNasc.value = dt_nasc
				inputDtNasc.className = 'col-6 form-control'

				//criar input hidden para guardar id do paciente
				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id

				//Criar um buttom para envio do texto
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-6 mt-3 btn btn-info'
				button.innerHTML = 'Atualizar'

				//incluir os input's no form
				form.appendChild(inputNome)
				form.appendChild(inputCpf)
				form.appendChild(inputDtNasc)

				//incluir inputId no form
				form.appendChild(inputId)

				//incluir o button no form
				form.appendChild(button)

				//selecionando a div
				let select_nome = document.getElementById('atendimento_'+ nome)
				let select_cpf = document.getElementById('atendimento_'+ cpf)
				let select_dt_nasc = document.getElementById('atendimento_'+ dt_nasc)
				let select_id = document.getElementById('atendimento_'+ id)
				
				//limpando a div
				select_nome.innerHTML = ''
				select_cpf.innerHTML = ''
				select_dt_nasc.innerHTML = ''
				
				//inserir o form
				select_nome.insertBefore(form, select_nome[0])
			}

			function remover(id){
				location.href = 'pacientes_atendidos.php?acao=remover&id='+id;
			}

			function atendido(id){
				location.href = 'pacientes_atendidos.php?acao=atendido&id='+id;
			}

		</script>

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

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Pacientes para Atendimento</a></li>
						<li class="list-group-item"><a href="cadastrar_paciente.php">Cadastrar pacientes</a></li>
						<li class="list-group-item active"><a href="#">Pacientes Atendidos</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Atendimento Realizado</h4>
								<hr />

								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-2 h6">Atendimento</div>
									<div class="col-sm-4 h6">Nome</div>
									<div class="col-sm-2 h6">CPF</div>
									<div class="col-sm-2 h6">Data de Nascimento</div>
									
								</div>

								<?php foreach($atendimentos as $indice => $atendimento){?>
								
									<?php
										if($atendimento->status == 'atendido'){?>
									
									<div class="row mb-3 d-flex align-items-center tarefa">
										<!--Data de Atendimento-->
										<div class="col-sm-2" id="atendimento_<?= $atendimento->data_atendimento?>">
											<?= $atendimento->data_atendimento?>
										</div>
										<!--Nome-->
										<div class="col-sm-4" id="atendimento_<?= $atendimento->nome?>">
											<?= $atendimento->nome?>
										</div>
										<!--CPF-->
										<div class="col-sm-2" id="atendimento_<?= $atendimento->cpf?>">
											<?= $atendimento->cpf?>
										</div>
										<!--Data de Atendimento-->
										<div class="col-sm-2" id="atendimento_<?= $atendimento->dt_nasc?>">
											<?= $atendimento->dt_nasc?>
										</div>
										
										<div class="col-sm-2 mt-2 d-flex justify-content-between">
											<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $atendimento->id?>)"></i>
											
											
										<?php }?>
										</div>
									</div>
								
								
								<?php }?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>