<?php session_start();
if($_SESSION['acesso'] == NULL){
    echo("<script>alert('Você não tem acesso para acessar essa pagina, faça login por favor.');window.top.location='../index.php';</script>");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Clinica Martin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <!-- //for-mobile-apps -->
    <link href="../css/header.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- js -->
    <script type="text/javascript" src="../js/Consulta.js"></script>
    <script type="text/javascript" src="../js/jQuery.js"></script>
    <!-- //js -->

</head>
<body>
<?php include "layouts/header.php"; ?>
<section>

<?php
if($_SESSION['acesso'] =='paciente'){
    echo('<form method="post" id="lista_medicos">');
    echo('<label>Procurar medico por categoria:  </label>');
    echo('<br/>');
    echo("        <select name=\"categoria\">
                        <option value=\"\">Escolha uma opção</option>
                        <option value=\"Oftamologista\">Oftamologista</option>
                        <option value=\"Dermatologia\">Dermatologia</option>
                        <option value=\"Homeopatia\">Homeopatia</option>
                        <option value=\"Nutrologia\">Nutrologia</option>
                        <option value=\"Ortopedia e traumatologia\">Ortopedia e traumatologia</option>
                        <option value=\"Cirurgia torácica\">Cirurgia torácica</option>
                        <option value=\"Cardiologista\">Cardiologista</option>
                        <option value=\"Clinico Geral\">Clinico Geral</option>
                        <option value=\"Urologia\">Urologia</option>

                    </select>");
    echo('<button type="submit">Procurar</button>');
    echo('</form>');
}
else if($_SESSION['acesso'] == 'medico'){
    echo('<form method="post" id="lista_consultas">');
    echo('<h4>Visualize suas consultas pendentes na data respectiva:</h4>');
    echo('<br/>');
    echo("<input type='date' name='data'/>");

    echo('<button type="submit">Visualizar</button>');
    echo('</form>');

}

?>
    <div id="conteudo_painel">

    </div>
</section>
</body>
<!-- Script para realizar pesquisa -->
<script type="text/javascript">

    jQuery(document).ready(function(){
        jQuery('#lista_medicos').submit(function(){
            var dados = jQuery( this ).serialize();
            jQuery.ajax({
                type: "POST",
                url: "../controller/paciente/listar_medicos.php",
                data: dados,
                success: function(data)
                {
                    $('#conteudo_painel').html(data);
                }
            });

            return false;
        });
    });
</script>
<script type="text/javascript">

    jQuery(document).ready(function(){
        jQuery('#lista_consultas').submit(function(){
            var dados = jQuery( this ).serialize();
            jQuery.ajax({
                type: "POST",
                url: "../controller/medico/listar_consultas.php",
                data: dados,
                success: function(data)
                {
                    $('#conteudo_painel').html(data);
                }
            });

            return false;
        });
    });
</script>


</html>