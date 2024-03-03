<?php 
    require 'includes/app.php'; 
    session_start();
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
        <div>
            <h1>Paginas legales</h1>
            <div class="legales-bg">
                <div class="contenedor">
                    <div class="grid-legales">
                        <div>
                            <p>Aviso Legal</p>
                            <div class="legal-img">
                                <a href="aviso-legal.php">
                                    <img src="build/img/aviso_legal.png" alt="aviso legal imagen">
                                </a>
                            </div>
                        </div> <!-- grid 1 -->

                        <div>
                            <p>Política de Privacidad</p>
                            <div class="legal-img">
                                <a href="politica-privacidad.php">
                                    <img src="build/img/politica_privacidad.png" alt="politica privacidad imagen">
                                </a>
                            </div>
                        </div> <!-- grid 2 -->

                        <div>
                            <p>Política de Cookies</p>
                            <div class="legal-img">
                                <a href="politica-cookies.php">
                                    <img src="build/img/politica_cookies.png" alt="política cookies imagen">
                                </a>
                            </div>
                        </div> <!-- grid 3 -->
                    </div>
                </div>
            </div>
        </div>
    </main>
        
    
    <?php include 'includes/templates/footer.php' ?>
    
    <script src="build/js/index.js"></script>
</body>
</html>