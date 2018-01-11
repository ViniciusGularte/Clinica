<?php
require_once 'DB.php';

class Paciente {
	
	protected $table = 'Paciente';
	private $id;
	private $nome;
	private $email;
    private $senha;
    private $telefone;


    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){

		$this->nome = $nome;

    }
    public function setId($id){

        $this->id = $id;

    }

	public function setEmail($email){
		$this->email = $email;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

	public function insert(){

		$sql  = "INSERT INTO $this->table (nome_paciente, email, senha, telefone ) VALUES (:nome, :email, :senha, :telefone)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':telefone', $this->telefone);
        return $stmt->execute();

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET nome_paciente = :nome, senha = :senha, telefone = :telefone WHERE id_paciente = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':telefone', $this->telefone);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();

	}

    public function find($id){
        $sql  = "SELECT * FROM $this->table WHERE email = :email";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':email', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();

    }



    public function findAll(){
        $sql  = "SELECT * FROM $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function delete($id){
        $sql  = "DELETE FROM $this->table WHERE id_paciente = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

}