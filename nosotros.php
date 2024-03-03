<?php 
    require 'includes/app.php'; 
    session_start();
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Psycologix</title>
    <link rel="icon" href="build/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&family=Ramabhadra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">
    <style>

#titulo{
            color: rgba(255, 255, 255, 0.8);
            position: relative;
        }

        #portada {
            position: relative; 
            background-image: url("build/img/testimonios.jpg");
            background-size: cover;
            background-position: center;
            height: 50vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            transition: filter 0.3s; /* Transición para el efecto de difuminado */
            overflow: hidden; /* Para asegurarse de que la superposición cubra todo el fondo */
        }

        #portada::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Color negro semitransparente */
        }

        #sobre-nosotros {
            background-color: #166D9E;
            padding: 50px 50px; /* Ajuste de los márgenes */
            margin: 0 auto; /* Centrar el contenido */
            max-width: 1200px; /* Establecer un ancho máximo */
            border-radius: 15px; /* Bordes redondeados */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.8);
        }

        .cartas-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        @media (max-width: 768px) {

    #sobre-nosotros {
        margin-right: 1%; /* Cambia el valor según tus preferencias */
        margin-left: 1%; /* Cambia el valor según tus preferencias */
    }
}

        .carta {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.8);
            width: calc(33.33% - 20px); /* Tamaño de las cartas */
            text-align: center;
            border: 1px solid black;
        }

        .carta h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* Estilos específicos para el contenido dentro de las cartas */
        .carta p {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            color: #333333;
        }

        @media (max-width: 768px) {
            .carta {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 480px) {
            .carta {
                width: calc(100% - 20px);
            }
        }

        
#liderazgo {
            background-color: #166D9E; /* Fondo rosa */
            padding: 50px 50px; /* Espaciado interno */
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            margin-right: 10%;
            margin-left: 10%;
            border-radius: 20px; /* Borde redondeado */
            margin-top: 5%;
            margin-bottom: 2%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        }

        #liderazgo .texto {
            max-width: 60%; /* Ancho máximo del texto */
            color: #000; /* Color del texto */
            font-size: 20px; /* Tamaño del texto */
            font-family: 'Poppins', sans-serif; /* Fuente */
            line-height: 1.6; /* Altura de línea */
            padding-right: 20px; /* Espaciado a la derecha */
        }

        #liderazgo .imagen {
            position: relative;
            width: 40%; /* Ancho de la imagen */
            padding: 0 20px; /* Espaciado interno */
        }

        #liderazgo img {
            max-width: 100%; /* Ancho máximo de la imagen */
            border-radius: 20px; /* Borde redondeado */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Sombra */
        }

        /* Media query para ajustar el diseño en pantallas más pequeñas */
        @media (max-width: 768px) {
            #liderazgo {
                flex-direction: column; /* Cambia la dirección del contenido en pantallas pequeñas */
                text-align: center; /* Alinea el texto al centro */
                padding: 50px 5%; /* Ajusta el espaciado interno */
            }

            #liderazgo .imagen {
                width: 100%; /* Ancho completo en pantallas pequeñas */
                margin-top: 20px; /* Espacio entre el texto y la imagen */
            }

            #liderazgo .texto {
                max-width: 100%; /* Ancho máximo del texto en pantallas pequeñas */
                padding-right: 0; /* Elimina el espaciado a la derecha en pantallas pequeñas */
            }
        }
        #infoImagen{
            width: 400px;
            height: 300px;
        }

      

        #liderazgo2 {
        background-color:#C1429D; /* Fondo celeste */
        padding: 50px 6%; /* Espaciado interno */
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        margin-right: 10%;
        margin-left: 10%;
        border-radius: 20px; /* Borde redondeado */
        margin-top: 5%;
        margin-bottom: 2%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
    }

    #liderazgo2 .texto2 {
        max-width: 60%; /* Ancho máximo del texto */
        color: #000; /* Color del texto */
        font-size: 20px; /* Tamaño del texto */
        font-family: 'Poppins', sans-serif; /* Fuente */
        line-height: 1.6; /* Altura de línea */
        padding-left: 20px; /* Espaciado a la izquierda */
    }

    #liderazgo2 .imagen2 {
        position: relative;
        width: 40%; /* Ancho de la imagen */
        padding: 0 20px; /* Espaciado interno */
        
        
    }

    #liderazgo2 img {
        max-width: 100%; /* Ancho máximo de la imagen */
        border-radius: 20px; /* Borde redondeado */
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Sombra */
        
    }

    /* Media query para ajustar el diseño en pantallas más pequeñas */
    @media (max-width: 768px) {
        #liderazgo2 {
            flex-direction: column-reverse; /* Cambia la dirección del contenido en pantallas pequeñas */
            text-align: center; /* Alinea el texto al centro */
            padding: 50px 5%; /* Ajusta el espaciado interno */
        }

        #liderazgo2 .imagen2 {
            width: 100%; /* Ancho completo en pantallas pequeñas */
            margin-top: 20px; /* Espacio entre el texto y la imagen */
        }

        #liderazgo2 .texto2 {
            max-width: 100%; /* Ancho máximo del texto en pantallas pequeñas */
            padding-left: 0; /* Elimina el espaciado a la izquierda en pantallas pequeñas */
            padding-top: 20px; /* Añade espacio superior en pantallas pequeñas */
        }
    }
.txt-white{
    color: white;
}
#txt{
    color: white;
    text-align: left;
}

    </style>
   
</head>

<body>
    <?php include 'includes/templates/header.php' ?>
    <div id="portada">
        <h1 id="titulo">Nosotros</h1>
    </div>

    <div id="liderazgo">
        <div class="texto">
            <h1 class="move" id="txt">Porque lideramos el mercado</h1>
            <p class="txt-white">Porque somos los mejores en psicología. En Psycologix, nos esforzamos por brindar servicios de la más alta calidad para garantizar el bienestar y la felicidad de nuestros pacientes. Nuestro equipo de profesionales altamente calificados está comprometido con su salud mental y emocional.</p>
        </div>
        <div class="imagen">
            <img src="build/img/stick2.jpg"" alt="Imagen" id="infoImagen" />
        </div>
    </div>

    <div id="liderazgo2">
    <div class="imagen2">
        <img src="build/img/stick4.jpg"  alt="Imagen" id="infoImagen" />
    </div>
    <div class="texto2">
        <h1 class="move" id="txt">Nuestros profesionales</h1>
        <p class="txt-white">Nuestro equipo de psicólogos está compuesto por profesionales altamente cualificados y dedicados. Cada uno de ellos cuenta con una amplia experiencia en diversas áreas de la psicología y está comprometido con brindar el mejor cuidado a nuestros clientes.</p>
    </div>
</div>
<br><br>
    <section id="sobre-nosotros">
        <h2 class="txt-white">Sobre Nosotros</h2> <br>
        <p class="txt-white">En Psycologix, nos dedicamos a brindar apoyo integral a aquellas personas que enfrentan trastornos de la conducta alimentaria (TCA). Nuestro compromiso radica en facilitarles el acceso a la ayuda profesional necesaria para superar estos desafíos. Nos enorgullece ofrecer servicios especializados de nutricionistas, así como la posibilidad de consultar con psicólogos expertos en el tema.<br><br>

Entendemos que cada individuo tiene necesidades únicas, por lo que nuestra página web está diseñada con el propósito de establecer un vínculo cercano entre los usuarios y los profesionales de la salud mental. Creemos firmemente en la importancia de una atención personalizada y dedicada, y por ello nos esforzamos por crear un entorno donde la comunicación sea fluida y efectiva.<br><br>

Además de proporcionar recursos y asistencia, nuestra plataforma también se centra en satisfacer las necesidades específicas de nuestros usuarios. Entendemos que buscar ayuda puede resultar abrumador, por lo que nos esforzamos por hacer que el proceso sea lo más cómodo y accesible posible. En Psycologix, estamos aquí para acompañarte en tu viaje hacia la recuperación y el bienestar emocional.</p>

    </section>

    <br><br>



    <?php include 'includes/templates/footer.php'?>
    <script src="build/js/index.js"></script>
</body>
</html>