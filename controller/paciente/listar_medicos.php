<?php
require_once '../../models/Medico.php';
require_once '../../helpers/Valida.php';

$usuario = new Medico();
$valida = new Valida();
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//Caso tenha campos não preenchidos no formulario
if($valida->Campos($data) == true) {
    echo("<br/>");
    echo('Escolha uma opção por favor.');
    return;
}



foreach($usuario->findMedicos($data['categoria']) as $key => $value)
{

    echo("<br/>");
     echo("<table>");
     echo("<tr> Nome: ".$value->nome_medico."");
     echo("<td>CRM: ".$value->crm."</td></tr>");
    echo("<th ><button name='".$value->id_medico."' id='".$value->id_medico."' onclick='showConsultaCategoria(name)'  value='' >Marcar Consulta</button></th>");
    echo("</table>");

}