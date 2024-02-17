<?php 
    require 'includes/app.php'; 

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = mysqli_real_escape_string($conexion, $_POST['email']);
        $password = mysqli_real_escape_string($conexion, $_POST['password']);

        $query = "SELECT id, correo, rol
        FROM usuarios
        WHERE correo = '$email'
        ";

        // Primero comprobamos que exista el email en nuestra base de datos
        $resultado = mysqli_query($conexion, $query);
        if( mysqli_num_rows($resultado) > 0 ) {
            $row = mysqli_fetch_assoc($resultado);

            $id = $row['id'];

            // Recogemos todos los datos del usuario que trata de iniciar sesión
            $sql = "SELECT * FROM usuarios WHERE id =  '$id' ";
            $resultado = mysqli_query($conexion, $sql);

            // Lanzamos el query
            if($resultado) {
                $usuario = mysqli_fetch_assoc($resultado);

                // Verificamos la contraseña
                $auth = password_verify($password, $usuario['password']);

                // En caso de que la contraseña sea correcta, inciamos sesión
                if($auth) {

                    session_start();
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['usuario'] = $usuario['correo'];
                    $_SESSION['rol'] = $usuario['rol'];
                    $_SESSION['login'] = true;

                    // En función de que rol tenga el usuario, será redirigido a un lugar u a otro
                    switch ($_SESSION['rol']) {
                        case 'paciente':
                            header('Location: /proyectoIntegrador/index.php');
                            break;
                        case 'admin':
                            header('Location: /proyectoIntegrador/admin/index.php');
                            break;
                        case 'profesional':
                            header('Location: /proyectoIntegrador/profesionales/index.php');
                            break;
                    }

                // En caso de que la contraseña sea incorrecta, lanzamos el error
                } else {
                    $errores[] = "CONTRASEÑA INCORRECTA!";
                }

            }

        // En caso de que no exista el email, indicamos el error al usuario
        } else {
            $errores[] = "EL USUARIO NO EXISTE";
        }





    }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
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
                <h3>Bienvenido de vuelta</h3>
                <p>Ingresa tus detalles para iniciar sesion</p>

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
                    
                    <a class="olvidado-contraseña" href="#">He olvidado mi contraseña</a>
                    
                    <input type="submit" value="Iniciar Sesion">
                
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
                    <p>No tienes una cuenta?</p>
                    <a href="/proyectoIntegrador/registro.php">Registrate</a>
                </div>
            </div> <!-- .contenedor-p2 -->
        </div> <!-- 2p grid -->
    </div>
    <script src="build/js/index.js"></script>
    <script src="build/js/login.js"></script>
</body>
</html>