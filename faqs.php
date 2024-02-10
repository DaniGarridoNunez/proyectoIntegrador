<?php 
    require 'includes/app.php'; 
    session_start();

    $query = "SELECT * FROM faqs";
    $resultado = mysqli_query($conexion, $query);
    
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Psycologix</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&family=Ramabhadra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>
    
<?php include 'includes/templates/header.php' ?>

    <main>
        <div class="contenedor-faqs-header">
            <div class="contenedor">
                <h1>Help Center</h1>
                <p>Search from over all our articles or contact an agent!</p>
                <div>
                    <input type="text" name="buscador" id="buscador">
                    <img src="build/img/icono-lupa.png" alt="imagen lupa buscador">
                </div>
            </div>
        </div>
    </main>

    <section class="contenedor contenido-faqs">
        <h2>FAQ</h2>
        <div class="contenedor w-1200">
            <ul class="preguntas-faq">
                <?php while($faq = mysqli_fetch_assoc($resultado)): ?>
                    <li>
                    <div>
                        <p> <?php echo $faq['pregunta']; ?> </p>
                        <img src="/proyectoIntegrador/build/img/icono-mas.png" alt="icono mas">
                    </div>
                    <div class="respuesta">
                        <p> <?php echo $faq['respuesta']; ?> </p>
                    </div>
                </li>    
                <?php endwhile; ?>
                
            </ul>
        </div>
    </section>
    

    <?php include 'includes/templates/footer.php' ?>

    <script src="build/js/index.js"></script>
    <script src="build/js/faqs.js"></script>
</bodyç>
</html>