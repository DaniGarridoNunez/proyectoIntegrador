<?php 
    include '../includes/app.php';
    session_start();
    if($_SESSION['rol'] !== 'profesional') {
        header('Location: /proyectoIntegrador');
        exit;
    }
    $query = "SELECT * FROM usuarios WHERE id = {$_SESSION['id']}";
    $resultado = mysqli_query($conexion, $query);

    if($resultado) {
        $usuario = mysqli_fetch_assoc($resultado);
    }
    $fechaHoy = date('Y-m-d');
    $query = "SELECT * FROM citas WHERE id_profesional = {$_SESSION['id']} AND dia_cita > '{$fechaHoy}' ";
    $resultadoCitas = mysqli_query($conexion, $query);

    $query = "SELECT * FROM citas WHERE id_profesional = {$_SESSION['id']} AND dia_cita < '{$fechaHoy}'";
    $resultadoCitas2 = mysqli_query($conexion, $query);

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
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
<div style="min-height: 100vh;">
<?php include '../includes/templates/header.php' ?>

<main>

<div class="contenedor w-100P">
    <div class="grid-dashboard">
        <aside class="aside1">

            <div>
                <img src="../fotoPerfil/<?php echo $usuario['foto']; ?>" alt="imagen perfil profesional"> 
            </div>

            <div class="info-perfil">
                <h3>Info perfil</h3>
                <p><span>Nombre: </span><?php echo $usuario['nombre']; ?></p>
                <p><span>Apellidos: </span><?php echo $usuario['apellido']; ?></p>
                <p><span>Fecha: </span><?php echo $usuario['fecha_nac']; ?></p>
                <p><span>Email: </span><?php echo $usuario['correo']; ?></p>
                <!-- <p><span>Descripción: </span>Soy apasionado en ayudar a la gente a transformar su cuerpo</p> -->
                <a href="../editar-perfil.php">
                    <button>Editar Perfil</button>
                </a>
            </div>

        </aside>

        <div class="main1">
            <header>
                <h2>Proximas citas</h2>
            </header>

            <main>
                <div class="head">
                    <span>Nombre</span>
                    <span>Apellidos</span>
                    <span>Fecha cita</span>
                    <span>Hora</span>
                    <span></span>
                </div>
                <?php while($citas = mysqli_fetch_assoc($resultadoCitas)): ?> 
                    <?php if($citas) {
                        $query = "SELECT * FROM usuarios WHERE id = {$citas['id_paciente']} ";
                        $resultadoPaciente = mysqli_query($conexion, $query);
                        $paciente = mysqli_fetch_assoc($resultadoPaciente);
                    } ?>
                    <!-- CITA -->
                    <div>
                        <span><?php echo $paciente['nombre']; ?></span>
                        <span><?php echo $paciente['apellido']; ?></span>
                        <span><?php $dividido = dividirHora($citas['dia_cita']); echo $dividido[0]; ?></span>
                        <span><?php 
                            $dividido = dividirHora($citas['dia_cita']);
                            $horaMinutos = explode(':', $dividido[1]); // Dividir la hora en horas, minutos y segundos
                            $horaFormateada = $horaMinutos[0] . ':' . $horaMinutos[1]; // Tomar solo las horas y los minutos
                            echo $horaFormateada;
                        ?></span>
                        <span class="logos">
                            <img src="/proyectoIntegrador/build/img/videoIcon.png" alt="icono videollamada">
                            <img src="/proyectoIntegrador/build/img/chatIcon.png" alt="icono chat">
                        </span>
                    </div>
                <?php endwhile; ?>
                    


            </main>
        </div>

        <div class="main2">
            <header>
                <h2>Anteriores citas</h2>
            </header>

            <main>
                <div class="head">
                    <span>Nombre</span>
                    <span>Apellidos</span>
                    <span>Fecha cita</span>
                    <span>Hora</span>
                    <span></span>
                </div>
                <?php while($citas = mysqli_fetch_assoc($resultadoCitas2)): ?> 
                    <?php if($citas) {
                        $query = "SELECT * FROM usuarios WHERE id = {$citas['id_paciente']} ";
                        $resultadoPaciente = mysqli_query($conexion, $query);
                        $paciente = mysqli_fetch_assoc($resultadoPaciente);
                    } ?>
                    <!-- CITA -->
                    <div>
                        <span><?php echo $paciente['nombre']; ?></span>
                        <span><?php echo $paciente['apellido']; ?></span>
                        <span><?php $dividido = dividirHora($citas['dia_cita']); echo $dividido[0]; ?></span>
                        <span><?php 
                            $dividido = dividirHora($citas['dia_cita']);
                            $horaMinutos = explode(':', $dividido[1]); // Dividir la hora en horas, minutos y segundos
                            $horaFormateada = $horaMinutos[0] . ':' . $horaMinutos[1]; // Tomar solo las horas y los minutos
                            echo $horaFormateada;
                        ?></span>
                        <span class="logos">
                            <img src="/proyectoIntegrador/build/img/videoIcon.png" alt="icono videollamada">
                            <img src="/proyectoIntegrador/build/img/chatIcon.png" alt="icono chat">
                        </span>
                    </div>
                <?php endwhile; ?>

            </main>
        </div>
        <aside class="aside2">
            <header>
                <h2>Mis pacientes</h2>
            </header>

            <main>
                
            
            <?php mysqli_data_seek($resultadoCitas, 0); ?>
            <?php while($citas2 = mysqli_fetch_assoc($resultadoCitas)): ?>
                
                    <?php if($citas2) {
                        $query = "SELECT * FROM usuarios WHERE id = {$citas2['id_paciente']} ";
                        $resultadoPaciente = mysqli_query($conexion, $query);
                        $paciente = mysqli_fetch_assoc($resultadoPaciente);
                    } ?>

                    <div class="paciente">
                    <img id="img-perfil" src="/proyectoIntegrador/fotoPerfil/<?php echo $paciente['foto']; ?>" alt="imagen perfil">
                    <span><?php echo $paciente['nombre'] . ' ' . $paciente['apellido']; ?></span>
                    <img class="img-icono-paciente" src="/proyectoIntegrador/build/img/chatIcon.png" alt="icono chat" data-value="<?php echo $citas2['id']; ?>">
                </div>
                   
            <?php endwhile; ?>
              

            </main>
        </aside>
    </div>
</div>

</main>

<?php include '../includes/templates/footer.php' ?>
</div>
<script>
    // Selecciona todas las imágenes con la clase 'img-icono-paciente'
const imagenes = document.querySelectorAll('.img-icono-paciente');

// Itera sobre cada imagen y agrega el evento de clic
imagenes.forEach(imagen => {
    imagen.addEventListener('click', function(e){
        let valor = imagen.getAttribute('data-value');
        window.location.href = "/proyectoIntegrador/chat.php?id=" + valor;
    });
});
</script>
<script src="build/js/index.js"></script>
</body>
</html>