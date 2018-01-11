<?php
session_start();
require_once '../../models/Paciente.php';
require_once '../../helpers/Valida.php';

$usuario = new Paciente();
$valida = new Valida();
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Caso tenha campos não preenchidos no formulario
if($valida->Campos($data) == true) {
    echo("<br/>");
    echo('Preencha todos os campos por gentileza');
    return;
}
//Caso senhas inseridas sejam diferentes
if($valida->Senha($data['senha'],$data['senhaRepetida']) == true) {
    echo("<br/>");
    echo('As senhas devem ser iguais!');
    return;
}
//aplica criptografia
$id = $_SESSION['usuario'];

$senha = password_hash($data['senha'], PASSWORD_DEFAULT);
$usuario->setNome($data['nome']);
$usuario->setSenha($senha);
$usuario->setTelefone($data['telefone']);
$usuario->setId($id);

// Realiza o update do usuario
if($usuario->update($id)){
    echo("<script>alert('Atualizado com sucesso');</script>");
    echo("<script>  window.location = \"../painel.php\"</script>");
}
else{
    echo('Erro na Atualização');
}

