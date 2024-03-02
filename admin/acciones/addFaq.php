<?php

require '../../includes/app.php';
session_start();
if($_SESSION['rol'] !== 'admin') {
    header('Location: /proyectoIntegrador');
    exit;
}
// Verifica si se ha recibido una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos enviados como JSON y los decodifica
    $data = json_decode(file_get_contents("php://input"), true);

        // Hacer el query
        $query = "INSERT INTO faqs(pregunta, respuesta) VALUES (?, ?)";
    
        if($stmt = mysqli_prepare($conexion, $query)) {
            //Vincula los parámetros
            mysqli_stmt_bind_param($stmt, "ss", $pregunta, $respuesta);

            // Recoge la pregunta y la respuesta
            $pregunta = $data['pregunta'];
            $respuesta = $data['respuesta'];
            
            // Ejecuta la declaración
            if(mysqli_stmt_execute($stmt)) {
                echo json_encode(array("exito" => true));
            }
            
            // Cerramos la declaración
            mysqli_stmt_close($stmt);
        }

}
?>
