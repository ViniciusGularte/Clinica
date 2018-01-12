<?php
/**
 * Created by PhpStorm.
 * User: vinicius
 * Date: 09/01/18
 * Time: 23:36
 */
session_start();
require_once '../models/Medico.php';
require_once '../models/Paciente.php';

    $id = $_SESSION['usuario'];
    $nivel = $_SESSION['acesso'];
    if($nivel == 'paciente'){
        $usuario = new Paciente();
    }
   else if($nivel == 'medico'){
       $usuario = new Medico();
    }

$usuario->setId($id);
$usuario->delete($id);
include 'session.php';


