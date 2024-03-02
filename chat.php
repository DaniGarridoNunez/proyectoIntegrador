<?php 
    require 'includes/app.php'; 
    session_start();

    $idCita = $_GET['id'] ?? null;

    if(!empty($_SESSION['id'])) {
        $query = "SELECT * FROM chats WHERE id_cita = '{$idCita}' ";
        $resultadoCitas = mysqli_query($conexion, $query);
        $chats = mysqli_fetch_assoc($resultadoCitas);
    
        $query = "SELECT * FROM usuarios WHERE id = '{$chats["id_paciente"]}' ";
        $resultadoPaciente = mysqli_query($conexion, $query);
        $paciente = mysqli_fetch_assoc($resultadoPaciente);
    
        $query = "SELECT * FROM mensajes WHERE id_chat = '{$chats["id"]}' ";
        $resultadoMensajes = mysqli_query($conexion, $query);
    } else {
        header('Location: /proyectointegrador/login.php');
    }
    
    
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
<body class="chat-page">
<div style="min-height: 100vh;">
<?php include 'includes/templates/header.php' ?>

<main>

    <div class="contenedor w-100P" style="padding: 2rem;">
        <div class="grid">
            <div class="chat-abiertos">
                <div class="flex flex-column">

                    <div class="flex flex-gap-20">
                        <img src="fotoPerfil/<?php echo $paciente['foto']; ?>" alt="imagen perfil">
                        <p><?php echo $paciente['nombre'] . ' ' . $paciente['apellido'];  ?></p>
                    </div>

                    <!-- <div class="flex flex-gap-20">
                        <img src="build/img/8cdf9a88159b22fbff639a33093ba2ff.jpg" alt="imagen perfil">
                        <p>Daniel Garrido Nuñez</p>
                    </div> -->

                </div>
            </div>
            <div class="chat-mensajes">
                <div class="chat">
                    <header>

                        <div class="flex flex-gap-20 flex-align-v">
                            <img src="fotoPerfil/<?php echo $paciente['foto']; ?>" alt="imagen perfil">
                            <p><?php echo $paciente['nombre'] . ' ' . $paciente['apellido']; ?></p>
                        </div>
                        
                        <div class="iconos">
                            <img src="build/img/chat-videollamada.png" alt="icono videollamada">
                            <img src="build/img/chat-telefono.png" alt="icono telefono">
                            <img src="build/img/chat-lupa.png" alt="icono lupa">
                        </div>

                    </header>

                    <main>

                    <?php while($mensajes = mysqli_fetch_assoc($resultadoMensajes)): ?>
                        <div class="<?php echo $_SESSION['id'] === $mensajes['id_usuario'] ? 'right' : 'left' ?>">
                                <p><?php echo $mensajes['mensaje']; ?></p>
                                <span><?php 
                                    $dividido = dividirHora($mensajes['fecha_envio']);
                                    $horaMinutos = explode(':', $dividido[1]); // Dividir la hora en horas, minutos y segundos
                                    $horaFormateada = $horaMinutos[0] . ':' . $horaMinutos[1]; // Tomar solo las horas y los minutos
                                    echo $horaFormateada;
                                ?></span>
                        </div>
                    <?php endwhile; ?>

                        <!-- <div class="left">
                                <p>Hola bro tienes los apuntes?</p>
                                <span>14:27</span>
                        </div>

                        <div class="right">
                            <p>Si la verdad, estan en el word eso si broski</p>
                            <span>14:40</span>
                        </div>

                        <div class="left">
                            <p>Va pues compartemelos</p>
                            <span>15:11</span>
                        </div> -->

                    </main>

                    <footer>

                        <form id="formulario-chat">
                            <input type="hidden" name="id-chat" id="id-chat" value="<?php echo $chats["id"]; ?>">
                            <input type="text" name="texto-enviar" id="texto-enviar">
                            <button style="padding: 0rem 1rem;"><img style="width: 24px; height: 24px;" src="build/img/chat-enviarMensaje.png" alt="icono enviar mensaje"></button>
                        </form>

                    </footer>
                </div>
            </div>
        </div>
    </div>

</main>


<?php include 'includes/templates/footer.php' ?>
</div>
<script src="build/js/chat.js"></script>
<script src="build/js/index.js"></script>
</body>
</html>