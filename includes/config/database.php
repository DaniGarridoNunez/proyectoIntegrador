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
                fecha_nac DATE NULL,
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
                dia_cita DATETIME NOT NULL
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

            CREATE TABLE IF NOT EXISTS chats (
                id INT AUTO_INCREMENT PRIMARY KEY,
                id_profesional INT NOT NULL,
                id_paciente INT NOT NULL,
                id_cita INT NOT NULL,
                FOREIGN KEY (id_cita) REFERENCES citas(id),
                FOREIGN KEY (id_profesional) REFERENCES usuarios(id),
                FOREIGN KEY (id_paciente) REFERENCES usuarios(id)
            );
            
            CREATE TABLE IF NOT EXISTS mensajes (
                id INT AUTO_INCREMENT PRIMARY KEY,
                id_chat INT NOT NULL,
                id_usuario INT NOT NULL,
                mensaje TEXT NOT NULL,
                fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (id_chat) REFERENCES chats(id),
                FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
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
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Luis', 'Jerez', 'luisjerez@gmail.com', '" . password_hash('1234', PASSWORD_DEFAULT) . "', 'nutricionista', 'Cinco años de experiencia licenciado en la Universidad Europea de Madrid', '2000-10-23', 'profesional1.jpg', 'profesional');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Eric', 'Hernandez', 'erichernandez@gmail.com', '" . password_hash('1234', PASSWORD_DEFAULT) . "', 'nutricionista', 'cinco años de experiencia licenciado en la Universidad Europea de Madrid', '1980-03-15', 'profesional2.jpg', 'profesional');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Angela', 'Perez', 'angelperez@gmail.com', '" . password_hash('1234', PASSWORD_DEFAULT) . "', 'psicologo', 'cinco años de experiencia licenciado en la Universidad Europea de Madrid', '1992-07-30', 'profesional3.jpg', 'profesional');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Mario', 'Rodriguez', 'mariorodriguez@gmail.com', '" . password_hash('1234', PASSWORD_DEFAULT) . "', 'psicologo', 'cinco años de experiencia licenciado en la Universidad Europea de Madrid', '1975-01-09', 'profesional4.jpg', 'profesional');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Enrique', 'Fernandez', 'enriquefernandez@gmail.com', '" . password_hash('1234', PASSWORD_DEFAULT) . "', 'nutricionista', 'cinco años de experiencia licenciado en la Universidad Europea de Madrid', '1997-08-11', 'profesional5.jpg', 'profesional');
                    
                    -- PACIENTES
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Fernando', 'Alonso', 'fernandoalonso@gmail.com', '" . password_hash('1234', PASSWORD_DEFAULT) . "', NULL, NULL, '2003-02-11', 'paciente1.jpg', 'paciente');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Paolo', 'Maldini', 'paolomaldini@gmail.com', '" . password_hash('1234', PASSWORD_DEFAULT) . "', NULL, NULL, '2001-01-23', 'paciente2.jpg', 'paciente');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Austen', 'Renner', 'austenrenner@gmail.com', '" . password_hash('1234', PASSWORD_DEFAULT) . "', NULL, NULL, '2004-08-12', 'paciente3.jpg', 'paciente');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Coby', 'Botsford', 'cobybotsford@gmail.com', '" . password_hash('1234', PASSWORD_DEFAULT) . "', NULL, NULL, '1990-09-08', 'default.jpg', 'paciente');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES ('Jarred', 'Abshire', 'jarredabshire@gmail.com', '" . password_hash('1234', PASSWORD_DEFAULT) . "', NULL, NULL, '1999-12-30', 'default.jpg', 'paciente');
                    
                    -- ADMINISTRADORES
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES (NULL, NULL, 'dani@admin.com', '" . password_hash('1234', PASSWORD_DEFAULT) . "', NULL, NULL, NULL, 'default.jpg', 'admin');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES (NULL, NULL, 'hugo@admin.com', '" . password_hash('1234', PASSWORD_DEFAULT) . "', NULL, NULL, NULL, 'default.jpg', 'admin');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES (NULL, NULL, 'josep@admin.com', '" . password_hash('1234', PASSWORD_DEFAULT) . "', NULL, NULL, NULL, 'default.jpg', 'admin');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES (NULL, NULL, 'sara@admin.com', '" . password_hash('1234', PASSWORD_DEFAULT) . "', NULL, NULL, NULL, 'default.jpg', 'admin');
                INSERT INTO usuarios(nombre, apellido, correo, password, especialidad, descripcion, fecha_nac, foto, rol) VALUES (NULL, NULL, 'irene@admin.com', '" . password_hash('1234', PASSWORD_DEFAULT) . "', NULL, NULL, NULL, 'default.jpg', 'admin');

                -- CITAS
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (1, 6, 'presencial', '2024/02/15 18:00:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (2, 7, 'videollamada', '2024/01/24 16:30:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (3, 8, 'presencial', '2024/03/12 21:10:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (1, 9, 'videollamada', '2024/02/02 18:30:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (5, 10, 'presencial', '2024/01/30 20:00:00');
                
                -- citas del profesional 1
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (1, 6, 'videollamada', '2024-01-30 18:00:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (1, 7, 'presencial', '2024-01-20 19:50:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (1, 8, 'videollamada', '2024-01-10 20:20:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (1, 9, 'presencial', '2023-01-27 21:45:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (1, 10, 'videollamada', '2023-09-18 16:15:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (1, 6, 'presencial', '2023-11-30 17:00:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (1, 7, 'videollamada', '2024-01-02 17:30:00');


                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (1, 6, 'videollamada', '2024/03/10 18:00:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (1, 7, 'videollamada', '2024/03/14 19:30:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (1, 8, 'videollamada', '2024/04/02 20:45:00');
                
                -- citas del profesional 2
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (2, 6, 'videollamada', '2024/01/30 16:00:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (2, 7, 'presencial', '2024/01/20 17:30:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (2, 8, 'videollamada', '2024/01/10 18:45:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (2, 9, 'presencial', '2023/01/27 19:15:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (2, 10, 'videollamada', '2023/09/18 20:50:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (2, 6, 'presencial', '2023/11/31 21:20:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (2, 7, 'videollamada', '2024/01/02 22:00:00');

                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (2, 6, 'videollamada', '2024/03/30 18:25:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (2, 7, 'videollamada', '2024/03/25 16:50:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (2, 8, 'videollamada', '2024/04/07 20:00:00');
               
                -- citas del profesional 3
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (3, 6, 'videollamada', '2024/01/30 18:00:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (3, 7, 'presencial', '2024/01/20 21:10:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (3, 8, 'videollamada', '2024/01/10 20:45:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (3, 9, 'presencial', '2023/01/27 21:20:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (3, 10, 'videollamada', '2023/09/18 16:35:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (3, 7, 'presencial', '2023/11/31 19:00:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (3, 8, 'videollamada', '2024/01/02 17:45:00');

                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (3, 6, 'videollamada', '2024/03/11 19:20:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (3, 7, 'videollamada', '2024/03/19 16:30:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (3, 8, 'videollamada', '2024/04/05 20:00:00');
    
                -- citas del profesional 4
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (4, 6, 'videollamada', '2024/01/30 21:00:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (4, 7, 'presencial', '2024/01/20 18:45:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (4, 8, 'videollamada', '2024/01/10 17:30:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (4, 9, 'presencial', '2023/01/27 16:20:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (4, 10, 'videollamada', '2023/09/18 18:00:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (4, 9, 'presencial', '2023/11/31 20:15:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (4, 7, 'videollamada', '2024/01/02 17:20:00');

                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (4, 6, 'videollamada', '2024/03/07 20:00:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (4, 7, 'videollamada', '2024/03/22 17:45:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (4, 8, 'videollamada', '2024/04/07 16:15:00');

                -- citas del profesional 5
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (5, 6, 'videollamada', '2024/01/30 16:55:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (5, 7, 'presencial', '2024/01/20 18:30:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (5, 8, 'videollamada', '2024/01/10 20:00:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (5, 9, 'presencial', '2023/01/27 18:25:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (5, 10, 'videollamada', '2023/09/18 21:10:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (5, 9, 'presencial', '2023/11/30 21:40:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (5, 8, 'videollamada', '2024/01/02 22:00:00');

                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (5, 6, 'videollamada', '2024/03/09 17:50:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (5, 7, 'videollamada', '2024/03/18 16:45:00');
                INSERT INTO citas (id_profesional, id_paciente, tipo_cita, dia_cita) VALUES (5, 8, 'videollamada', '2024/04/10 19:10:00');
    
                
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
                
                
                -- CHATS
                INSERT INTO chats (id_profesional, id_paciente, id_cita) VALUES
                                                                        (1, 6, 13), 
                                                                        (2, 7, 14),
                                                                        (3, 8, 15);

                
                -- MENSAJES
                INSERT INTO mensajes (id_chat, id_usuario, mensaje) VALUES
                                                                            (1, 1, 'Hola, ¿cómo te sientes hoy?'),
                                                                            (1, 6, 'Bien, gracias por preguntar. ¿Y tú?'),
                                                                            (1, 1, 'Estoy bien, gracias.'),

                                                                            (2, 2, 'Buenos días, ¿cómo ha estado su día?'),
                                                                            (2, 7, 'Hola, mi día ha estado ocupado pero bien.'),
                                                                            (2, 2, 'Entiendo, ¿hay algo en particular que le preocupe?'),

                                                                            (3, 3, 'Hola, ¿cómo puedo ayudarte hoy?'),
                                                                            (3, 8, 'Tengo algunas preocupaciones sobre mi salud.'),
                                                                            (3, 3, 'Entiendo, estaré encantado de ayudarte a aclarar tus preocupaciones.');

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
