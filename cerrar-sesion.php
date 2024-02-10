<?php 
    session_start();
    session_destroy();
    header('Location: /proyectoIntegrador/index.php'); 
 ?>