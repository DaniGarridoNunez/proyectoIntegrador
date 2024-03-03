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
        #portada {
            position: relative;
            background-image: url("build/img/profesionales-bg.png");
            background-size: cover;
            background-position: center;
            height: 50vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            transition: filter 0.3s;
            /* Transición para el efecto de difuminado */
            overflow: hidden;
            /* Para asegurarse de que la superposición cubra todo el fondo */
        }

        #portada::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Color negro semitransparente */
        }

        .posi {
            position: relative;
        }

        #titulo {
            color: white;
        }

        #texto {
            color: black;
        }

        .move {
            text-align: left;
            color: rgba(255, 255, 255, 0.8);
        }




        #liderazgo {
            background-color: #C1429D;
            /* Fondo rosa */
            padding: 50px 50px;
            /* Espaciado interno */
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            margin-right: 10%;
            margin-left: 10%;
            border-radius: 20px;
            /* Borde redondeado */
            margin-top: 5%;
            margin-bottom: 2%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        }

        #liderazgo .texto {
            max-width: 60%;
            /* Ancho máximo del texto */
            color: #000;
            /* Color del texto */
            font-size: 20px;
            /* Tamaño del texto */
            font-family: 'Poppins', sans-serif;
            /* Fuente */
            line-height: 1.6;
            /* Altura de línea */
            padding-right: 20px;
            /* Espaciado a la derecha */
        }

        #liderazgo .imagen {
            position: relative;
            width: 40%;
            /* Ancho de la imagen */
            padding: 0 20px;
            /* Espaciado interno */
        }

        #liderazgo img {
            max-width: 100%;
            /* Ancho máximo de la imagen */
            border-radius: 20px;
            /* Borde redondeado */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            /* Sombra */
        }

        /* Media query para ajustar el diseño en pantallas más pequeñas */
        @media (max-width: 768px) {
            #liderazgo {
                flex-direction: column;
                /* Cambia la dirección del contenido en pantallas pequeñas */
                text-align: center;
                /* Alinea el texto al centro */
                padding: 50px 5%;
                /* Ajusta el espaciado interno */
            }

            #liderazgo .imagen {
                width: 100%;
                /* Ancho completo en pantallas pequeñas */
                margin-top: 20px;
                /* Espacio entre el texto y la imagen */
            }

            #liderazgo .texto {
                max-width: 100%;
                /* Ancho máximo del texto en pantallas pequeñas */
                padding-right: 0;
                /* Elimina el espaciado a la derecha en pantallas pequeñas */
            }
        }

        #infoImagen {
            width: 400px;
            height: 300px;
        }



        #liderazgo2 {
            background-color: #55B3E8;
            /* Fondo celeste */
            padding: 50px 6%;
            /* Espaciado interno */
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            margin-right: 10%;
            margin-left: 10%;
            border-radius: 20px;
            /* Borde redondeado */
            margin-top: 5%;
            margin-bottom: 2%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        }

        #liderazgo2 .texto2 {
            max-width: 60%;
            /* Ancho máximo del texto */
            color: #000;
            /* Color del texto */
            font-size: 20px;
            /* Tamaño del texto */
            font-family: 'Poppins', sans-serif;
            /* Fuente */
            line-height: 1.6;
            /* Altura de línea */
            padding-left: 20px;
            /* Espaciado a la izquierda */
        }

        #liderazgo2 .imagen2 {
            position: relative;
            width: 40%;
            /* Ancho de la imagen */
            padding: 0 20px;
            /* Espaciado interno */


        }

        #liderazgo2 img {
            max-width: 100%;
            /* Ancho máximo de la imagen */
            border-radius: 20px;
            /* Borde redondeado */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            /* Sombra */

        }

        /* Media query para ajustar el diseño en pantallas más pequeñas */
        @media (max-width: 768px) {
            #liderazgo2 {
                flex-direction: column-reverse;
                /* Cambia la dirección del contenido en pantallas pequeñas */
                text-align: center;
                /* Alinea el texto al centro */
                padding: 50px 5%;
                /* Ajusta el espaciado interno */
            }

            #liderazgo2 .imagen2 {
                width: 100%;
                /* Ancho completo en pantallas pequeñas */
                margin-top: 20px;
                /* Espacio entre el texto y la imagen */
            }

            #liderazgo2 .texto2 {
                max-width: 100%;
                /* Ancho máximo del texto en pantallas pequeñas */
                padding-left: 0;
                /* Elimina el espaciado a la izquierda en pantallas pequeñas */
                padding-top: 20px;
                /* Añade espacio superior en pantallas pequeñas */
            }
        }




        #contenedorCartas {
            margin-right: 10%;
            margin-left: 10%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            /* Alineación horizontal de las cartas */
            position: relative;
            /* Agregado para posicionar los círculos correctamente */
            z-index: 2;
            /* Asegura que las cartas estén sobre los círculos */
        }

        #tituloCartas {
            font-size: 45px;
            text-align: center;
            font-family: 'Tilt Warp', sans-serif;
            color: white;
            /* Cambio del color del texto */
        }

        .cartas {
            position: relative;
            width: calc(30% - 20px);
            /* Ajusta el ancho de las cartas según tu diseño */
            margin: 1%;
            overflow: hidden;
            border-radius: 20px;

            margin-bottom: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.7);
        }

        .cartas img {
            width: 100%;
            height: auto;
            transition: transform 0.5s ease;
        }

        .cartas:hover img {
            transform: scale(1.1);
        }

        .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(85, 179, 232, 0.7);
            overflow: hidden;
            width: 100%;
            height: 0;
            transition: .5s ease;
        }

        .cartas:hover .overlay {
            height: 50%;
            /* Mostrar solo el 50% del overlay en hover */
        }

        .text {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            text-align: center;
        }




        #fondoDfondo {
            background: linear-gradient(to bottom right, skyblue, pink, white);
        }

        /* Media query para ajustar el diseño en pantallas más pequeñas */
        @media (max-width: 768px) {
            #contenedorCartas {
                flex-direction: column;
                /* Cambia la dirección de flexión a columnas */
                align-items: center;
                /* Alineación vertical de las cartas */
            }

            .cartas {
                width: 90%;
                /* Ajusta el ancho de las cartas para que ocupen el 90% del contenedor */
            }
        }

        .txt-white {
            color: rgba(255, 255, 255, 0.8);
        }
    </style>

</head>

<body>
    <?php include 'includes/templates/header.php' ?>
    <div id="portada">



        <h1 id="titulo" class="posi">Profesionales</h1>


    </div>
    </div>

    </div>
    <h1 style="color: #C1429D;">Nuestros Nutricionistas</h1>
    <div id="contenedorCartas">
        <div class="cartas">
            <img src="fotoPerfil/profesional1.jpg" alt="Imagen" />
            <div class="overlay">
                <div class="text" style="font-size: 20px;">Luis Jerez <br><span style="font-size: 16px;">Cinco años de experiencia licenciado en la Universidad Europea de Madrid</span></div>
            </div>
        </div>
        <div class="cartas">
            <img src="fotoPerfil/profesional3.jpg" alt="Imagen" />
            <div class="overlay">
                <div class="text">Eric Hernandez <br><span style="font-size: 14px;">Cinco años de experiencia licenciado en la Universidad Europea de Madrid</span></div>
            </div>
        </div>
        <div class="cartas">
            <img src="fotoPerfil/profesional2.jpg" alt="Imagen" />
            <div class="overlay">
                <div class="text">Enrique Fernandez <br><span style="font-size: 14px;">Cinco años de experiencia licenciado en la Universidad Europea de Madrid</span></div>
            </div>
        </div>
    </div>
    <h1 style="color: #C1429D;">Nuestros Psicologos</h1>
    <div id="contenedorCartas">
        <div class="cartas">
            <img src="fotoPerfil/profesional4.jpg" alt="Imagen" />
            <div class="overlay">
                <div class="text">Angel Perez <br><span style="font-size: 14px;">Cinco años de experiencia licenciado en la Universidad Europea de Madrid</span></div>
            </div>
        </div>
        <div class="cartas">
            <img src="fotoPerfil/profesional5.jpg" alt="Imagen" />
            <div class="overlay">
                <div class="text">Mario Rodriguez <br><span style="font-size: 14px;">Cinco años de experiencia licenciado en la Universidad Europea de Madrid</span></div>
            </div>
        </div>
        <div class="cartas">
            <img src="fotoPerfil/profesional5.jpg" alt="Imagen" />
            <div class="overlay">
                <div class="text">Mario Rodriguez <br><span style="font-size: 14px;">Cinco años de experiencia licenciado en la Universidad Europea de Madrid</span></div>
            </div>
        </div>
    </div>



    <script>
        // Función para el efecto parallax
        window.addEventListener('scroll', function() {
            let scrollPosition = window.pageYOffset;
            document.getElementById('').style.backgroundPositionY = -scrollPosition * 0.5 + 'px';
        });
    </script>
</body>

<?php include 'includes/templates/footer.php' ?>
<script src="build/js/index.js"></script>
</body>

</html>