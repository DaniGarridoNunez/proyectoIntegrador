<?php 
require 'includes/app.php';
session_start();
$id = $_SESSION['id'];
$mostrarCitas = array(); // Inicializamos el array de citas

$query = "SELECT * FROM citas WHERE id_paciente = '{$id}' ";
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    while ($cita = mysqli_fetch_assoc($resultado)) {
        // Transformamos los datos de cada cita al formato requerido
        $citaTransformada = array(
            'id' => $cita['id'],
            'title' => 'Cita', // Siempre será 'Cita'
            'start' => date('Y-m-d\TH:i:s', strtotime($cita['dia_cita'])), // Convertimos la fecha al formato ISO8601
            'display' => 'block',
            'color' => '#166D9E'
        );
        // Agregamos la cita transformada al array de citas
        $mostrarCitas[] = $citaTransformada;
    }
    // Codificamos el array de citas como JSON y lo imprimimos
    echo json_encode($mostrarCitas);
}
?>
