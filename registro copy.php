<?php 
    require 'includes/app.php'; 

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $email = mysqli_real_escape_string($conexion, $_POST['email']);
        $password = mysqli_real_escape_string($conexion, $_POST['password']);

        // Consultar si el email ya esta registrado!
        $sql = "SELECT * FROM usuarios WHERE correo = '$email'";
        $resultado = mysqli_query($conexion, $sql);

        if( mysqli_num_rows($resultado) > 0 ) {
            $errores[] = "EL CORREO YA ESTA EN USO";
        } else {
            // ejecutar este código en caso de que no exista ya el correo
            if(isset($email) && isset($password)) {
                // hasheamos la password para que el dueño de la BD no pueda ver las claves de los usuarios
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                
                $sql = "INSERT INTO usuarios(correo, password, rol) VALUES ('$email', '$passwordHash', 'paciente')";
                $resultado = mysqli_query($conexion, $sql);
    
                if($resultado) {
                    
                    if( mysqli_affected_rows($conexion) > 0 ) {
                        header('Location: /proyectoIntegrador?registro=1');
                         
                    } else {
                        echo "No se pudo completar el registro :(";
                    }
    
                // else del if($resultado)
                } else {
                    echo "Error en la consulta: " . mysqli_error($conexion);
                }

            // else del if(isset($email) && isset($password))
            } else {
                echo "Los datos de correo electrónico y contraseña no están seteados";
            }
        }


        mysqli_close($conexion);
    }


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&family=Ramabhadra&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body class="main-login">
    <div class="grid-login">
        <div class="grid-p1" style="position: relative;">
            <div class="flex flex-gap-20 flex-align-v nav-top-left">
                <div>
                    <a href="/proyectoIntegrador">
                        <img class="logo" src="build/img/logo.png" alt="">
                    </a>
                </div>
                <p>Psycologix</p>
            </div> <!-- .flex -->

            <div class="flex flex-column">
                <div class="prueba">
                    <img src="build/img/loginImg.png" alt="">
                </div>
                <h3>Tu seguridad nos importa</h3>
                <p>Ciframos tus datos de punto a punto</p>
            </div>
        </div> <!-- 1p grid -->

        <div class="grid-p2">
            <div class="contenedor-p2">
                <h3>Bienvenido a Psycologix</h3>
                <p>Ingresa tus datos para crear una cuenta</p>

                <?php foreach($errores as $error): ?>
                    <div class="alerta error">
                        <?php echo $error; ?>
                    </div>
                <?php endforeach; ?>

                <form class="login-formulario" method="POST">

                    <div class="contenedor-email">
                        <input type="email" name="email" placeholder="Email" id="emailInput">
                    </div>

                    <div class="contenedor-pass">
                        <div class="flex relative" style="margin-bottom: 0;">
                            <input type="password" name="password" placeholder="Password" id="passwordInput">
                            <div class="absolute right-0 top-0 bottom-0 flex flex-align-v" style="margin: 0px 10px 0px 0px;">
                                <img src="build/img/ver-contraseña.svg" class="ver-contraseña" alt="icono usuario" style="width: 24px;" height="24px">
                            </div>

                        </div>
                    </div>
                    
                    <div class="login-terms">
                        <div class="cb" style="margin-bottom: 0;">
                            <input type="checkbox" id="cb-terminos"> Aceptar <span style="margin-left: 4px;"><a href="/proyectoIntegrador/terminos-condiciones.php">  Términos y Condiciones</a></span>
                        </div>
                    </div>
                    <input type="submit" value="Registrarme ya!">
                </form>
                <div class="login-span"><span>Or sign up with</span></div>
                <div class="login-icons">
                    <div>
                        <img src="build/img/google.png" alt="logo google">
                    </div>
                    <div>
                        <img src="build/img/facebook.png" alt="logo facebook">
                    </div>
                </div>
                <div class="flex not-account">
                    <p>Ya tienes cuenta?</p>
                    <a href="/proyectoIntegrador/login.php">Inicia Sesion</a>
                </div>
            </div> <!-- .contenedor-p2 -->
        </div> <!-- 2p grid -->
    </div>
    <script src="build/js/index.js"></script>
    <script src="build/js/register.js"></script>
</body>
</html>