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

    // Verifica si se han recibido los datos de email y password
    if (isset($data['email']) && isset($data['password'])) {
        // Recoge el email y la contraseña
        $email = $data['email'];
        $password = $data['password'];

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuarios(correo, password, rol) VALUES ('$email', '$passwordHash', 'admin')";
        $resultado = mysqli_query($conexion, $query);
    } else {
        // Si no se reciben los datos esperados, devuelve un mensaje de error
        echo "Error: Datos incompletos.";
    }
} else {
    // Si no se ha recibido una solicitud POST, devuelve un mensaje de error
    echo "Error: No se ha recibido una solicitud POST.";

}
?>
