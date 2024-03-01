<header class="header">
        <div class="contenedor contenido-header">
            <div class="desktop-nav">
                <div class="logo">
                    <a href="/proyectoIntegrador">
                        <img src="/proyectoIntegrador/build/img/logo.png" alt="Logo">
                    </a>
                </div>
                <nav class="nav">
                    <ul class="main-menu">
                        <li class="dropdown">
                            Servicios 
                            <span class="border-nav-scroll"></span> 
                            <!-- Sub Menu -->
                            <ul class="sub-menu">
                                <li>
                                    <div class="flex">
                                        <img src="/proyectoIntegrador/build/img/asesorias.png" alt="logo asesorias">
                                        <a href="/proyectoIntegrador/asesoramiento.php">Asesoramiento</a>
                                    </div>
                                    <p class="sub-menu-texto">Seguimiento personal</p>
                                </li>
                                <li>
                                    <div class="flex">
                                        <img src="/proyectoIntegrador/build/img/videollamada.png" alt="logo videollamada">
                                        <a href="/proyectoIntegrador/videoconferencias.php">Videoconferencias</a>
                                    </div>
                                    <p class="sub-menu-texto">Servicio cara a cara</p>
                                </li>
                                <li>
                                    <div class="flex">
                                        <img src="/proyectoIntegrador/build/img/psicologos.png" alt="logo psicologos">
                                        <a href="/proyectoIntegrador/psicologo.php">Psicólogo</a>
                                    </div>
                                    <p class="sub-menu-texto">Salud mental</p>
                                </li>
                                <li>
                                    <div class="flex">
                                        <img src="/proyectoIntegrador/build/img/nutricionista.png" alt="logo nutricionista">
                                        <a href="/proyectoIntegrador/nutricionista.php">Nutricionista</a>
                                    </div>
                                    <p class="sub-menu-texto">Cuida tu cuerpo</p>
                                </li>
                            </ul> <!-- Fin Sub Menu -->
                        </li>
                        <li class="dropdown">
                            Cita 
                            <span class="border-nav-scroll"></span> 
                            <ul class="sub-menu">
                                <li>
                                    <div class="flex">
                                        <img src="/proyectoIntegrador/build/img/pedir-cita.png" alt="logo asesorias">
                                        <a href="/proyectoIntegrador/pedir-cita.php">Reservar Cita</a>
                                    </div>
                                    <p class="sub-menu-texto">Pide cita ahora</p>
                                </li>
                                <li>
                                    <div class="flex">
                                        <img src="/proyectoIntegrador/build/img/ver-citas.png" alt="logo videollamada">
                                        <a href="/proyectoIntegrador/verCitas.php">Ver Citas</a>
                                    </div>
                                    <p class="sub-menu-texto">Consulta todas tus citas</p>
                                </li>
                                </li>
                            </ul> <!-- Fin Sub Menu -->
                        </li>
                        <li class="dropdown">
                            Acerca de 
                            <span class="border-nav-scroll"></span> 
                            <ul class="sub-menu">
                                <div class="grid-about">
                                        <li>
                                            <div class="flex">
                                                <img src="/proyectoIntegrador/build/img/asesorias.png" alt="logo asesorias">
                                                <a href="/proyectoIntegrador/nosotros.php">Nosotros</a>
                                            </div>
                                            <p class="sub-menu-texto">Descubre como trabajamos</p>
                                        </li>
                                        <li>
                                            <div class="flex">
                                                <img src="/proyectoIntegrador/build/img/videollamada.png" alt="logo videollamada">
                                                <a href="/proyectoIntegrador/profesionales.php">Profesionales</a>
                                            </div>
                                            <p class="sub-menu-texto">Conoce nuestro equipo</p>
                                        </li>
                                        <li>
                                            <div class="flex">
                                                <img src="/proyectoIntegrador/build/img/psicologos.png" alt="logo psicologos">
                                                <a href="/proyectoIntegrador/testimonios.php">Testimonios</a>
                                            </div>
                                            <p class="sub-menu-texto">Comprueba nuestros resultados</p>
                                        </li>
                                    
                                        <li>
                                            <div class="flex">
                                                <img src="/proyectoIntegrador/build/img/nutricionista.png" alt="logo nutricionista">
                                                <a href="/proyectoIntegrador/faqs.php">FAQs</a>
                                            </div>
                                            <p class="sub-menu-texto">Consulta las preguntas frecuentes</p>
                                        </li>
                                        <li>
                                            <div class="flex">
                                                <img src="/proyectoIntegrador/build/img/nutricionista.png" alt="logo nutricionista">
                                                <a href="/proyectoIntegrador/legales.php">Legal</a>
                                            </div>
                                            <p class="sub-menu-texto">Nuestras poíticas a tu alcance</p>
                                        </li>
                                </div>
                            </ul> <!-- Fin Sub Menu -->
                        </li>
                        <li>
                            <a href="/proyectoIntegrador/contacto.php">Contacto</a> 
                        </li>
                        <li class="login-signup dropdown">
                            <!-- en caso de iniciar sesión, cambiar el header o no -->
                            <?php if(empty($_SESSION)): ?>
                                <button class="iniciar-sesion">
                                    <a href="/proyectoIntegrador/login.php">Iniciar Sesion</a>
                                </button>
                                <button class="registro">
                                    <a href="/proyectoIntegrador/registro.php">Registrar</a>
                                </button>
                            <?php elseif(!empty($_SESSION)): ?>
                               <div style="display: flex; gap: 1rem; align-items: center;">
                                <img style="width: 24px; height: 24px; border-radius: 50%;" src="/proyectoIntegrador/fotoperfil/<?php echo $_SESSION['foto']; ?>" alt="foto perfil">
                                <p style="font-size: 1.6rem;">
                                    <?php echo $_SESSION['usuario']; ?>
                                    <span class="border-nav-scroll"></span>
                                </p> 
                                <ul class="sub-menu">

                                    <a href="/proyectoIntegrador/ver-perfil.php">
                                    <li>
                                        <div>
                                            <img src="/proyectoIntegrador/build/img/usuario.png" alt="icono usuario" style="width: 32px;">
                                            <span>Ver Perfil</span>
                                        </div>
                                    </li>
                                    </a>

                                    <?php if($_SESSION['rol'] === 'profesional'): ?>
                                        <a href="/proyectoIntegrador/profesionales/index.php">
                                    <li>
                                        <div>
                                            <img src="/proyectoIntegrador/build/img/tablero.png" alt="icono usuario" style="width: 32px;">
                                            <span>Dashboard</span>
                                        </div>
                                    </li>
                                    </a>
                                    <?php endif; ?>

                                    <?php if($_SESSION['rol'] === 'admin'): ?>
                                        <a href="/proyectoIntegrador/admin/index.php">
                                    <li>
                                        <div>
                                            <img src="/proyectoIntegrador/build/img/tablero.png" alt="icono usuario" style="width: 32px;">
                                            <span>Panel</span>
                                        </div>
                                    </li>
                                    </a>
                                    <?php endif; ?>

                                    <a href="/proyectoIntegrador/cerrar-sesion.php">
                                        <li>    
                                            <div>
                                                <img src="/proyectoIntegrador/build/img/cerrar-sesion.png" alt="icono usuario" style="width: 32px;">
                                                <span>Cerrar Sesión</span>
                                            </div>
                                        </li>
                                    </a>
                                    
                                </ul>
                               </div> 
                            <?php endif; ?>
                        </li>
                       
                        <li class="icons-right">
                            <div class="relative">
                                <?php if(empty($_SESSION['id'])) : ?>
                                    <a href="/proyectoIntegrador/login.php"><img class="user-btn" src="/proyectoIntegrador/build/img/usuario.png" alt="logo usuario"></a>
                                <?php else: ?>
                                    <img class="user-btn" src="/proyectoIntegrador/build/img/usuario.png" alt="logo usuario">
                                <?php endif; ?>
                                <?php if(!empty($_SESSION)): ?>
                                <ul class="sub-menu">
                                    <a href="/proyectoIntegrador/ver-perfil.php">
                                    <li>
                                        <div>
                                            <img src="/proyectoIntegrador/build/img/usuario.png" alt="icono usuario" style="width: 32px;">
                                            <span>Ver Perfil</span>
                                        </div>
                                    </li>
                                    </a>
                                    <a href="/proyectoIntegrador/cerrar-sesion.php">
                                        <li>    
                                            <div>
                                                <img src="/proyectoIntegrador/build/img/cerrar-sesion.png" alt="icono usuario" style="width: 32px;">
                                                <span>Cerrar Sesión</span>
                                            </div>
                                        </li>
                                    </a>
                                    
                                </ul>
                                <?php endif; ?>
                            </div> <!-- fin div usuario -->
                            <div>
                                <img src="/proyectoIntegrador/build/img/darkMode.png" alt="Boton Dark Mode">
                            </div>
                        </li>
                    </ul>
                </nav>
            </div> <!-- .desktop-nav -->
            <div class="nav-mobile">
                <div class="mobile-arriba">
                    <a href="/proyectoIntegrador">
                        <img src="/proyectoIntegrador/build/img/logo.png" alt="Logo">
                    </a>
                    <div class="mobile-arriba-derecha">
                        <div>
                            <img class="darkModeImg" src="/proyectoIntegrador/build/img/darkMode.png" alt="Boton Dark Mode">
                        </div>
                        <div class="relative">
                            <?php if(empty($_SESSION['id'])) : ?>
                                <a href="/proyectoIntegrador/login.php"><img class="user-btn" src="/proyectoIntegrador/build/img/usuario.png" alt="logo usuario"></a>
                            <?php else: ?>
                                <img class="user-btn" src="/proyectoIntegrador/build/img/usuario.png" alt="logo usuario">
                            <?php endif; ?>

                            <!-- <a href="/proyectoIntegrador/login.php"><img class="user-btn" src="/proyectoIntegrador/build/img/usuario.png" alt="logo usuario"></a> -->
                            <?php if(!empty($_SESSION)): ?>
                                <ul class="sub-menu">
                                    <a href="/proyectoIntegrador/ver-perfil.php">
                                    <li>
                                        <div>
                                            <img src="/proyectoIntegrador/build/img/usuario.png" alt="icono usuario" style="width: 32px;">
                                            <span>Ver Perfil</span>
                                        </div>
                                    </li>
                                    </a>
                                    <a href="/proyectoIntegrador/cerrar-sesion.php">
                                        <li>    
                                            <div>
                                                <img src="/proyectoIntegrador/build/img/cerrar-sesion.png" alt="icono usuario" style="width: 32px;">
                                                <span>Cerrar Sesión</span>
                                            </div>
                                        </li>
                                    </a>
                                    
                                </ul>
                                <?php endif; ?>
                        </div>
                        <div>
                            <img class="barras-responsive" src="/proyectoIntegrador/build/img/barras.svg" alt="barras">
                        </div>
                    </div>
                </div>
                <nav class="mobile">
                    <ul>
                        <li class="dropdown">
                            Servicios
                            <span class="border-nav-scroll"></span> 
                            <ul class="sub-menu">
                                <li>
                                    <div class="flex">
                                        <img src="/proyectoIntegrador/build/img/asesorias.png" alt="logo asesorias">
                                        <a href="/proyectoIntegrador/asesoramiento.php">Asesoramiento</a>
                                    </div>
                                    <p class="sub-menu-texto">Seguimiento personal</p>
                                </li>
                                <li>
                                    <div class="flex">
                                        <img src="/proyectoIntegrador/build/img/videollamada.png" alt="logo videollamada">
                                        <a href="/proyectoIntegrador/videoconferencias.php">Videoconferencias</a>
                                    </div>
                                    <p class="sub-menu-texto">Servicio cara a cara</p>
                                </li>
                                <li>
                                    <div class="flex">
                                        <img src="/proyectoIntegrador/build/img/psicologos.png" alt="logo psicologos">
                                        <a href="/proyectoIntegrador/psicologo.php">Psicólogo</a>
                                    </div>
                                    <p class="sub-menu-texto">Salud mental</p>
                                </li>
                                <li>
                                    <div class="flex">
                                        <img src="/proyectoIntegrador/build/img/nutricionista.png" alt="logo nutricionista">
                                        <a href="/proyectoIntegrador/nutricionista.php">Nutricionista</a>
                                    </div>
                                    <p class="sub-menu-texto">Cuida tu cuerpo</p>
                                </li>
                            </ul> <!-- Fin Sub Menu -->
                        </li>
                        <li class="dropdown">
                            Citas
                            <span class="border-nav-scroll"></span> 
                            <ul class="sub-menu">
                                <li>
                                    <div class="flex">
                                        <img src="/proyectoIntegrador/build/img/pedir-cita.png" alt="logo asesorias">
                                        <a href="/proyectoIntegrador/pedir-cita.php">Reservar Cita</a>
                                    </div>
                                    <p class="sub-menu-texto">Pide cita ahora</p>
                                </li>
                                <li>
                                    <div class="flex">
                                        <img src="/proyectoIntegrador/build/img/ver-citas.png" alt="logo videollamada">
                                        <a href="/proyectoIntegrador/verCitas.php">Ver Citas</a>
                                    </div>
                                    <p class="sub-menu-texto">Consulta todas tus citas</p>
                                </li>
                                </li>
                            </ul> <!-- Fin Sub Menu -->
                        </li>
                        <li class="dropdown">
                            Acerca de
                            <span class="border-nav-scroll"></span> 

                            <ul class="sub-menu oculto">
                                <div class="grid-about">
                                        <li>
                                            <div class="flex">
                                                <img src="/proyectoIntegrador/build/img/asesorias.png" alt="logo asesorias">
                                                <a href="/proyectoIntegrador/nosotros.php">Nosotros</a>
                                            </div>
                                            <p class="sub-menu-texto">Descubre como trabajamos</p>
                                        </li>
                                        <li>
                                            <div class="flex">
                                                <img src="/proyectoIntegrador/build/img/videollamada.png" alt="logo videollamada">
                                                <a href="/proyectoIntegrador/profesionales.php">Profesionales</a>
                                            </div>
                                            <p class="sub-menu-texto">Conoce nuestro equipo</p>
                                        </li>
                                        <li>
                                            <div class="flex">
                                                <img src="/proyectoIntegrador/build/img/psicologos.png" alt="logo psicologos">
                                                <a href="/proyectoIntegrador/testimonios.php">Testimonios</a>
                                            </div>
                                            <p class="sub-menu-texto">Comprueba nuestros resultados</p>
                                        </li>
                                    
                                        <li>
                                            <div class="flex">
                                                <img src="/proyectoIntegrador/build/img/nutricionista.png" alt="logo nutricionista">
                                                <a href="/proyectoIntegrador/faqs.php">FAQs</a>
                                            </div>
                                            <p class="sub-menu-texto">Consulta las preguntas frecuentes</p>
                                        </li>
                                        <li>
                                            <div class="flex">
                                                <img src="/proyectoIntegrador/build/img/nutricionista.png" alt="logo nutricionista">
                                                <a href="/proyectoIntegrador/legales.php">Legal</a>
                                            </div>
                                            <p class="sub-menu-texto">Nuestras poíticas a tu alcance</p>
                                        </li>
                                </div>
                            </ul> <!-- Fin Sub Menu -->
                        </li>
                        <li>
                            <a href="/proyectoIntegrador/contacto.php">Contacto</a> 
                        </li>
                    </ul>
                </nav>
            </div> <!-- .nav-mobile -->
        </div> <!-- .contenido-header -->
    </header>