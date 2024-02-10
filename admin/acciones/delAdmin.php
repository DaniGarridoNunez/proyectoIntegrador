<?php
require '../../includes/app.php';
session_start();

// Verifica si se ha recibido una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos enviados como JSON y los decodifica
    $data = json_decode(file_get_contents("php://input"), true);

    // Verifica si se han recibido los datos de admin y adminId
    if (isset($data['admin']) && array_key_exists('adminId', $data)) {
        // Recoge el admin y el adminId
        $admin = $data['admin'];
        $adminId = $data['adminId'];

        if($admin) {
            $query = "DELETE FROM usuarios WHERE id = '$admin'";
            $resultado = mysqli_query($conexion, $query);
        } elseif($adminId) {
            $query = "DELETE FROM usuarios WHERE id = '$adminId'";
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
