<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Clinica Martin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <!-- //for-mobile-apps -->
    <link href="../../css/login.css" rel="stylesheet" type="text/css" media="all" />
    <!-- js -->
    <script type="text/javascript" src="../../js/jQuery.js"></script>
    <!-- //js -->

</head>
<body id="wallpaper_login">



<div class="form-signin">
    <div class="alert" id="mensagem_login"></div>
    <div class="form form-login">
        <div class="tab-content">
            <div id="signup">
                <h1>Atualizar Dados  de paciente</h1>
                <br/>

                <form id="form_atualizar_paciente" class="" action="" method="POST">
                    <br/>
                    <br/>
                    <div>Digite seu nome</div>
                    <br/>
                    <input type="text" required name="nome" class="" />
                    <br/>
                    <div>Digite sua senha</div>
                    <br/>
                    <input type="password" required name="senha" />
                    <br/>
                    <div>Confirme sua senha</div>
                    <br/>
                    <input type="password" required name="senhaRepetida"/>
                    <br/>
                    <div>Digite seu telefone </div>
                    <br/>
                    <input type="text" required name="telefone" />
                    <br/>

                    <div id="resposta_atualizar"></div>

                    <br/>
                    <button type="submit" class="btn_login">Atualizar</button>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                </form>

            </div>




    </div>
</div>

<!-- Script para enviar dados de cadastro -->
<script type="text/javascript">

    jQuery(document).ready(function(){
        jQuery('#form_atualizar_paciente').submit(function(){
            var dados = jQuery( this ).serialize();

            jQuery.ajax({
                type: "POST",
                url: "../../controller/paciente/update.php",
                data: dados,
                success: function(data)
                {
                    $('#resposta_atualizar').html(data);
                }
            });

            return false;
        });
    });
</script>

</body>
</html>