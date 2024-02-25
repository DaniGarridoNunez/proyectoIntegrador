<?php
require 'includes/app.php';
// Inicia la sesión si no está iniciada
session_start();

// Función para decodificar y verificar el token de credencial con Google
function decodeCredential($credential) {
    $client = new Google_Client(['client_id' => '280389540177-hsabcdgdth80kk2an3ak95kalmfkqpg3.apps.googleusercontent.com']);
    $payload = $client->verifyIdToken($credential);
    
    if ($payload) {
        $decodedPayload = json_decode(json_encode($payload), false);
        return $decodedPayload;
    } else {
        return null;
    }
}

// Recibe el token de credencial enviado desde el cliente
// Recibe el token de credencial enviado desde el cliente
if(isset($_POST['credential'])) {
    $credential = $_POST['credential'];

    // Aquí puedes validar el token de credencial con Google para garantizar su autenticidad
    // Luego, puedes extraer información del usuario, como su correo electrónico, desde el token

    // Por ejemplo, para extraer el correo electrónico del usuario:
    $decodedCredential = decodeCredential($credential);
    if ($decodedCredential) {
        $email = $decodedCredential->email;
        error_log('Contenido de $decodedCredential: ' . print_r($decodedCredential, true));
        // Prepara la consulta para verificar si el usuario ya está registrado
        $query = "SELECT * FROM usuarios WHERE correo = '$email'";
        $resultado = mysqli_query($conexion, $query);
        $usuario = mysqli_fetch_assoc($resultado);
        // Verifica si el usuario ya está registrado
        if(mysqli_num_rows($resultado) == 0) {
            // Si el usuario no está registrado, inserta el nuevo usuario en la base de datos
            $insercion = "INSERT INTO usuarios (correo, rol, foto) VALUES ('$email', 'paciente', 'default.jpg')";
            if(mysqli_query($conexion, $insercion)) {
                // Registro exitoso
                $query = "SELECT * FROM usuarios WHERE correo = '$email'";
                $result = mysqli_query($conexion, $query);
                $usuario = mysqli_fetch_assoc($result);

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['usuario'] = $email;
                $_SESSION['rol'] = $usuario['rol'];
                $_SESSION['foto'] = $usuario['foto'];
                $_SESSION['login'] = true;
                echo "Registro y inicio de sesión exitosos como $email";
            } else {
                // Error al registrar al usuario
                error_log('Error al registrar al usuario en la base de datos');
                echo "Error al registrar al usuario en la base de datos";
            }
        } else {
            // El usuario ya está registrado, simplemente iniciamos sesión
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['usuario'] = $email;
            $_SESSION['rol'] = $usuario['rol'];
            $_SESSION['foto'] = $usuario['foto'];
            $_SESSION['login'] = true;
            echo "Inicio de sesión exitoso como $email";
        }

        // Cierra la conexión a la base de datos
        mysqli_close($conexion);
    } else {
        // Envía una respuesta de error si falla la verificación del token de credencial
        echo "Error: Token de credencial no válido";
    }
} else {
    // Envía una respuesta de error si no se proporciona el token de credencial
    echo "Error: Token de credencial no recibido";
}

?>
