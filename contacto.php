<?php 
    require 'includes/app.php';
    session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Psycologix</title>
    <link rel="icon" href="build/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&family=Ramabhadra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body class="login">

    <?php include 'includes/templates/header.php' ?>

    <main>
        <div class="contacta-bg">
            <div>
                <h1>Contactanos</h1>
            </div>
        </div>
        <div class="contenedor contenedor-mapa">
            <div class="grid-contacto">
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1807.7443305451568!2d-3.9140898104333126!3d40.35894846029702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4191d176cc6ffb%3A0x105df55d7aaa0f9!2sAgencia%20Inform%C3%A1tica%20Y%20Comunicaciones%20De%20La%20Comunidad%20De%20Madrid!5e0!3m2!1ses!2ses!4v1706452196186!5m2!1ses!2ses" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div> <!-- grid 1 -->
                <div>
                    <div class="contenido-contacto">
                        <h3>Ponerse en contacto</h3>
                        <p>Estamos aquí para ayudarte. ¡Contactanos para cualquier pregunta, comentario o consulta que tengas! Tu satisfacción es nuestra prioridad.</p>
                        <div class="espaciador-contacto"></div>
                        <p class="direccion-contacto">C/ Olivos Nº15 Madrid, 28001</p>
                        <div class="datos-contacto">
                            <img src="build/img/icono-contacto.png" alt="icono contacto">
                            <div>
                                <p>917 845 182</p>
                                <p>contacto@psycologix.com</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- grid 2 -->
            </div>
        </div> <!-- .contenedor -->

         <div class="contenedor">
            <div>
                <h1>Formulario</h1>
                <div class="formulario-contenedor">
                    <form class="contacto-formulario" action="">
                        <div class="contenedor-doble">
                            <div class="contenedor-name">
                                <input id="nameInput" type="text" name="nombre" placeholder="NOMBRE">
                            </div>
                            <div class="contenedor-email">
                                <input id="emailInput" type="email" name="email" placeholder="E-MAIL">
                            </div>
                        </div>

                        <div class="contenedor-asunto">
                            <input id="asuntoInput" type="text" name="asunto" placeholder="ASUNTO">
                        </div>
                        
                        <div class="contenedor-textarea">
                            <textarea id="motivoInput" name="motivo" placeholder="Explique el motivo por el que desea contactar con nosotros"></textarea>
                        </div>
    
                        <input type="submit" value="Contactar">
                    </form>
                </div>
                
            </div>
         </div>
    </main>

    <?php include 'includes/templates/footer.php' ?>

    <script src="build/js/index.js"></script>
    <script src="build/js/contacto.js"></script>
</body>
</html>