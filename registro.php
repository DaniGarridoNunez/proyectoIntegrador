<?php 
    require 'includes/app.php'; 
    session_start();
    if(isset($_SESSION['login'])) {
        header('Location: /proyectoIntegrador');
        exit;
    } 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="icon" href="build/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&family=Ramabhadra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body class="main-login">
<script src="https://accounts.google.com/gsi/client" async defer></script>
<div class="grid-login">
        <div class="grid-p1" style="position: relative;">
            <div class="flex flex-gap-20 flex-align-v nav-top-left">
                <div>
                    <a href="/proyectoIntegrador">
                        <img class="logo" src="build/img/logo.png" alt="">
                    </a>
                </div>
                <p>Psycologix</p>
            </div> <!-- .flex -->

            <div class="flex flex-column">
                <div class="prueba">
                    <img src="build/img/loginImg.png" alt="">
                </div>
                <h3>Tu seguridad nos importa</h3>
                <p>Ciframos tus datos de punto a punto</p>
            </div>
        </div> <!-- 1p grid -->

        <div class="grid-p2">
            <div class="contenedor-p2">
                <h3>Bienvenido a Psycologix</h3>
                <p>Ingresa tus datos para crear una cuenta</p>

                <div class="errores-registro">
                    
                </div>

                <form class="login-formulario" method="POST">

                    <div class="contenedor-email">
                        <input type="email" name="email" placeholder="Email" id="emailInput">
                    </div>

                    <div class="contenedor-pass">
                        <div class="flex relative" style="margin-bottom: 0;">
                            <input type="password" name="password" placeholder="Password" id="passwordInput">
                            <div class="absolute right-0 top-0 bottom-0 flex flex-align-v" style="margin: 0px 10px 0px 0px;">
                                <img src="build/img/ver-contraseña.svg" class="ver-contraseña" alt="icono usuario" style="width: 24px;" height="24px">
                            </div>

                        </div>
                    </div>
                    
                    <div class="login-terms">
                        <div class="cb" style="margin-bottom: 0;">
                            <input type="checkbox" id="cb-terminos"> Aceptar <span style="margin-left: 4px;"><a href="/proyectoIntegrador/terminos-condiciones.php">  Términos y Condiciones</a></span>
                        </div>
                    </div>
                    <input type="submit" value="Registrarme ya!">
                </form>
                <div class="login-span"><span>Or sign up with</span></div>






                <div id="g_id_onload"
                    data-client_id="280389540177-hsabcdgdth80kk2an3ak95kalmfkqpg3.apps.googleusercontent.com"
                    data-callback="onSignIn">
                </div>

                <div style="margin: 0 auto;" class="g_id_signin" data-type="standard"></div>


                <div class="flex not-account">
                    <p>Ya tienes cuenta?</p>
                    <a href="/proyectoIntegrador/login.php">Inicia Sesion</a>
                </div>


            </div> <!-- .contenedor-p2 -->
        </div> <!-- 2p grid -->
    </div>
<script>
   function onSignIn(response) {
    console.log(response);
    var credential = response.credential;


    sendTokenToServer(credential);
   }

    function sendTokenToServer(credential) {

        fetch('procesar_token.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'credential=' + encodeURIComponent(credential)
        })
        .then(response => response.json())
        .then(data => {
            if(data.exito) {
            window.location.href = "/proyectoIntegrador";
        }
        })
        .catch(error => {
            console.error('Error:', error);
        })
    }

</script>
    <script src="build/js/index.js"></script>
    <script src="build/js/register.js"></script>
</body>
</html>