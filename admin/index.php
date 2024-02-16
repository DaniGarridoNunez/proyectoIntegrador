<?php 
    require '../includes/app.php'; 
    session_start();

    function truncarTexto($texto, $max = 50, $fin = '...') {
        if (strlen($texto) <= $max) return $texto;
        $subtexto = substr($texto, 0, $max - strlen($fin));
        return $subtexto . $fin;
    }

    $queryFaqs = "SELECT * FROM faqs";
    $resultadoFaqs = mysqli_query($conexion, $queryFaqs);

    $resultadoURL = $_GET['resultado'] ?? null;

    $queryAdmin = "SELECT * FROM usuarios WHERE rol = 'admin'";
    $resultadoAdmin = mysqli_query($conexion, $queryAdmin);
    
    $queryProfesional = "SELECT * FROM usuarios WHERE rol = 'profesional'";
    $resultadoProfesional = mysqli_query($conexion, $queryProfesional);
    
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&family=Ramabhadra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/proyectoIntegrador/build/css/app.css">
</head>
<body>
<main>

<?php include '../includes/templates/header.php' ?>

<div class="contenedor">
    <?php 
    switch ($resultadoURL) {
        case 1:
            echo '<p class="alerta exito">Administrador Creado Correctamente</p>';
            break;
        case 2:
            echo '<p class="alerta exito">Administrador Eliminado Correctamente</p>';
            break;
        case 3:
            echo '<p class="alerta exito">Profesional Creado Correctamente</p>';
            break;
        case 4:
            echo '<p class="alerta exito">Profesional Eliminado Correctamente</p>';
            break;
        case 5:
            echo '<p class="alerta exito">Pregunta Añadida Correctamente</p>';
            break;
        case 6:
            echo '<p class="alerta exito">Pregunta Eliminado Correctamente</p>';
            break;
    }
    ?>
</div>


<div class="contenedor">
    <div class="contenido-admin espaciado">

        <aside class="sidebar">
            <div>
                <ul class="lista-tareas">
                    <li>Añadir/Eliminar administrador</li>
                    <li>Añadir/Eliminar profesional</li>
                    <li>Añadir/Eliminar faq</li>
                </ul>
            </div>
        </aside>
        <div class="main-content">
            <div class="administrador forms">
                <form class="formulario-add-admin" method="POST">
                    <fieldset>

                        <legend>Añadir Administrador</legend>
                        
                        <div>
                            <label for="email-admin">Email:</label>
                            <input type="email" name="email-admin" id="email-admin">
                        </div>

                        <div>
                            <label for="password-admin">Password:</label>
                            <input type="password" name="password-admin" id="password-admin">
                        </div>

                        <div>
                            <input type="hidden" name="rol-admin" id="rol-admin" value="admin">
                        </div>

                        <input type="submit" value="Añadir Administrador">
                        
                    </fieldset>
                </form>

                <!-- ELIMINAR ADMINISTRADOR -->
                <form class="formulario-del-admin" method="POST" style="margin-top: 2rem;">
                    <fieldset>

                        <legend>Eliminar Administrador</legend>
                        
                        <div>
                            <label for="eliminar-admin">Elegir admin a eliminar</label>
                            <select name="eliminar-admin" id="eliminar-admin">
                                <option value="0" selected>-- Selecccione a eliminar --</option>
                                <?php while($admin = mysqli_fetch_assoc($resultadoAdmin)): ?>
                                    <option value="<?php echo $admin['id']; ?>"><?php echo $admin['correo']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div>
                            <p>O eliminalo según sea su ID:</p>
                        </div>
                        <div>
                            <label for="id-admin">ID:</label>
                            <input type="text" name="id-admin" id="id-admin">
                        </div>

                        <input type="submit" value="Eliminar Administrador">
                        
                    </fieldset>
                </form>
            </div> <!-- .administrador -->

            <div class="profesional forms oculto">
                <form class="formulario-add-profesional" method="POST">
                    <fieldset>
                        <legend>Añadir Profesional</legend>
                        
                        <div class="wrapper">
                            <div>
                                <label for="nombre-profesional">Nombre:</label>
                                <input type="text" class="name" name="nombre-profesional" id="nombre-profesional">
                            </div>
                            <div>
                                <label for="apellidos-profesional">Apellidos:</label>
                                <input type="text" class="ape" name="apellidos-profesional" id="apellidos-profesional">
                            </div>
                        </div>
                        
                        <div class="wrapper">
                            <div>
                                <label for="email-profesional">Email:</label>
                                <input type="email" name="email-profesional" id="email-profesional">
                            </div>

                            <div>
                                <label for="password-profesional">Password:</label>
                                <input type="password" name="password-profesional" id="password-profesional">
                            </div>
                        </div>
                        
                        <div class="wrapper">
                            <div>
                                <label for="especialidad-profesional">Especialidad:</label>
                                <select class="especialidad" name="especialidad-profesional" id="especialidad-profesional">
                                    <option value="nutricionista">Nutricionista</option>
                                    <option value="psicologo">Psicólogo</option>
                                </select>
                            </div>

                            <div>
                                <label for="fecha-nac-profesional">Fecha Nacimiento:</label>
                                <input type="date" name="fecha-nac-profesional" id="fecha-nac-profesional">
                            </div>
                        </div>

                        <div class="wrapper">
                            <div>
                                <label for="desc-profesional">Descripción:</label>
                                <textarea name="desc-profesional" id="desc-profesional"></textarea>
                            </div>

                            <div>
                                <input type="hidden" name="rol-profesional" id="rol-profesional" value="profesional">
                            </div>
                        </div>
                        

                        <input type="submit" value="Añadir Profesional">
                        
                    </fieldset>
                </form>

                <!-- ELIMINAR PROFESIONAL -->
                <form class="formulario-del-profesional" method="POST" style="margin-top: 2rem;">
                    <fieldset>

                        <legend>Eliminar Profesional</legend>
                        
                        <div>
                            <label for="eliminar-profesional">Elegir profesional a eliminar</label>
                            <select name="eliminar-profesional" id="eliminar-profesional">
                                <option value="0" selected disabled>--Elija a eliminar --</option>
                                <?php while($profesional = mysqli_fetch_assoc($resultadoProfesional)): ?>
                                    <option value="<?php echo $profesional['id'] ?>"> <?php echo $profesional['correo'] ?> </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div>
                            <p>O eliminalo según sea su ID:</p>
                        </div>
                        <div>
                            <label for="id-profesional">ID:</label>
                            <input type="text" name="id-profesional" id="id-profesional">
                        </div>

                        <input type="submit" value="Eliminar Profesional">
                        
                    </fieldset>
                </form>
            </div><!-- .profesional -->

            <div class="faq forms oculto">
                <form class="formulario" action="" method="POST">
                    <fieldset>
                        <legend>Añadir FAQ</legend>

                        <div>
                            <label for="pregunta">Pregunta:</label>
                            <input type="text" name="pregunta" id="pregunta">
                        </div>

                        <div>
                            <label for="respuesta">Respuesta:</label>
                            <input type="text" name="respuesta" id="respuesta">
                        </div>

                        <input type="submit" value="Añadir FAQ">
                    </fieldset>
                </form>
                <div class="table-faqs">
                    <table class="preguntas-respuestas" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pregunta</th>
                                <th>Respuesta</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
            
                        <tbody> <!-- Mostrar los resultados -->
                        <?php while($faqs = mysqli_fetch_assoc($resultadoFaqs)): ?>

                            <tr>
                                <td> <?php echo $faqs['id']; ?> </td>
                                <td> <?php echo truncarTexto($faqs['pregunta'], 30); ?> </td>
                                <td> <?php echo truncarTexto($faqs['respuesta'], 40); ?> </td>
                                <td>
                                    <form method="POST" class="w-100">
                                        <input type="hidden" name="id" value="<?php echo $faqs['id']; ?>">
                                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                                    </form>
                                    <button>
                                        <a href="/bienesraices/admin/propiedades/actualizar.php?id=<?php echo $faqs['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                                    </button>
                                </td>
                            </tr>

                        <?php endwhile; ?>
                    
                        </tbody>
                    </table>
                </div>
                
            </div><!-- .faq -->
        </div> <!-- .main.content -->

        </div>
    </div>
</main>

    <?php include '../includes/templates/footer.php' ?>
    <script src="../build/js/admin.js"></script>
</body>
</html>