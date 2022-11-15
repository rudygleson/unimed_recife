<?php

class ServiceAtendimento{

    private $conexao;
    private $atendimento;

    public function __construct(Conexao $conexao, Atendimento $atendimento){
        $this->conexao = $conexao->conectar();
        $this->atendimento = $atendimento;
    }

    public function cadastrar(){ //CREATE
        $query = 'insert into tb_clientes(nome, cpf, dt_nasc)values(:nome, :cpf, :dt_nasc)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':nome', $this->atendimento->__get('nome'));
        $stmt->bindValue(':cpf', $this->atendimento->__get('cpf'));
        $stmt->bindValue(':dt_nasc', $this->atendimento->__get('dt_nasc'));
        $stmt->execute();
    }

    public function listar(){ //READ
        $query = '
            select 
                t.nome, t.cpf, dt_nasc, t.id, t.data_atendimento, s.status 
            from 
                tb_clientes as t
            left join tb_status as s on (t.id_status = s.id)
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function atualizar(){ //UPDATE
        $query = "update tb_clientes set nome = :nome, cpf = :cpf, dt_nasc = :dt_nasc where id= :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':nome', $this->atendimento->__get('nome'));
        $stmt->bindValue(':cpf', $this->atendimento->__get('cpf'));
        $stmt->bindValue(':dt_nasc', $this->atendimento->__get('dt_nasc'));
        $stmt->bindValue(':id', $this->atendimento->__get('id'));
        return $stmt->execute();
    }

    public function remover(){ //DELETE
        $query = 'delete from tb_clientes where id= :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue('id', $this->atendimento->__get('id'));
        return $stmt->execute();
    }

    public function atendido(){ //UPDATE *Atender
        $query = 'update tb_clientes set id_status= :id_status, data_atendimento= :data_atendimento where id= :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_status', $this->atendimento->__get('id_status'));
        $stmt->bindValue(':data_atendimento', $this->atendimento->__get('data_atendimento'));
        $stmt->bindValue(':id', $this->atendimento->__get('id'));
        return $stmt->execute();

    }

    public function recuperarAtendimento(){
        $query = '
        select 
            t.nome, t.cpf, dt_nasc, t.id, t.data_atendimento, s.status 
        from 
            tb_clientes as t
            left join tb_status as s on (t.id_status = s.id)
        where
            t.id_status = :id_status
    ';
    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(':id_status', $this->atendimento->__get('id_status'));
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);

    }

}

?>