<?php
require_once 'DB.php';

class Consulta {
	
	protected $table = 'Medico';
	private $nome;
	private $email;
    private $senha;
    private $crm;
    private $categoria;
    private $id;


    public function getNome(){
        return $this->nome;
    }


    public function setId($id){

        $this->id = $id;

    }

    public function setNome($nome){

		$this->nome = $nome;

    }

	public function setEmail($email){
		$this->email = $email;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setCrm($crm){
        $this->crm = $crm;
    }
    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

	public function insert(){

		$sql  = "INSERT INTO $this->table (nome_medico, email, senha, crm, categoria ) VALUES (:nome, :email, :senha, :crm, :categoria)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':crm', $this->crm);
        $stmt->bindParam(':categoria', $this->categoria);

        return $stmt->execute();
	}

	public function update($id){

		$sql  = "UPDATE $this->table SET nome_medico = :nome, senha = :senha, categoria = :categoria WHERE id_medico = :id";
		$stmt = DB::prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':categoria', $this->categoria);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();

	}

    public function find($id){
        $sql  = "SELECT * FROM $this->table WHERE email = :email";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':email', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();

    }

    public function findMedicos($id){
        $sql  = "SELECT * FROM $this->table WHERE categoria = :categoria";
        $stmt = DB::prepare($sql);

        $stmt->bindParam(':categoria', $id, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    public function findCrm($id){
        $sql  = "SELECT * FROM $this->table WHERE crm = :crm";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':crm', $id, PDO::PARAM_STR);
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
        $sql  = "DELETE FROM $this->table WHERE id_medico = :id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $id,PDO::PARAM_INT);
        return $stmt->execute();
    }

}