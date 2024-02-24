<?php
require '../../includes/app.php';

// Verifica si se ha recibido una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos enviados como JSON y los decodifica
    $data = json_decode(file_get_contents("php://input"), true);

    // Verifica si se han recibido los datos 
    if (isset($data['email']) && $data['password']) {
        // Recoge el email y la contraseña
        $email = $data['email'];
        $password = $data['password'];

        // Consultar si el email ya está registrado
        $sql = "SELECT * FROM usuarios WHERE correo = '$email'";
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            $errores[] = "EL CORREO YA ESTÁ EN USO";
        } else {
            // Ejecutar este código en caso de que no exista ya el correo
            if (isset($email) && isset($password)) {
                // Hasheamos la password para que el dueño de la BD no pueda ver las claves de los usuarios
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO usuarios(correo, password, foto, rol) VALUES ('$email', '$passwordHash', 'default.jpg' ,'paciente')";
                $resultado = mysqli_query($conexion, $sql);

                if ($resultado) {
                    if (mysqli_affected_rows($conexion) > 0) {
                        // Recogemos todos los datos para iniciar la sesión
                        $sql = "SELECT * FROM usuarios WHERE correo = '$email' ";
                        $resultado = mysqli_query($conexion, $sql);

                        if ($resultado) {
                            $usuario = mysqli_fetch_assoc($resultado);

                            // Verificamos la contraseña
                            $auth = password_verify($password, $usuario['password']);

                            // En caso de que la contraseña sea correcta, iniciamos sesión
                            if ($auth) {
                                session_start();
                                $_SESSION['id'] = $usuario['id'];
                                $_SESSION['usuario'] = $usuario['correo'];
                                $_SESSION['rol'] = $usuario['rol'];
                                $_SESSION['foto'] = $usuario['foto'];
                                $_SESSION['login'] = true;
                                
                                // Registro exitoso
                                echo json_encode(array("registroExitoso" => true));
                            }
                        }
                    } else {
                        $errores[] = "No se pudo completar el registro :(";
                    }
                } else {
                    // $errores[] = "Error en la consulta: " . mysqli_error($conexion);
                }
            } else {
                $errores[] = "Los datos de correo electrónico y contraseña no están seteados";
            }
        }
    } else {
        $errores[] = "Error: Datos incompletos.";
    }
} else {
    $errores[] = "Error: No se ha recibido una solicitud POST.";
}

// Si hay errores, los enviamos como respuesta JSON
if (!empty($errores)) {
    echo json_encode(array("registroExitoso" => false, "errores" => $errores));
}
   


?>
