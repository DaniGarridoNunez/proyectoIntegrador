<?php 
    require 'includes/app.php'; 
    session_start();
    // session_destroy();
    // echo '<pre>';
    // var_dump($_SESSION);
    // echo '</pre>';

    if(isset($_GET['registro']) && $_GET['registro'] == 1) { ?>
        <div class="modal-registro-exitoso">
        <div class="contenedor">
            <div class="contenido-modal-registro">
                <img src="build/img/registro-exito.png" alt="icono exito">
                <h2>Registro exitoso!</h2>
                <p>¡Te damos la bienvenida a nuestro sitio!</p>
                <p>¡Gracias por unirte a Psycologix!</p>
                <button class="btn-cerrar">Cerrar</button>
            </div>
        </div>
    </div>
<?php }
    $registro_modal = $_GET['registro'] ?? null;
    echo $registro_modal;

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Psycologix</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&family=Ramabhadra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>
    <div style="min-height: 100vh; display: flex; flex-direction: column;">
    
    <?php include 'includes/templates/header.php' ?>
        <div style="flex-grow: 1; display: flex; position:relative;">
        <video src="./build/video/fondo.mp4" class="video-cabecera" autoplay loop muted></video>
            <div class="contenedor" style="display: flex;">
                <div class="contenido-main">
                    <div class="izquierda-main">
                        <h1>Tu camino hacia la salud y el bienestar comienza aqui</h1>
                        <p>Bienvenido a Psycologix, tu refugio de apoyo y recuperación para trastornos alimenticios</p>
                        <button><a href="/proyectoIntegrador/registro.php">Registrarse gratis ya</a></button>
                    </div>
                    <div class="derecha-main">
                        <img src="build/img/fotoMain.png" alt="imagen main">
                    </div>
                </div>
            </div> <!-- fin main -->
        </div>
        
    </div>
        

    <main>
        <div class="profesionales-bg">
            <div class="contenedor">
            <h1>Nuestros profesionales</h1>
                <div class="p-cards" style="display: none;">
                    <div class="p-card">
                        <div class="p-foto">
                            <img src="build/img/profile-img.jpg" alt="foto perfil profesional">
                        </div>
                        <div>
                            <p>Jasmine Petrova</p>
                            <p>Psicóloga</p>
                        </div>
                    </div> <!-- .p-card -->
                    <div class="p-card">
                        <div class="p-foto">
                            <img src="build/img/profile-img.jpg" alt="foto perfil profesional">
                        </div>
                        <div>
                            <p>Jasmine Petrova</p>
                            <p>Psicóloga</p>
                        </div>
                    </div> <!-- .p-card -->
                    <div class="p-card">
                        <div class="p-foto">
                            <img src="build/img/profile-img.jpg" alt="foto perfil profesional">
                        </div>
                        <div>
                            <p>Jasmine Petrova</p>
                            <p>Psicóloga</p>
                        </div>
                    </div> <!-- .p-card -->
                    <div class="p-card">
                        <div class="p-foto">
                            <img src="build/img/profile-img.jpg" alt="foto perfil profesional">
                        </div>
                        <div>
                            <p>Jasmine Petrova</p>
                            <p>Psicóloga</p>
                        </div>
                    </div> <!-- .p-card -->
                </div> <!-- .p-cards -->
            </div>
        </div>

        <section>
            <div class="contenedor">
                <h1>Servicios</h1>

                <div class="servicios">
                    <div class="servicio">
                        <div class="contenido-servicio">
                            <div>
                                <h2>Videoconferencias con profesionales</h2>
                                <p> Nuestras asesorías personalizadas han demostrado ser la piedra angular para la recuperación de nuestros clientes. Cada día que esperes es un día menos para alcanzar una vida saludable y feliz.</p>
                                <p>Además contamos con un equipo de expertos altamente calificados y con un historial comprobado de éxito en el tratamiento de TCAs.</p>
                            </div>
                            <div class="img">
                                <img src="build/img/servicios-videoconferencias.jpg" alt="ilustracion Videoconferencias">
                            </div>
                        </div>
                    </div> <!-- .servicio -->
                     
                    <div class="servicio">
                        <div class="contenido-servicio">
                            <div>
                                <h2>Asesorias personalizadas</h2>
                                <p>Nuestras asesorías personalizadas han demostrado ser la piedra angular para la recuperación de nuestros clientes. Cada día que esperes es un día menos para alcanzar una vida saludable y feliz.</p>
                                <p>Además contamos con un equipo de expertos altamente calificados y con un historial comprobado de éxito en el tratamiento de TCAs.</p>
                            </div>
                            <div class="img">
                                <img src="build/img/servicios-asesorias.jpg" alt="ilustracion asesorias">
                            </div>
                        </div>
                    </div> <!-- .servicio -->
                </div> <!-- .servicios -->
            </div>
        </section>

        <section class="espaciado">
            <div class="contacto-section">
                <div class="contenedor">
                    <div>
                        <h2>Tu salud mental nos importa!</h2>
                        <p>Ponte en contacto con uno de nuestros profesionales para más información</p>
                        <a href="/proyectoIntegrador/contacto.php"><button>Contactar ahora</button></a>
                    </div>      
                </div>
            </div>
        </section>

        <section class="espaciado">
            <div class="contenedor">
                <h2>Nuestros casos de éxito</h2>
                <div class="grid-casos-exito">

                    <div class="card">
                        <div>
                            <img src="build/img/profile-img.jpg" alt="foto perfil">
                        </div>
                        <div>
                            <h3>Margaret Phelim</h3>
                            <p>Tengo problemas de sobrepeso, ahora llevo una dieta saludable y hago ejercicio, me encuentro mejor que nunca!</p>
                        </div>
                    </div> <!-- .card -->

                    <div class="card">
                        <div>
                            <img src="build/img/profile-img.jpg" alt="foto perfil">
                        </div>
                        <div>
                            <h3>Margaret Phelim</h3>
                            <p>Tengo problemas de sobrepeso, ahora llevo una dieta saludable y hago ejercicio, me encuentro mejor que nunca!</p>
                        </div>
                    </div> <!-- .card -->

                    <div class="card">
                        <div>
                            <img src="build/img/profile-img.jpg" alt="foto perfil">
                        </div>
                        <div>
                            <h3>Margaret Phelim</h3>
                            <p>Tengo problemas de sobrepeso, ahora llevo una dieta saludable y hago ejercicio, me encuentro mejor que nunca!</p>
                        </div>
                    </div> <!-- .card -->

                    <div class="card">
                        <div>
                            <img src="build/img/profile-img.jpg" alt="foto perfil">
                        </div>
                        <div>
                            <h3>Margaret Phelim</h3>
                            <p>Tengo problemas de sobrepeso, ahora llevo una dieta saludable y hago ejercicio, me encuentro mejor que nunca!</p>
                        </div>
                    </div> <!-- .card -->

                </div> <!-- .grid-casos-exito -->
            </div>
        </section>

    </main>
    

    <?php include 'includes/templates/footer.php' ?>

    <script src="build/js/index.js"></script>
</body>
</html>