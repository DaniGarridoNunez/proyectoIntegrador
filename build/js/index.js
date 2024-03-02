document.addEventListener('DOMContentLoaded', function() {
    //  Call back
    iniciarApp();

});

function iniciarApp() {
    eventListeners();
    darkMode();
}

function darkMode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    if(prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function() {
        if(prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners() {
    const barrasResponsive = document.querySelector('.barras-responsive');
    const subMenuResponsive = document.querySelectorAll('.mobile ul li.dropdown');

    // Evento para que al clickar a las 3 barritas, se despliegue el menu de navegación
    if(barrasResponsive) {
        barrasResponsive.addEventListener('click', navegacionResponsive);
    }
    
    // Evento para que al clickar en algunas de las opciones del menu de navegacion (móvil), se desplieguen las opciones que hay dentro
    if(subMenuResponsive) {
        subMenuResponsive.forEach( menu => {
            menu.addEventListener('click', subMenu);
        })
    }
    
}

// Función para mostrar o no mostrar el menu de navegación en móvil
function navegacionResponsive() {
    const navMobile = document.querySelector('.mobile');

    navMobile.classList.toggle('mostrar');
}

// Función para mostrar el submenu correspondiente y ocultar si hay alguno abierto de antes para evitar el colapso entre varios sub menus
function subMenu(event) {
    const menu = event.currentTarget.querySelector('ul.sub-menu');
    const allMenus = document.querySelectorAll('.mobile ul li.dropdown ul.sub-menu');

    // Detectar si otro esta abierto y ocultarlo
    allMenus.forEach((otherMenu) => {
        if (otherMenu !== menu && otherMenu.classList.contains('mostrar')) {
            otherMenu.classList.remove('mostrar');
            otherMenu.classList.add('oculto');
        }
    });

    // Mostrar o no mostrar
    if (menu.classList.contains('mostrar')) {
        menu.classList.remove('mostrar');
        menu.classList.add('oculto');
    } else {
        menu.classList.remove('oculto');
        menu.classList.add('mostrar');
    }
}

// BOTON CERRAR VENTANA MODAL REGISTRO EXITOSO
const btnCerrar = document.querySelector('.contenido-modal-registro button.btn-cerrar');
const overlay = document.querySelector('.modal-registro-exitoso');
if (btnCerrar) {
    btnCerrar.addEventListener('click', function() {
        overlay.remove();
    });
}

