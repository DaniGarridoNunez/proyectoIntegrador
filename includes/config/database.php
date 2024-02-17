<?php 

function getConexion() {
    $server = "localhost:3307";
    $user = "root";
    $password = "";
    $conexion = mysqli_connect($server, $user, $password) or die("Error con los datos de conexión de la base de datos");
    
    if (!$conexion) {
        die("No se ha realizado la conexión con la base de datos" . mysqli_error($conexion));
    } else {
        // echo "Conexión realizada con la base de datos" . "\n" . "<br>";
    }
    

    
    // Comprobamos y/o creamos la base de datos
    $comprobarDB = mysqli_query($conexion, "SHOW DATABASES LIKE 'psycologix'");
    if (mysqli_num_rows($comprobarDB) > 0) {
        // echo "La DB si existe, por lo tanto, está creada" . "\n";
    } else {
        // Si no detecta que existe la DATABASE, se crea
        // echo "La DB no existe, voy a crearla" . "\n" . "Creando..." . "\n" . "<br>";
    
        $sql = "CREATE DATABASE psycologix";
    
        if (mysqli_query($conexion, $sql)) {
            // echo "Base de datos creada con éxito!" . "\n" . "<br>";
        } else {
            echo "Error al crear la base de datos" . mysqli_error($conexion);
        }
    
        // Después de crear la base de datos, establecemos la conexión con la nueva base de datos
        $db = "psycologix";
        $conexion = mysqli_connect($server, $user, $password, $db) or die("Error con los datos de conexión de la base de datos");
    
            // CREAR TABLAS
    
              // Tabla MEDICO
        $sqlTablas = "
                CREATE TABLE IF NOT EXISTS usuarios (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(255) NULL,
                apellido VARCHAR(255) NULL,
                correo VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                especialidad VARCHAR(255) NULL,
                descripcion VARCHAR(255) NULL,
                fecha_nac DATETIME NULL,
                foto VARCHAR(200) NULL,
                rol VARCHAR(30) NOT NULL
            );
    
            CREATE TABLE IF NOT EXISTS citas (
                id INT AUTO_INCREMENT PRIMARY KEY,
                id_profesional INT NOT NULL,
                id_paciente INT NOT NULL,
                FOREIGN KEY (id_profesional) REFERENCES usuarios(id),
                FOREIGN KEY (id_paciente) REFERENCES usuarios(id),
                tipo_cita VARCHAR(255) NOT NULL,
                dia_cita DATE NOT NULL
            );
            
    
            CREATE TABLE IF NOT EXISTS faqs(
                id INT AUTO_INCREMENT PRIMARY KEY,
                pregunta VARCHAR(255) NOT NULL,
                respuesta VARCHAR(255) NOT NULL
            );
    
            CREATE TABLE IF NOT EXISTS testimonios(
                id INT AUTO_INCREMENT PRIMARY KEY,
                id_paciente INT NOT NULL,
                CONSTRAINT fk_pac FOREIGN KEY (id_paciente) REFERENCES usuarios(id),
                testimonio VARCHAR(255) NOT NULL
            );
    
        ";
                // Después de ejecutar el multi_query, hay que consumir todos los resultados antes de realizar otra consulta SQL, esto se puede "saltar" ejecutando las consultas 1 a 1, con un query normal
                if (mysqli_multi_query($conexion, $sqlTablas) ) {
                     while(mysqli_next_result($conexion)) {
                         if (!mysqli_more_results($conexion)) {
                             break;
                         }
                     }
    
                        echo "Tablas creadas con éxito" . "\n" . "<br>";
                    } else {
                        echo "Error al crear las tablas" . mysqli_error($conexion);
                    }
    
    
    
                // SQL para INSERTAR todos los DATOS
                $sqlInserts = "
                -- USUARIOS
                    -- PROFESIONALES
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Luis', 'Jerez', 'luisjerez@gmail.com', '1234', 'nutricionista', 'Cinco años de experiencia licenciado en la Universidad Europea de Madrid', '2000-10-23', 'pruebasProfesional2.jpg', 'profesional');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Eric', 'Hernandez', 'erichernandez@gmail.com', '1234', 'nutricionista', 'cinco años de experiencia licenciado en la Universidad Europea de Madrid', '1980-03-15', 'pruebasProfesional2.jpg', 'profesional');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Angel', 'Perez', 'angelperez@gmail.com', '1234', 'psicologo', 'cinco años de experiencia licenciado en la Universidad Europea de Madrid', '1992-07-30', 'pruebasProfesional2.jpg', 'profesional');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Mario', 'Rodriguez', 'mariorodriguez@gmail.com', '1234', 'psicologo', 'cinco años de experiencia licenciado en la Universidad Europea de Madrid', '1975-01-09', 'pruebasProfesional2.jpg', 'profesional');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Enrique', 'Fernandez', 'enriquefernandez@gmail.com', '1234', 'nutricionista', 'cinco años de experiencia licenciado en la Universidad Europea de Madrid', 'pruebasProfesional2.jpg', '1997-08-11', 'profesional');
                    
                    -- PACIENTES
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Fernando', 'Alonso', 'fernandoalonso@gmail.com', '1234', NULL, NULL, '2003-02-11', 'pruebas.jpg', 'paciente');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Enrique', 'Fernandez', 'enriquefernandez@gmail.com', '1234', NULL, NULL, '2001-01-23', 'pruebas.jpg', 'paciente');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Enrique', 'Fernandez', 'enriquefernandez@gmail.com', '1234', NULL, NULL, '2004-08-12', 'pruebas.jpg', 'paciente');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Enrique', 'Fernandez', 'enriquefernandez@gmail.com', '1234', NULL, NULL, '1990-09-08', 'pruebas.jpg', 'paciente');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Enrique', 'Fernandez', 'enriquefernandez@gmail.com', '1234', NULL, NULL, '1999-12-30', 'pruebas.jpg', 'paciente');
                    
                    -- ADMINISTRADORES
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, rol) VALUES (NULL, NULL, 'dani@admin.com', '1234', NULL, NULL, NULL, 'admin');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, rol) VALUES (NULL, NULL, 'hugo@admin.com', '1234', NULL, NULL, NULL, 'admin');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, rol) VALUES (NULL, NULL, 'josep@admin.com', '1234', NULL, NULL, NULL, 'admin');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, rol) VALUES (NULL, NULL, 'sara@admin.com', '1234', NULL, NULL, NULL, 'admin');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, rol) VALUES (NULL, NULL, 'irene@admin.com', '1234', NULL, NULL, NULL, 'admin');


                -- CITAS
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (1, 2, 'presencial', '2024/02/15');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (2, 1, 'videollamada', '2024/01/24');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (3, 4, 'presencial', '2024/03/12');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (1, 5, 'videollamada', '2024/02/02');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (5, 2, 'presencial', '2024/01/30');
    
                
                -- FAQS
                INSERT INTO faqs (pregunta, respuesta) VALUES ('¿Qué servicios ofrecemos?', 'Ofrecemos servicio de nutrición y psicologia los cuales estan especializados en TCA con tratamientos adaptados a la necesidades del paciente');
                INSERT INTO faqs (pregunta, respuesta) VALUES ('¿Qué son los Trastornos de la Conducta Alimentaria (TCA)?', 'Los TCA son enfermedades mentales que afectan la conducta alimentaria y la percepción del cuerpo');
                INSERT INTO faqs (pregunta, respuesta) VALUES ('¿Cómo puedo saber si yo o alguien que conozco tiene un TCA?', 'La detección temprana puede ser difícil, pero algunos signos incluyen cambios drásticos en el peso, comportamientos alimentarios extremos, obsesión con la imagen corporal y cambios en el estado de ánimo. Si tienes preocupaciones, es importante buscar ayuda profesional');
                INSERT INTO faqs (pregunta, respuesta) VALUES ('¿Cómo puedo agendar una consulta?', 'Registrandose de forma gratuita en nuestra pagina web y siguiendo paso a paso el formulario de pedir cita');
                INSERT INTO faqs (pregunta, respuesta) VALUES ('¿Cuánto tiempo dura el tratamiento para los TCA?', 'La duración del tratamiento puede variar según las necesidades individuales');
               
    
                -- TESTIMONIOS
                INSERT INTO testimonios (id_paciente, testimonio) VALUES (1, 'El psicologo Eric Hernandez es genial me ayudo mucho durante este ultimo año');
                INSERT INTO testimonios (id_paciente, testimonio) VALUES (3, 'El nutricionista Luis Jerez me ayudo a conseguir mi objetivo de peso, es muy bueno');
                INSERT INTO testimonios (id_paciente, testimonio) VALUES (5, 'Gracias al psicolo Eric Hernandez estoy mejorando mucho');
                INSERT INTO testimonios (id_paciente, testimonio) VALUES (2, 'Se nota que el nutricionista Enrique Fernandez tiene muchos años de experiencia');
                INSERT INTO testimonios (id_paciente, testimonio) VALUES (4, 'El trabajo que hacen en esta empresa es muy bueno, se lo recomendaria a cualquier persona');
    
                ";
                // Consumimos todas las consultas
                if(mysqli_multi_query($conexion, $sqlInserts)) {
                    while(mysqli_next_result($conexion)) {
                        if(!mysqli_more_results($conexion)) {
                            break;
                        }
                    }
    
                    // echo "Inserciones realizadas correctamente" . "\t" . "<br>";
                } else {
                    echo "Error al insertar los datos en las tablas" . mysqli_error($conexion);
                }
    
                
                
       
        } // fin del ELSE general

        mysqli_select_db($conexion, 'psycologix');
        return $conexion;
        
}
    getConexion();

 ?>
