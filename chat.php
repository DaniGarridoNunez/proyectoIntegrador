<?php
require 'includes/app.php';
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: /proyectoIntegrador/login.php');
    exit;
}

$idCita = $_GET['id'] ?? null;
$idProfesional = $_GET['id-profesional'] ?? null;
$idPaciente = $_GET['id-paciente'] ?? null;

if (!empty($_SESSION['id']) && $idCita !== null) {
    $query = "SELECT * FROM chats WHERE id_cita = '{$idCita}' ";
    $resultadoCitas = mysqli_query($conexion, $query);
    $chats = mysqli_fetch_assoc($resultadoCitas);

    if (!$chats) {
        // Verificamos el rol del usuario
        if ($_SESSION['rol'] === 'profesional') {
            // Si el usuario es un profesional, intenta insertar el chat con su ID
            $query = "INSERT INTO chats (id_cita, id_profesional, id_paciente) VALUES ('{$idCita}', '{$_SESSION['id']}', '{$idPaciente}')";
        } elseif ($_SESSION['rol'] === 'paciente') {
            // Si el usuario es un paciente, intenta insertar el chat con su ID
            $query = "INSERT INTO chats (id_cita, id_profesional, id_paciente) VALUES ('{$idCita}', '{$idProfesional}', '{$_SESSION['id']}')";
        }

        $resultadoInsert = mysqli_query($conexion, $query);

        if (!$resultadoInsert) {
            echo "Error al crear el chat: " . mysqli_error($conexion);
            exit;
        }

        // Recuperamos los detalles del chat recién creado
        $query = "SELECT * FROM chats WHERE id_cita = '{$idCita}' ";
        $resultadoCitas = mysqli_query($conexion, $query);
        $chats = mysqli_fetch_assoc($resultadoCitas);
    }

    // Consulta detalles del paciente y mensajes del chat
    if ($_SESSION['rol'] === 'profesional') {
        $queryPaciente = "SELECT * FROM usuarios WHERE id = '{$chats["id_paciente"]}' ";
        $resultadoPaciente = mysqli_query($conexion, $queryPaciente);
        $paciente = mysqli_fetch_assoc($resultadoPaciente);
    } elseif ($_SESSION['rol'] === 'paciente') {
        $queryProfesional = "SELECT * FROM usuarios WHERE id = '{$chats["id_profesional"]}' ";
        $resultadoProfesional = mysqli_query($conexion, $queryProfesional);
        $profesional = mysqli_fetch_assoc($resultadoProfesional);
    }

    $queryMensajes = "SELECT * FROM mensajes WHERE id_chat = '{$chats["id"]}' ";
    $resultadoMensajes = mysqli_query($conexion, $queryMensajes);
} else {
    // header('Location: /proyectoIntegrador');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat - Psycologix</title>
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
                        <?php if ($_SESSION['rol'] === 'profesional') : ?>
                            <img src="fotoPerfil/<?php echo $paciente['foto']; ?>" alt="imagen perfil">
                            <p><?php echo !empty(trim($paciente['nombre'])) && !empty(trim($paciente['apellido'])) ? $paciente['nombre'] . ' ' . $paciente['apellido'] : $paciente['correo']; ?></p>
                        <?php elseif ($_SESSION['rol'] === 'paciente') : ?>
                            <img src="fotoPerfil/<?php echo $profesional['foto']; ?>" alt="imagen perfil">
                            <p><?php echo !empty(trim($profesional['nombre'])) && !empty(trim($profesional['apellido'])) ? $profesional['nombre'] . ' ' . $profesional['apellido'] : $profesional['correo']; ?></p>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="chat-mensajes">
                    <div class="chat">
                        <header>
                            <div class="flex flex-gap-20 flex-align-v">
                            <?php if ($_SESSION['rol'] === 'profesional') : ?>
                                <img src="fotoPerfil/<?php echo $paciente['foto']; ?>" alt="imagen perfil">
                                <p><?php echo !empty(trim($paciente['nombre'])) && !empty(trim($paciente['apellido'])) ? $paciente['nombre'] . ' ' . $paciente['apellido'] : $paciente['correo']; ?></p>
                            <?php elseif ($_SESSION['rol'] === 'paciente') : ?>
                                <img src="fotoPerfil/<?php echo $profesional['foto']; ?>" alt="imagen perfil">
                                <p><?php echo !empty(trim($profesional['nombre'])) && !empty(trim($profesional['apellido'])) ? $profesional['nombre'] . ' ' . $profesional['apellido'] : $profesional['correo']; ?></p>
                            <?php endif; ?>
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