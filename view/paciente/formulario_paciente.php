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
                        <h1>Cadastro de paciente</h1>
                        <br/>

                        <form id="form_cadastro_paciente" class="" action="" method="POST">
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
                            <div>Digite seu telefone </div>
                            <br/>
                            <input type="text" required name="telefone" class="" placeholder="(53)999531917"/>
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

                        <h1>Login Paciente</h1>
                        <br/>

                            <form class="" id="form_login_paciente" action="" method="post">

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
                        <div class="tab"><a href="#signup">Ainda não é nosso cliente ? Clique aqui e  se cadastre agora!</a></div>
                        <br/>
                    </div>

                </div><!-- tab-content -->



    </div>
</div>

 <!-- Script para enviar dados de cadastro -->
<script type="text/javascript">

    jQuery(document).ready(function(){
        jQuery('#form_cadastro_paciente').submit(function(){
            var dados = jQuery( this ).serialize();

            jQuery.ajax({
                type: "POST",
                url: "../../controller/paciente/cadastro.php",
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
        jQuery('#form_login_paciente').submit(function(){
            var dados = jQuery( this ).serialize();

            jQuery.ajax({
                type: "POST",
                url: "../../controller/paciente/login.php",
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
</html>