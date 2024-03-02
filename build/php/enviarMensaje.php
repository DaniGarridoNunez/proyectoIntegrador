<?php 
    require '../../includes/app.php';
    session_start();
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);

            $mensaje = $data['mensaje'];
            $idChat = $data['idChat'];
            
            $fechaEnvio = date('Y-m-d H:i:s');

            $query = "INSERT INTO mensajes(id_chat, id_usuario, mensaje, fecha_envio) VALUES ('{$idChat}', '{$_SESSION["id"]}', '{$mensaje}',  '{$fechaEnvio}')";
            $resultado = mysqli_query($conexion, $query);

            // if($resultado) {
            //     echo json_encode(array("registroExitoso" => true));
            // } else {
            //     echo json_encode(array("registroExitoso" => false, "errores" => $errores));
            // }
        }
 ?>