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
                <h1>Atualizar Dados  do medico</h1>
                <br/>

                <form id="form_atualizar_medico" class="" action="" method="POST">
                    <br/>
                    <br/>
                    <div>Digite seu nome</div>
                    <br/>
                    <input type="text" required name="nome" class="" />
                    <br/>
                    <div>Escolha sua área de atuação </div>
                    <br/>
                    <select name="categoria">
                        <option value="">Escolha uma opção</option>
                        <option value="Oftamologista">Oftamologista</option>
                        <option value="Dermatologia">Dermatologia</option>
                        <option value="Homeopatia">Homeopatia</option>
                        <option value="Nutrologia">Nutrologia</option>
                        <option value="Ortopedia e traumatologia">Ortopedia e traumatologia</option>
                        <option value="Cirurgia torácica">Cirurgia torácica</option>
                        <option value="Cardiologista">Cardiologista</option>
                        <option value="Clinico Geral">Clinico Geral</option>
                        <option value="Urologia">Urologia</option>

                    </select>
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
            jQuery('#form_atualizar_medico').submit(function(){
                var dados = jQuery( this ).serialize();

                jQuery.ajax({
                    type: "POST",
                    url: "../../controller/medico/update.php",
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