<?php 
    require '../../includes/app.php';
    session_start();
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);

        if(isset($_SESSION['login']) ) {

            $idProfesional = $data['profesional'];
            $idPaciente = $_SESSION['id'];
            $tipoCita = $data['modalidad'];
            $diaCita = $data['fecha'];

            $query = "INSERT INTO citas(id_profesional, id_paciente, tipo_cita, dia_cita) VALUES ('$idProfesional', '$idPaciente', '$tipoCita', '$diaCita')";
            $resultado = mysqli_query($conexion, $query);

            if($resultado) {
                echo json_encode(array("registroExitoso" => true));
            } else {
                echo json_encode(array("registroExitoso" => false, "errores" => $errores));
            }
        }
    }
 ?>