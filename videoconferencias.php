<?php
require 'includes/app.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videoconferencia - Psycologix</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&family=Ramabhadra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">

    <style>
          .vd-bg {
    background-image: url("build/img/vd-bg.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    height: 40rem;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .vd-bg h1 {
    margin: 0;
    color: #FFF;
    font-size: 5rem;
    letter-spacing: 0.2rem;
  }
    </style>
</head>

<body class="login">

    <?php include 'includes/templates/header.php' ?>

    <main>
        <div class="vd-bg">
            <div>
                <h1>Videoconferencia</h1>
            </div>
        </div>
        <div class="contenedor">
            <h1>Aplicaciones que usamos</h1>

            <div style="margin-bottom: 5rem;" class="servicios">
                <div class="servicio">
                    <div class="contenido-servicio">
                        <div>
                            <h2>Microsoft Teams</h2>
                            <p> Usamos Microsoft Teams porque nos permite usar otras herramientas de Microsoft, a parte nos ofrece unos altos estandares de seguridad.</p>
                            <p>Nos facilita la creación de videoconferencias privadas con nuestros pacientes podiendoles invitar mediante un link unico.</p>
                            <p>Si quieres más información sobre la herramienta Microsoft Teams puedes acceder a su <a href="https://support.microsoft.com/es-es/office/introducci%C3%B3n-a-microsoft-teams-b98d533f-118e-4bae-bf44-3df2470c2b12">página web.</a></p>
                        </div>
                        <div class="img">
                            <img src="build/img/teams.png" alt="Logo Microsoft Teams">
                        </div>
                    </div>
                </div> <!-- .servicio -->

                <div class="servicio">
                    <div class="contenido-servicio">
                        <div>
                            <h2>Caracteristicas de nuestras videoconferencias</h2>
                            <p>Videoconferencia privada con el profesional deseado ya sea psicologo o nutricionista.</p>
                            <p>Adaptación de horarios y fechas a la disponibilidad del paciente.</p>
                            <p>Confirmación de asistencia a la videoconferencia 24 horas antes de la misma.</p>
                            <p>Cumplimiento del articulo 10 de la ley de sanidad de 1986 respecto al secreto del profesional.</p>
                        </div>
                        <div class="img">
                            <img src="build/img/videocall.jpeg" alt="Imagen de videollamada con un profesional">
                        </div>
                    </div>
                </div> <!-- .servicio -->
            </div> <!-- .servicios -->
        </div>


    </main>

    <?php include 'includes/templates/footer.php' ?>

    <script src="build/js/index.js"></script>
</body>

</html>