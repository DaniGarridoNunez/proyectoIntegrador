<?php 
    include 'includes/app.php';
    session_start();
    if(!isset($_SESSION['login'])) {
        header('Location: /proyectoIntegrador/login.php');
        exit;
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Psycologix</title>
    <link rel="icon" href="build/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&family=Ramabhadra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>

<?php include 'includes/templates/header.php' ?>

 <main>

    <div style="max-width: 850px; margin: 4rem auto;" id='calendar'>

    </div>
 
</main>
    

<?php include 'includes/templates/footer.php' ?>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
<script src="build/js/index.js"></script>
<script src="build/js/ver-citas.js"></script>
</body>
</html>