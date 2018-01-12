<?php
require_once '../../models/Consulta.php';
session_start();
$usuario = new Consulta();
$paciente = $_SESSION['usuario'];
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);



$usuario->setData($data['data']);
$usuario->setIdMedico($data['medico']);
$usuario->setIdPaciente($paciente);
$usuario->setObservacao($data['observacoes']);


$resultado =$usuario->find();
if($resultado != NULL){

echo "<script> alert('Ja existe consulta marcada para esse dia com esse médico, verifique outros médicos da área ou tente outra data.'); window.location.top('../../view/painel.php');</script>";
    return;
}


// Realiza a inserção da consulta
if($usuario->insert()){
    echo "<script>alert('Cadastrado com sucesso!'); window.location.top('../../view/painel.php');</script>";
    return;
}
else{
    echo "<script>alert('Erro no cadastro');window.location.top('../../view/painel.php');</script>";
    return;
}

