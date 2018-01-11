<?php
$id = $_GET['id'];
echo("<form method='post' action='../controller/consulta/consulta.php' name='marcar_consulta'>");
echo("<label>Marcar Data: </label><input name='data' type='date'/>");
echo('<br/>');
echo("<div> Observações: </div>");
echo('<br/>');
echo("<textarea name='observacoes'></textarea>");
echo('<br/>');
echo("<input hidden name='medico' value='".$id."'/>");
echo("<input  value='Enviar' type='submit'/>");
echo("</form>");