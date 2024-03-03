<?php 
    require 'includes/app.php'; 
    session_start();
    if(!isset($_SESSION['login'])) {
        header('Location: /proyectoIntegrador/login.php');
        exit;
    }

     $query = "SELECT * FROM usuarios WHERE rol = 'profesional'";
     $resultadoProfesional = mysqli_query($conexion, $query);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedir Cita</title>
    <link rel="icon" href="build/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&family=Ramabhadra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body class="pedir-cita">

<?php include 'includes/templates/header.php' ?>

    <main>

            <div class="contenedor w-1200">
                <div class="grid">
                    <aside>
                        <h3>Pasos</h3>
                        <div class="lista">
                            <div class="item">
                                <span>1</span>
                                <div>
                                    <p class="count">Paso 1</p>
                                    <p>Elige especialidad</p>
                                </div>
                            </div> <!-- paso 1 -->
                            <div class="item">
                                <span>2</span>
                                <div>
                                    <p class="count">Paso 2</p>
                                    <p>Elige modalidad</p>
                                </div>
                            </div> <!-- paso 1 -->
                            <div class="item">
                                <span>3</span>
                                <div>
                                    <p class="count">Paso 3</p>
                                    <p>Elige profesional</p>
                                </div>
                            </div> <!-- paso 1 -->
                            <div class="item">
                                <span>4</span>
                                <div>
                                    <p class="count">Paso 4</p>
                                    <p>Selecciona fecha</p>
                                </div>
                            </div> <!-- paso 1 -->
                        </div>
                    </aside>
                    
                    <article>
                        <form id="miFormulario" method="POST" style="height: 100%;">
                            <div class="contenedor-form">
                                <div class="form paso1 active">
                                    <h1>Elige el tipo de cita</h1>
                                    <div class="form-imgs">
                                        <div>
                                            <h3>Nutricionista</h3>
                                            <img src="build/img/formulario-nutricionista.jpg" alt="imagen opcion nutricionista" data-value="nutricionista">
                                        </div>
    
                                        <div>
                                            <h3>Psicólogo</h3>
                                            <img src="build/img/formulario-psicologo.webp" alt="imagen opcion psicólogo" data-value="psicologo">
                                        </div>
                                    </div> <!-- .form-imgs -->
                                </div> <!-- .paso1 -->
    
                                <div class="form paso2">
                                    <h1>Elige la modalidad</h1>
                                    <div class="form-imgs">
                                        <div>
                                            <h3>Presencial</h3>
                                            <img src="build/img/formulario-presencial.jpg" alt="imagen opcion presencial" data-value="presencial">
                                        </div>
    
                                        <div>
                                            <h3>Videollamada</h3>
                                            <img src="build/img/formulario-videollamada.jpeg" alt="imagen opcion videollamada" data-value="videollamada">
                                        </div>
                                    </div> <!-- .form-imgs -->
                                    <button type="button" id="anteriorBtn">Anterior</button>
                                </div> <!-- .paso2 -->
    
                                <div class="form paso3">
                                    <h1>Elige un profesional</h1>
                                    
                                    <div class="form-imgs cards">

                                        <?php while($profesional = mysqli_fetch_assoc($resultadoProfesional)): ?>
                                            <div class="card">
                                                <img src="fotoperfil/<?php echo $profesional['foto']; ?>" alt="imagen opcion <?php echo $profesional['especialidad'] ?>" data-value="<?php echo $profesional['id']; ?>">
                                                <h3> <?php echo $profesional['nombre'] . ' ' . $profesional['apellido']; ?> </h3>
                                                <p> <?php echo $profesional['descripcion']; ?> </p>
                                            </div>
                                        <?php endwhile; ?>

                                        
                                    </div> <!-- .form-imgs -->
                                        
                                    <button type="button" class="prev-btn">&lt;</button>
                                    <button type="button" class="next-btn">&gt;</button>

                                    <button type="button" id="anteriorBtn">Anterior</button>
                                </div> <!-- .paso3 -->
                                
                                <div class="form paso4">
                                    <h1>Selecciona una fecha</h1>
                                    <div class="calendar-container">
                                        <input type="hidden" id="fecha" placeholder="Selecciona una fecha">
                                    </div>
                                    <div class="last-step">
                                        <button type="button" id="anteriorBtn">Anterior</button>
                                        <input type="submit" value="PEDIR CITA">
                                    </div>
                                        
                                </div> <!-- .paso4 -->                            
                            </div>
                        </form>
                    </article>

                </div>
            </div>

    </main>

<?php include 'includes/templates/footer.php' ?>
    
    <script src="build/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="build/js/pedir-cita.js"></script>
</body>
</html>