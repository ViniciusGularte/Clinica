<?php
session_start();
require_once '../../models/Medico.php';
require_once '../../helpers/Valida.php';

$usuario = new Medico();
$valida = new Valida();
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//Caso usuario tenha email invalido
if($valida->Email($data['email']) == false){
    echo("<br/>");
    echo('E-mail invalido');
    return;
}
//Caso tenha campos não preenchidos no formulario
if($valida->Campos($data) == true) {
    echo("<br/>");
    echo('Preencha todos os campos por gentileza');
    return;
}
//verifica se o usuario existe no banco de dados
$resultado=$usuario->find($data['email']);
if($resultado != NULL){
    //verifica se existe usuario com as credenciais
    if (password_verify( $data['senha'], $resultado->senha)) {
        echo('<br/>');
        echo('logado com sucesso');
        //defino a sessao do usuario
        $_SESSION['acesso'] = 'medico';
        $_SESSION['usuario'] = $resultado->id_medico ;

        echo "<script type='text/javascript'>window.top.location='../painel.php'</script>";

    }
    else{
        echo('<br/>');
        echo('Dados incorretos, tente novamente.');
    }
}
else{
    echo('<br/>');
    echo('Usuario não existe');
}