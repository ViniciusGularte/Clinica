<?php
require_once '../../models/Consulta.php';
require_once '../../helpers/Valida.php';

$usuario = new Consulta();
$valida = new Valida();
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
