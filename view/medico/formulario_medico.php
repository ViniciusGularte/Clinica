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
            <div hidden id="signup">
                <h1>Cadastro de médico</h1>
                <br/>

                <form id="form_cadastro_medico" class="" action="" method="POST">
                    <br/>
                    <div>Digite seu e-mail</div>
                    <br/>
                    <input type="text" required name="email" class="" placeholder="Ex: fulano@gmail.com"/>
                    <br/>
                    <br/>
                    <div>Digite seu nome</div>
                    <br/>
                    <input type="text" required name="nome" class="" placeholder="Ex: Jose Pedro"/>
                    <br/>
                    <div>Digite sua senha</div>
                    <br/>
                    <input type="password" required name="senha" class="" placeholder=""/>
                    <br/>
                    <div>Confirme sua senha</div>
                    <br/>
                    <input type="password" required name="senhaRepetida" class="" placeholder=""/>
                    <br/>
                    <div>Digite seu crm </div>
                    <br/>
                    <input type="text" required name="crm" class="" placeholder="564531917"/>
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

                    <div id="resposta_cadastro"></div>

                    <br/>
                    <button type="submit" class="btn_login">Vamos começar</button>
                    <br/>
                    <br/>
                    <br/>
                    <div class="tab"><a href="#login">Login</a></div>
                    <br/>
                </form>

            </div>

            <div id="login">

                <h1>Login Médico</h1>
                <br/>

                <form class="" id="form_login_medico" action="" method="post">

                    <label>Digite seu e-mail:
                        <input type="email" required name="email" class="" placeholder="Ex: user@gmail.com"/></label>
                    <br/>
                    <br/>
                    <label>Digite sua senha:
                        <input type="password" required name="senha" class="" placeholder=""/></label>
                    <br/>
                    <div id="resposta_login"></div>

                    <br/>
                    <button type="submit" class="btn_login">Logar</button>
                </form>
                <br/>
                <br/>
                <div class="tab"><a href="#signup">Ainda não é nosso funcionario ? Clique aqui e venha fazer parte da equipe!</a></div>
                <br/>
            </div>

        </div><!-- tab-content -->



    </div>
</div>

<!-- Script para enviar dados de cadastro -->
<script type="text/javascript">

    jQuery(document).ready(function(){
        jQuery('#form_cadastro_medico').submit(function(){
            var dados = jQuery( this ).serialize();

            jQuery.ajax({
                type: "POST",
                url: "../../controller/medico/cadastro.php",
                data: dados,
                success: function(data)
                {
                    $('#resposta_cadastro').html(data);
                }
            });

            return false;
        });
    });
</script>
<!-- Script para enviar dados de login -->
<script type="text/javascript">

    jQuery(document).ready(function(){
        jQuery('#form_login_medico').submit(function(){
            var dados = jQuery( this ).serialize();

            jQuery.ajax({
                type: "POST",
                url: "../../controller/medico/login.php",
                data: dados,
                success: function( data)
                {

                    $('#resposta_login').html(data);
                }
            });

            return false;
        });
    });
</script>

<!-- Script para gerar campo de cadastro ouuu campo de login -->

<script>
    $('.form').find('input, textarea').on('keyup blur focus', function (e) {

        var $this = $(this),
            label = $this.prev('label');

        if (e.type === 'keyup') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.addClass('active highlight');
            }
        } else if (e.type === 'blur') {
            if( $this.val() === '' ) {
                label.removeClass('active highlight');
            } else {
                label.removeClass('highlight');
            }
        } else if (e.type === 'focus') {

            if( $this.val() === '' ) {
                label.removeClass('highlight');
            }
            else if( $this.val() !== '' ) {
                label.addClass('highlight');
            }
        }

    });

    $('.tab a').on('click', function (e) {

        e.preventDefault();

        $(this).parent().addClass('active');
        $(this).parent().siblings().removeClass('active');

        target = $(this).attr('href');

        $('.tab-content > div').not(target).hide();

        $(target).fadeIn(600);

    });
</script>
</body>
