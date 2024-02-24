<?php 
     require 'includes/app.php'; 
     session_start();


     $query = "SELECT * FROM usuarios WHERE id = {$_SESSION['id']} ";
     $resultado = mysqli_query($conexion, $query);

     $datos = mysqli_fetch_assoc($resultado);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Perfil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&family=Ramabhadra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body class="ver-perfil">

<div style="min-height: 100vh; display: flex; flex-direction: column;">

<?php include 'includes/templates/header.php' ?>

    <div class="contenedor">
        <div class="grid contenedor-grid">
            <aside>
                <div>
                    <img style="border-radius: 10px;" src="fotoPerfil/<?php echo $datos['foto'] ?>" alt="imagen perfil">
                    <p style="text-transform: uppercase;"><?php echo $_SESSION['rol']; ?></p>
                </div>
            </aside>
            <article>
                <div class="contenedor-article">
                    <div class="row">
                        <div>
                            <h4>Nombre</h4>
                            <p><?php echo $datos['nombre']; ?></p>
                        </div>
                        <div>
                            <h4>Apellidos</h4>
                            <p><?php echo $datos['apellido']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <h4>Fecha nacimiento</h4>
                            <p><?php echo $datos['fecha_nac']; ?></p>
                        </div>
                        <div>
                            <h4>Correo</h4>
                            <p><?php echo $datos['correo']; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <h4>Descripción</h4>
                            <p><?php echo !empty($datos['descripcion']) ? $datos['descripcion'] : '' ?></p>
                        </div>
                    </div>
                    <div class="editar-btn">
                        <button><a href="editar-perfil.php">Editar perfil</a></button>
                    </div>
                </div>
            </article>
        </div>
    </div>
    


<?php include 'includes/templates/footer.php' ?>


</div>
    <script src="build/js/index.js"></script>
</body>
</html>