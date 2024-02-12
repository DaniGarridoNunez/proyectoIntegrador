<?php

require '../../includes/app.php';
session_start();

// Verifica si se ha recibido una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos enviados como JSON y los decodifica
    $data = json_decode(file_get_contents("php://input"), true);

    // Verifica si se han recibido los datos 
    if (isset($data['nombre']) && isset($data['apellidos']) && isset($data['email']) && isset($data['password'])) {
        // Recoge el email y la contraseña
        $nombre = $data['nombre'];
        $apellidos = $data['apellidos'];
        $email = $data['email'];
        $password = $data['password'];
        $especialidad = $data['especialidad']; // Este campo debería coincidir con el nombre en el formulario
        $fecha = $data['fecha'];
        $desc = $data['desc'];


        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, fecha_nac, descripcion, rol ) VALUES ('$nombre', '$apellidos', '$email', '$passwordHash', '$especialidad', '$fecha', '$desc', 'profesional')";
        $resultado = mysqli_query($conexion, $query);
    } else {
        echo "Error: Datos incompletos.";
    }
} else {
    // Si no se ha recibido una solicitud POST, devuelve un mensaje de error
    echo "Error: No se ha recibido una solicitud POST.";
}
?>
