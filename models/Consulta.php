<?php
require_once 'DB.php';

class Consulta {
	
	protected $table = 'Consulta';
	private $id_medico;
	private $id_paciente;
    private $data_consulta;
    private $observacao;
    private $id_consulta;


    public function setData($data_consulta){
        $this->data_consulta = $data_consulta;
    }
    public function setId($id_consulta){
        $this->id_consulta = $id_consulta;
    }
    public function setIdMedico($id_medico){
		$this->id_medico = $id_medico;
    }
    public function setIdPaciente($id_paciente){
        $this->id_paciente = $id_paciente;
    }

    public function setObservacao($observacao){
        $this->observacao = $observacao;
    }
//inserção da consulta no banco de dados
	public function insert(){

		$sql  = "INSERT INTO $this->table (id_medico, id_paciente, data_consulta, observacoes) VALUES (:medico, :paciente, :data, :observacao)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':medico', $this->id_medico);
        $stmt->bindParam(':paciente', $this->id_paciente);
        $stmt->bindParam(':data', $this->data_consulta);
        $stmt->bindParam(':observacao', $this->observacao);

        return $stmt->execute();
	}

// realiza a busca da consulta que tenha o medico X e data da consulta Y
    public function find(){
        $sql  = "SELECT * FROM $this->table WHERE data_consulta = :data AND id_medico = :medico";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':data', $this->data_consulta);
        $stmt->bindParam(':medico', $this->id_medico);

        $stmt->execute();
        return $stmt->fetchAll();

    }
//busca das consultas por categoria
    public function findConsulta($id){
        $sql  = "SELECT * FROM $this->table WHERE categoria = :categoria";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':categoria', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();

    }
    //busca por data
    public function findConsultaMedico($id){
        $sql  = "SELECT * FROM $this->table WHERE data_consulta = :data";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':data', $id);
        $stmt->execute();
        return $stmt->fetchAll();

    }


}