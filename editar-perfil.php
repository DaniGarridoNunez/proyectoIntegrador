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
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&family=Ramabhadra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.css" integrity="sha512-bs9fAcCAeaDfA4A+NiShWR886eClUcBtqhipoY5DM60Y1V3BbVQlabthUBal5bq8Z8nnxxiyb1wfGX2n76N1Mw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="ver-perfil">

<div style="min-height: 100vh; display: flex; flex-direction: column;">

<?php include 'includes/templates/header.php' ?>

    <div class="contenedor">
        <div class="grid contenedor-grid formulario-perfil">
            <aside>
                <div class="cambiar-foto-perfil">
                    <div class="img-wrapper">
                        <img id="previewImage"  src="fotoPerfil/<?php echo $datos['foto']; ?>" alt="imagen perfil">
                    </div>
                    <label for="subir-archivo" class="custom-subir-archivo">
                        <span>Cambiar foto</span>
                        <input type="file" name="" id="subir-archivo">
                    </label>
                </div>
            </aside>
            <article>
            <h1>Editar Perfil</h1>
                <div class="contenedor-article">
                    <div class="row">
                        <div>
                            <label for="nombre-perfil">Nombre</label>
                            <input type="text" name="" id="nombre-perfil" value="<?php echo !empty($datos['nombre']) ? $datos['nombre'] : '' ?>">
                        </div>
                        <div>
                            <label for="apellidos-perfil">Apellidos</label>
                            <input type="text" name="" id="apellidos-perfil" value="<?php echo !empty($datos['apellido']) ? $datos['apellido'] : '' ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <label for="correo-perfil">Correo</label>
                            <input type="email" name="" id="correo-perfil" value="<?php echo $datos['correo']; ?>">
                        </div>
                        <div>
                            <label for="fecha-perfil">Fecha nacimiento</label>
                            <input type="date" name="" id="fecha-perfil" value="<?php echo !empty($datos['fecha_nac']) ? $datos['fecha_nac'] : '' ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <label for="descripcion-perfil">Descripción</label>
                            <textarea name="" id="descripcion-perfil"><?php echo !empty($datos['fecha_nac']) ? $datos['fecha_nac'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="editar-btn">
                        <button>Guardar cambios</button>
                    </div>
                </div>
            </article>
        </div>
    </div>
    


<?php include 'includes/templates/footer.php' ?>


</div>
    <script src="build/js/index.js"></script>
    <script src="build/js/updatePerfil.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>