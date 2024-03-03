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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&family=Ramabhadra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">
    <style>
/* Reset */
* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

/* Main Styling */
html,
body {
	body {
  font-family: "Poppins", sans-serif;
  font-size: 1.6rem;
  line-height: 1.8;
}
	background: #ecf2f8;
}

h4 {
	font-size: 24px;
}

p {
	font-size: 14px;
}

blockquote {
	color: #fff;
}

/* Utility Classes */
.container {
	max-width: 1300px;
	margin: 0 auto;
	padding: 0 30px;
}

.small {
	font-size: 14px;
}

/* Grid */
#grid {
	padding: 80px 0;
}

#grid .container {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	gap: 20px;
}

/* Grid Box */
.grid-box {
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Sombras más suaves y definidas */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Agrega una transición suave para la sombra y la transformación */
}

.grid-box:hover {
    transform: translateY(-5px); /* Mueve ligeramente el contenedor hacia arriba en hover */
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2); /* Cambia la sombra en hover para que sea más pronunciada */
}
.grid-box-author {
	display: flex;
	align-items: center;
}

.grid-box-author img {
    border-radius: 50%;
    width: 100px; /* Ancho de la imagen */
    height: 100px; /* Altura de la imagen */
    margin-right: 20px;
    object-fit: cover; /* Para ajustar la imagen dentro del tamaño especificado */
}

.grid-box-author-title p:first-child {
	font-weight: 500;
	color: #fff;
}

.grid-box-author-title p:nth-child(2) {
	color: #fff;
}

.grid-box h4 {
	color: #fff;
	padding: 15px 0;
}

.grid-box-purple {
	background: #0F0559;
	background-image: url('/images/bg-pattern-quotation.svg');
	background-repeat: no-repeat;
	background-position: top right 50px;
}
.grid-box-gray {
	background: #166D9E;
}
.grid-box-navy {
	background: #3797CD;
}
.grid-box-white {
	background: #C1429D;
}

.grid-box-white p:first-child {
	color: #fff;
}

.grid-box-white h4 {
	color: #fff;
}

.grid-box-white p:nth-child(2),
.grid-box-white blockquote {
	color: #fff;
	opacity: 60%;
}

.grid-box-daniel {
	grid-row: 1;
	grid-column: 1/3;
}
.grid-box-jonathan {
	grid-row: 1;
	grid-column: 3/4;
}
.grid-box-kira {
	grid-row: 1/3;
	grid-column: 4/5;
}
.grid-box-jeanette {
	grid-row: 2/3;
	grid-column: 1/2;
}
.grid-box-patrick {
	grid-row: 2/3;
	grid-column: 2/4;
}



/* Mobile */
@media (max-width: 768px) {
	#grid .container {
		grid-template-columns: 1fr;
	}

	.grid-box-daniel,
	.grid-box-jonathan,
	.grid-box-kira,
	.grid-box-jeanette,
	.grid-box-patrick {
		grid-column: 1;
	}

	.grid-box-daniel {
		grid-row: 1;
	}
	.grid-box-jonathan {
		grid-row: 2;
	}
	.grid-box-kira {
		grid-row: 3;
	}
	.grid-box-jeanette {
		grid-row: 4;
	}
	.grid-box-patrick {
		grid-row: 5;
	}
}
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


	</style>
   
</head>

<body>
    <?php include 'includes/templates/header.php' ?>
    <div id="portada">
        
        
    
            <h1 id="titulo">Testimonios</h1>
          

</div>


<section id="grid">
    <div class="container">
        <div class="grid-box grid-box-purple grid-box-daniel">
            <div class="grid-box-author">
                <img src="build/img/t1.jpg" alt="" />
                <div class="grid-box-author-title">
                    <p>María García</p>
                    <p class="small">Paciente Satisfecha</p>
                </div>
            </div>
            <h4>
                Mi experiencia con Psycologix ha sido realmente transformadora. Cuando llegué por primera vez, estaba lidiando con una serie de problemas emocionales y mentales que afectaban todos los aspectos de mi vida. Desde mi primera sesión, sentí que estaba en buenas manos.
            </h4>
            <blockquote>
                “El equipo de Psycologix me brindó un espacio seguro para explorar mis emociones y desafíos personales. Su enfoque holístico y compasivo me ayudó a encontrar la claridad y el apoyo que necesitaba para avanzar. Estoy infinitamente agradecida por su ayuda.”
            </blockquote>
        </div>
        <div class="grid-box grid-box-gray grid-box-jonathan">
            <div class="grid-box-author">
                <img src="build/img/t2.jpg" alt="" />
                <div class="grid-box-author-title">
                    <p>Luis Pérez</p>
                    <p class="small">Paciente Recuperado</p>
                </div>
            </div>
            <h4>Gracias a Psycologix, he experimentado una transformación profunda en mi vida</h4>
            <blockquote>
                “Durante años, luché en silencio con mis problemas emocionales. Psycologix me proporcionó las herramientas y el apoyo necesarios para abordar mis desafíos de frente. Cada sesión fue una revelación, y cada paso del camino me sentí más fuerte y más capacitado para enfrentar la vida con confianza.”
            </blockquote>
        </div>
        <div class="grid-box grid-box-white grid-box-kira">
            <div class="grid-box-author">
                <img src="build/img/t3.jpg" alt="" />
                <div class="grid-box-author-title">
                    <p>Ana Rodríguez</p>
                    <p class="small">Paciente Agradecida</p>
                </div>
            </div>
            <h4>Mi experiencia con Psycologix ha sido verdaderamente transformadora y liberadora.</h4>
            <blockquote>
                “Cuando llegué a Psycologix por primera vez, estaba en un lugar oscuro y desesperado en mi vida. Me sentía atrapada en un ciclo interminable de ansiedad y depresión, sin ver una salida a mi sufrimiento. Pero desde mi primera sesión, supe que estaba en el lugar correcto. El equipo de Psycologix no solo me ofreció orientación y apoyo, sino que también me brindó herramientas prácticas para abordar mis problemas de manera efectiva. Cada sesión fue un paso más hacia la curación y la recuperación, y estoy increíblemente agradecida por el impacto positivo que han tenido en mi vida. Ahora me siento más fuerte, más centrada y más capaz de enfrentar los desafíos que la vida me presente. Recomiendo encarecidamente Psycologix a cualquiera que esté buscando un cambio real y duradero en su bienestar emocional y mental.”
            </blockquote>
        </div>
        <div class="grid-box grid-box-white grid-box-jeanette">
            <div class="grid-box-author">
                <img src="build/img/t4.jpg" alt="" />
                <div class="grid-box-author-title">
                    <p>Pablo Martínez</p>
                    <p class="small">Paciente Transformado</p>
                </div>
            </div>
            <h4>Una experiencia verdaderamente transformadora con un equipo excepcional</h4>
            <blockquote>
                “Psycologix ha sido un faro de esperanza en tiempos difíciles. Cada sesión fue una oportunidad para crecer, sanar y aprender más sobre mí mismo. No puedo agradecer lo suficiente al equipo de Psycologix por su dedicación y apoyo continuo.”
            </blockquote>
        </div>
        <div class="grid-box grid-box-navy grid-box-patrick">
            <div class="grid-box-author">
                <img src="build/img/t5.jpg" alt="" />
                <div class="grid-box-author-title">
                    <p>Isabel López</p>
                    <p class="small">Paciente Satisfecha</p>
                </div>
            </div>
            <h4>
                El apoyo y la orientación que recibí de Psycologix fueron fundamentales en mi proceso de curación, especialmente en mi viaje para perder peso. Gracias a su ayuda, he logrado alcanzar mis metas de salud y bienestar.
            </h4>
            <blockquote>
                “Psycologix no solo me ayudó a superar mis desafíos, sino que también me equipó con las habilidades y la confianza necesarias para enfrentar los desafíos futuros. Estoy profundamente agradecida por su compasión y experiencia.”
            </blockquote>
        </div>
    </div>
</section>





    <?php include 'includes/templates/footer.php'?>
    <script src="build/js/index.js"></script>
</body>
</html>
