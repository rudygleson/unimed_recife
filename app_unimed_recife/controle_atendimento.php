<?php
    require '../../app_unimed_recife/atendimento.model.php';
    require '../../app_unimed_recife/service.atendimento.php';
    require '../../app_unimed_recife/conexao.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
   

    if($acao == 'inserir'){

        $atendimento = new Atendimento();
        $atendimento->__set('nome', $_POST['nome']);
        $atendimento->__set('cpf', $_POST['cpf']);
        $atendimento->__set('dt_nasc', $_POST['dt_nasc']);


        $conexao = new Conexao();

        $serviceAtendimento = new ServiceAtendimento($conexao, $atendimento);
        $serviceAtendimento->cadastrar();

        header('Location: cadastrar_paciente.php?inclusao=1');
        
    }else if($acao == 'recuperar'){
        
        $atendimento = new Atendimento();
        $conexao = new Conexao();

        $serviceAtendimento = new ServiceAtendimento($conexao, $atendimento);
        $atendimentos = $serviceAtendimento->listar();

    }else if($acao == 'atualizar'){
        $atendimento = new Atendimento();
        $atendimento->__set('id', $_POST['id']);
        $atendimento->__set('nome', $_POST['nome']);
        $atendimento->__set('cpf', $_POST['cpf']);
        $atendimento->__set('dt_nasc', $_POST['dt_nasc']);

        $conexao = new Conexao();

        $serviceAtendimento = new ServiceAtendimento($conexao, $atendimento);
        if($serviceAtendimento->atualizar()){

            if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
                header('location: index.php');
            }else{
                header('location: pacientes_atendidos.php');
            }
            
        }
    }else if($acao == 'remover'){
        $atendimento = new Atendimento();
        $atendimento->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $serviceAtendimento = new ServiceAtendimento($conexao, $atendimento);
        $serviceAtendimento->remover();

        if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
            header('location: index.php');
        }else{
            header('location: pacientes_atendidos.php');
        }

    }else if($acao == 'atendido'){
        $atendimento = new Atendimento();
        $atendimento->__set('id', $_GET['id']);
        $atendimento->__set('id_status', 2);
        date_default_timezone_set('America/Recife');
        $nova_data_atendimento = date('Y-m-d H:i:s');
        $atendimento->__set('data_atendimento', $_GET['data_atendimento']);
        $atendimento->__set('data_atendimento', $nova_data_atendimento);
        

        $conexao = new Conexao();

        $serviceAtendimento = new ServiceAtendimento($conexao, $atendimento);
        $serviceAtendimento->atendido();

        if(isset($_GET['pag']) && $_GET['pag'] == 'index'){
            header('location: index.php');
        }else{
            header('location: pacientes_atendidos.php');
        }

    }else if($acao == 'recuperarAtendimento'){
        $atendimento = new Atendimento();
        $atendimento->__set('id_status', 1);
        
        $conexao = new Conexao();

        $serviceAtendimento = new ServiceAtendimento($conexao, $atendimento);
        $atendimentos = $serviceAtendimento->recuperarAtendimento();
    }
?>