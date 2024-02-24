<?php 
     require 'includes/app.php'; 
     use Intervention\Image\ImageManagerStatic as Image;
     session_start();


     $query = "SELECT * FROM usuarios WHERE id = {$_SESSION['id']} ";
     $resultado = mysqli_query($conexion, $query);

     $datos = mysqli_fetch_assoc($resultado);

     if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents("php://input"), true);

    $nombre = $data['nombre'] ?? null;
    $apellidos = $data['apellidos'] ?? null;
    $correo = $data['correo'] ?? null;
    $fecha = $data['fecha'] ?? null;
    $desc = $data['desc'] ?? null;
    // Trabajar con la imagen
    $imagen = $data['imagen'];
    
    if (strpos($imagen, 'http') === false) {
        $decodedImageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagen));
        // Directorio donde se guardará la imagen
        $directory = 'pruebas/';
        // Crear el nombre del archivo
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg"; // Nombre de archivo que deseas asignar
        // Guardamos la imagen ya con codificación JPG
        file_put_contents("fotoPerfil/$nombreImagen", $decodedImageData);
        
        // Usamos Image Intervention para redimensionar la imagen a 600x600 y guardarla en el mismo directorio pero con una optimización del 70
        $image = Image::make("fotoPerfil/$nombreImagen")->fit(600,600);
        $image->encode('jpg')->save("fotoPerfil/$nombreImagen", 70);
    } else {
        // Dividir la URL en partes usando '/' como delimitador
        $partes = explode('/', $imagen);

        // Obtener el último elemento del array, que sería el nombre del archivo
        $nombreImagen = end($partes);

    }

        $query = "UPDATE USUARIOS 
        SET nombre = '{$nombre}', 
            apellido = '{$apellidos}', 
            correo = '{$correo}', 
            descripcion = '{$desc}', 
            fecha_nac = '{$fecha}', 
            foto = '{$nombreImagen}' 
        WHERE id = {$_SESSION['id']}";
        $resultado = mysqli_query($conexion, $query);

        if($resultado) {
            $_SESSION['foto'] = $nombreImagen;
        }
    }
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
        <form id="formulario-perfil" enctype="multipart/form-data">
        <div class="grid contenedor-grid formulario-perfil">
            <aside>
                <div class="cambiar-foto-perfil">
                    <div class="img-wrapper">
                        <img id="previewImage"  src="fotoPerfil/<?php echo $datos['foto']; ?>" alt="imagen perfil">
                    </div>
                    <label for="subir-archivo" class="custom-subir-archivo">
                        <span>Cambiar foto</span>
                        <input type="file" name="fotoPerfil" id="subir-archivo">
                    </label>
                </div>
            </aside>
            <article>
            <h1>Editar Perfil</h1>
                <div class="contenedor-article">
                    <div class="row">
                        <div>
                            <label for="nombre-perfil">Nombre</label>
                            <input type="text" name="nombre" id="nombre-perfil" value="<?php echo !empty($datos['nombre']) ? $datos['nombre'] : '' ?>">
                        </div>
                        <div>
                            <label for="apellidos-perfil">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos-perfil" value="<?php echo !empty($datos['apellido']) ? $datos['apellido'] : '' ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <label for="correo-perfil">Correo</label>
                            <input type="email" name="correo" id="correo-perfil" value="<?php echo $datos['correo']; ?>">
                        </div>
                        <div>
                            <label for="fecha-perfil">Fecha nacimiento</label>
                            <input type="date" name="fecha" id="fecha-perfil" value="<?php echo !empty($datos['fecha_nac']) ? $datos['fecha_nac'] : '' ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <label for="descripcion-perfil">Descripción</label>
                            <textarea name="desc" id="descripcion-perfil"><?php echo !empty($datos['descripcion']) ? $datos['descripcion'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="editar-btn">
                        <button type="submit">Guardar cambios</button>
                    </div>
                </div>
            </article>
        </div>
        </form>
    </div>
    


<?php include 'includes/templates/footer.php' ?>


</div>    
    <script src="build/js/index.js"></script>
    <script src="build/js/updatePerfil.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.js" integrity="sha512-Zt7blzhYHCLHjU0c+e4ldn5kGAbwLKTSOTERgqSNyTB50wWSI21z0q6bn/dEIuqf6HiFzKJ6cfj2osRhklb4Og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>