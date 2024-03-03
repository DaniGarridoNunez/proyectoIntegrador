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
        html{
            scroll-behavior: smooth;
        }
        #titulo{
            color: rgba(255, 255, 255, 0.8);
            position: relative;
        }

        #portada {
            position: relative; 
            background-image: url("build/img/consulta.jpg");
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

        .cards-list {
            z-index: 0;
            width: 100%;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .card {
            margin: 30px auto;
            width: 300px;
            height: 300px;
            border-radius: 40px;
            box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);
            cursor: pointer;
            transition: 0.4s;
        }

        .card .card_image {
            width: inherit;
            height: inherit;
            border-radius: 40px;
        }

        .card .card_image img {
            width: inherit;
            height: inherit!important;
            border-radius: 40px;
            object-fit: cover;
        }

        .card .card_title {
            text-align: center;
            border-radius: 0px 0px 40px 40px;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            font-size: 30px;
            margin-top: -80px;
            height: 40px;
        }

        .card:hover {
            transform: scale(0.9, 0.9);
            box-shadow: 5px 5px 30px 15px rgba(0,0,0,0.25), 
            -5px -5px 30px 15px rgba(0,0,0,0.22);
        }

        .title-white {
            color: white;
        }

        .title-black {
            color: black;
        }

        @media all and (max-width: 500px) {
            .card-list {
                /* On small screens, we are no longer using row direction but column */
                flex-direction: column;
            }
        }

        #contenedor {
    padding: 50px 0; /* Reducir el espaciado interno */
    display: flex;
    align-items: center; /* Alinear elementos verticalmente */
    justify-content: space-between; /* Distribuir el espacio entre los elementos */
    position: relative;
    margin-right: 10%;
    margin-left: 10%;
    border-radius: 20px; /* Borde redondeado */
    margin-top: 5%;
    margin-bottom: 2%;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
    background-color: #166D9E; 
}

#contenedor #contenido {
    display: flex;
    flex-direction: column; /* Para que los elementos se apilen verticalmente */
    width: calc(60% - 20px); /* Ajustar el ancho del contenido y restar el espaciado interno */
}

#contenedor #image {
    display: none;
    position: relative;
    width: 40%; /* Ancho de la imagen */
    padding: 0 20px; /* Espaciado interno */
}

#titulo1 {
    font-size: 28px;
    color: rgba(255, 255, 255, 0.8);
    font-weight: bold;
}

#texto {
    max-width: 100%; /* Ancho máximo del texto */
    color: #000; /* Color del texto */
    font-size: 20px; /* Tamaño del texto */
    font-family: 'Poppins', sans-serif; /* Fuente */
    line-height: 1.6; /* Altura de línea */
    text-align: left;
    margin: 1% 4% 0% 0%;
    color: rgba(255, 255, 255, 0.8);
}
@media all and (max-width: 1100px) {
    #contenedor {
        flex-direction: column; /* Cambia la dirección de los elementos a columna en dispositivos móviles */
    }

    #contenedor #contenido {
        width: calc(100% - 20px); /* Ajusta el ancho del contenido para ocupar todo el espacio disponible */
        margin-bottom: 20px; /* Agrega un margen inferior al contenido */
    }

    #contenedor #image {
        width: calc(100% - 20px); /* Ajusta el ancho de la imagen para ocupar todo el espacio disponible */
    }
    #image{
        margin-bottom: 5%;
    }
}
#titulo-carta{
    color: #166D9E;
    background-color: white;
    font-size: 27px;
    position: relative;
}
    </style>
</head>

<body>
    <?php include 'includes/templates/header.php' ?>
    <div id="portada">
        <h1 id="titulo" class="posi">Consultas</h1>
    </div>

   <a href="#texto"> <div class="cards-list">
        <div class="card" onclick="mostrarInformacion('Videollamadas', 'Nuestros profesionales están altamente especializados y cuentan con todas las condiciones necesarias para ofrecerte un servicio excepcional a través de videollamadas. En un mundo cada vez más conectado digitalmente, entendemos la importancia de adaptarnos a las necesidades de nuestros clientes, y es por eso que hemos capacitado a nuestro equipo para brindar atención y asistencia de la más alta calidad, sin importar la distancia.', 'build/img/vll.jpg')">
            <div class="card_image"> <img src="build/img/c2.jpg" /> </div>
            <div class="card_title title-white">
            <div id="titulo-carta">Remoto</div>
            </div>
        </div> </a>

        <a href="#texto"> <div class="card" onclick="mostrarInformacion('Presencial', 'Nuestros profesionales se comprometen a brindar una atención dedicada y compasiva en cada consulta. Adaptándose a las necesidades individuales de cada paciente, fomentamos un ambiente de apoyo donde la comunicación abierta y la empatía son fundamentales. Más allá de cumplir con obligaciones laborales, nuestro equipo se esfuerza por generar confianza y transparencia, apoyando a los pacientes en su camino hacia una vida más saludable con atención integral y compromiso genuino.', 'build/img/cons.jpg')">
            <div class="card_image">
                <img src="build/img/c1.jpg" />
            </div>
            <div class="card_title title-white">
            <div id="titulo-carta">Presencial</div>
            </div>
        </div></a>

        <a href="#texto"><div class="card" onclick="mostrarInformacion('Nutricionistas', 'Nuestros nutricionistas están disponibles tanto de manera presencial como a través de videollamada, asegurando así un acceso flexible y conveniente para nuestros pacientes. Son altamente profesionales y comprometidos con brindar el mejor cuidado posible, adaptando sus servicios a las necesidades individuales de cada persona. Su enfoque integral y su dedicación los distinguen, ofreciendo orientación experta para ayudar a los pacientes a alcanzar sus objetivos de salud de manera efectiva y personalizada.', 'build/img/nut.jpg')">
            <div class="card_image">
                <img src="build/img/c3.jpg" />
            </div>
            <div class="card_title">
            <div id="titulo-carta">Nutricionistas</div>
            </div>
        </div></a>

        <a href="#texto"><div class="card" onclick="mostrarInformacion('Psicologos', 'Nuestros psicólogos están disponibles tanto en consulta presencial como a través de sesiones por videollamada, ofreciendo así opciones flexibles para nuestros pacientes. Son profesionales altamente cualificados y comprometidos que brindan apoyo experto y comprensión a quienes lo necesitan. Adaptan sus enfoques terapéuticos a las necesidades individuales de cada persona, proporcionando un ambiente seguro y de confianza donde los pacientes puedan explorar y abordar sus preocupaciones. Su dedicación y profesionalismo los distinguen, asegurando un acompañamiento integral para el bienestar mental y emocional de quienes atienden.', 'build/img/psi.jpg')">
            <div class="card_image">
                <img src="build/img/c4.jpg" />
            </div>
            <div class="card_title title-black">
            <div id="titulo-carta">Psicologos</div>
            </div>
        </div>
    </div></a>

    <div id="contenedor">
    <div id="image"></div>
    <div id="contenido">
        <div id="titulo1"></div>
        <div id="texto"></div>
    </div>
</div>

    <script>
function mostrarInformacion(titulo, texto, imgUrl) {
    var tituloElement = document.getElementById("titulo1");
    var textoElement = document.getElementById("texto");
    var imagenElement = document.getElementById("image");
    var contenedor = document.getElementById("contenedor");

 

    tituloElement.innerHTML = titulo;
    textoElement.innerHTML = texto;
    imagenElement.innerHTML = "<img src='" + imgUrl + "' alt='Imagen' style='max-width: 100%; border-radius: 20px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);' />";

    tituloElement.style.display = 'block';
    textoElement.style.display = 'block';
    imagenElement.style.display = 'block';
    contenedor.style.display = 'flex';
}
</script>

    <?php include 'includes/templates/footer.php'?>
    <script src="build/js/index.js"></script>
</body>
</html>
