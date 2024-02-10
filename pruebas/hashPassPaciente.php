<?php
require 'includes/app.php';

// Selecciona las contraseñas actuales de la tabla administradores
$query = "SELECT id, password FROM usuarios WHERE rol = 'paciente' ";
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $id = $row['id'];
        $password = $row['password'];

        // Hashea la contraseña si no está ya hasheada
        if (!password_verify($password, $row['password'])) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Actualiza la contraseña hasheada en la base de datos
            $updateQuery = "UPDATE usuarios SET password = '$hashedPassword' WHERE id = $id";
            $updateResult = mysqli_query($conexion, $updateQuery);

            if (!$updateResult) {
                // Manejar el error si la actualización falla
                echo "Error al actualizar la contraseña para el usuario con ID $id: " . mysqli_error($conexion);
            }
        }
    }

    echo "Contraseñas actualizadas con éxito.";
} else {
    // Manejar el error si la consulta falla
    echo "Error al obtener las contraseñas de la base de datos: " . mysqli_error($conexion);
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
