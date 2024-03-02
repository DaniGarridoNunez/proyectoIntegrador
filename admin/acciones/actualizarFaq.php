<?php 
require '../../includes/app.php'; 
session_start();
if($_SESSION['rol'] !== 'admin') {
    header('Location: /proyectoIntegrador');
    exit;
}

$query = "SELECT * FROM faqs WHERE id = ? ";

if($stmt = mysqli_prepare($conexion, $query)) {

    mysqli_stmt_bind_param($stmt, 'i', $idFaq);

    $idFaq = $_GET['id'];

    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt, $id, $pregunta, $respuesta);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $query = "UPDATE faqs SET pregunta = ?, respuesta = ? WHERE id = ? ";

    //Preparamos la declaración
    if($stmt = mysqli_prepare($conexion, $query)) {
        // Vinculamos los parámetros
        mysqli_stmt_bind_param($stmt, "ssi", $pregunta, $respuesta, $idFaq);

        // Asignamos valores
        $pregunta = $_POST['pregunta'];
        $respuesta = $_POST['respuesta'];
        $idFaq = $_GET['id'];

        // Ejecutamos la declaración
        mysqli_stmt_execute($stmt);

        // Cerrar la declaración
        mysqli_stmt_close($stmt);

        header('Location: ../index.php?resultado=7');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar FAQ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&family=Ramabhadra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/proyectoIntegrador/build/css/app.css">
</head>
<body>
<div style="min-height: 100vh;">
    <?php include '../../includes/templates/header.php' ?>

    <main class="contenedor flex flex-col flex-align-v" style="min-height: 70vh;">
        <form class="formularioExitoso" method="POST">
            <fieldset>
                <legend>Actualizar Pregunta</legend>

                <label for="pregunta">Pregunta:</label>
                <input type="text" name="pregunta" id="pregunta" value="<?php echo isset($pregunta) ? $pregunta : ''; ?>">

                <label for="respuesta">Respuesta:</label>
                <input type="text" name="respuesta" id="respuesta" value="<?php echo isset($respuesta) ? $respuesta : ''; ?>">

                <input type="submit" value="Actualizar">
            </fieldset>
        </form>
    </main>

    <?php include '../../includes/templates/footer.php' ?>
</div>
</body>
</html>