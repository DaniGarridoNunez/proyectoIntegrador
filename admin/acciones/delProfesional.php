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

    // Verifica si se han recibido los datos de admin y adminId
    if (isset($data['profesional']) && array_key_exists('profesionalId', $data)) {
        // Recoge el admin y el adminId
        $profesional = $data['profesional'];
        $profesionalId = $data['profesionalId'];

        if($profesional) {
            $query = "DELETE FROM usuarios WHERE id = '$profesional'";
            $resultado = mysqli_query($conexion, $query);
        } elseif($profesionalId) {
            $query = "DELETE FROM usuarios WHERE id = '$profesionalId'";
            $resultado = mysqli_query($conexion, $query);
        }

        // Realiza cualquier otra operación necesaria con los datos recibidos
    } else {
        echo "Error: Datos incompletos.";
    }
} else {
    echo "Error: No se ha recibido una solicitud POST.";
}
?>
