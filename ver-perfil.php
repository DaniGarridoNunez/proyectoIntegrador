<?php 
     
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Perfil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&family=Ramabhadra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body class="ver-perfil">

<div style="min-height: 100vh; display: flex; flex-direction: column;">

<?php include 'includes/templates/header.php' ?>

    <div class="contenedor">
        <div class="grid contenedor-grid">
            <aside>
                <div>
                    <img style="width: 250px;" src="build/img/verPerfilImg.png" alt="imagen perfil">
                    <p>Paciente</p>
                </div>
            </aside>
            <article>
                <div class="contenedor-article">
                    <div class="row">
                        <div>
                            <h4>Nombre</h4>
                            <p>Daniel</p>
                        </div>
                        <div>
                            <h4>Apellidos</h4>
                            <p>Garrido Nuñez</p>
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <h4>Fecha nacimiento</h4>
                            <p>14-02-2002</p>
                        </div>
                        <div>
                            <h4>Correo</h4>
                            <p>danigarridonunez@gmail.com</p>
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            <h4>Descripción</h4>
                            <p>Soy estudiante en la Universidad Europea, me gusta ir al gimnasio y en mi tiempo libre me gusta continuar aprendiendo.</p>
                        </div>
                    </div>
                    <div class="editar-btn">
                        <button>Editar perfil</button>
                    </div>
                </div>
            </article>
        </div>
    </div>
    


<?php include 'includes/templates/footer.php' ?>


</div>
    <script src="build/js/index.js"></script>
</body>
</html>