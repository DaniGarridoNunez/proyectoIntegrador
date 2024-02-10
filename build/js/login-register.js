document.addEventListener("DOMContentLoaded", function() {
    console.log('esuchando');
    const formulario = document.querySelector('.login-formulario');
    const emailInput = document.querySelector('#emailInput');
    const passwordInput = document.querySelector('#passwordInput');
    const mostrarErrorEmail = document.querySelector('.contenedor-email');
    const mostrarErrorPass = document.querySelector('.contenedor-pass');

    emailInput.addEventListener('blur', function() {
        validarMail();
    });

    passwordInput.addEventListener('blur', function() {
        validarPass();
    });

    formulario.addEventListener('submit', function(event) {
        const errorEmail = validarMail();
        const errorPass = validarPass();

        if (errorEmail || errorPass) {
            event.preventDefault();
        }
    });

    function validarMail() {
        // Eliminar errores anteriores
        const errores = document.querySelectorAll('.error.mail');
        errores.forEach(error => {
            error.remove();
        });

        const email = emailInput.value.trim();

        if (email == '') {
            // La explicación se encuentra en el if de debajo
            const error = document.createElement('DIV');
            error.classList.add('error');
            error.classList.add('mail');
            const mensaje = document.createElement('P');
            mensaje.textContent = "EL EMAIL ES OBLIGATORIO, NO PUEDE ESTAR VACIO";
            error.appendChild(mensaje);
            mostrarErrorEmail.appendChild(error);
            return true; // Hubo un error
        }

        if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+[a-zA-Z]{2,4}$/.test(email)) {
            // Creamos el div que contendrá el error
            const error = document.createElement('DIV');
            // Le añadimos una clase para los estilos
            error.classList.add('error');
            // Añadimos esta clase para diferenciar los errores
            error.classList.add('mail');

            // Creamos el elemento párrafo que contendrá el texto del mensaje
            const mensaje = document.createElement('P');
            // Añadimos el texto del error
            mensaje.textContent = "EL EMAIL ES INVÁLIDO O CONTIENE CARÁCTERES NO PERMITIDOS";
            // Añadimos el mensaje de error al div que contiene el mismo
            error.appendChild(mensaje);
            // Agregamos el error como hijo del div donde se encuentra el input password
            mostrarErrorEmail.appendChild(error);

            return true; // Hubo un error
        }

        return false; // No hubo errores
    }

    function validarPass() {
        // Eliminar errores anteriores
        const errores = document.querySelectorAll('.error.pass');
        errores.forEach(error => {
            error.remove();
        });

        const password = passwordInput.value.trim();

        if (password == '') {
            // Creamos el div que contendrá el error
            const error = document.createElement('DIV');
            // Le añadimos una clase para los estilos
            error.classList.add('error');
            // Añadimos esta clase para diferenciar los errores
            error.classList.add('pass');

            // Creamos el elemento párrafo que contendrá el texto del mensaje
            const mensaje = document.createElement('P');
            // Añadimos el texto del error
            mensaje.textContent = "EL PASSWORD ES OBLIGATORIO, NO PUEDE ESTAR VACÍO";
            // Añadimos el mensaje de error al div que contiene el mismo
            error.appendChild(mensaje);
            // Agregamos el error como hijo del div donde se encuentra el input password
            mostrarErrorPass.appendChild(error);

            return true; // Hubo un error
        }

        if (password.length  < 8) {
            // Creamos el div que contendrá el error
            const error = document.createElement('DIV');
            // Le añadimos una clase para los estilos
            error.classList.add('error');
            // Añadimos esta clase para diferenciar los errores
            error.classList.add('pass');

            // Creamos el elemento párrafo que contendrá el texto del mensaje
            const mensaje = document.createElement('P');
            // Añadimos el texto del error
            mensaje.textContent = "EL PASSWORD DEBE TENER MÍNIMO 8 CARACTERES";
            // Añadimos el mensaje de error al div que contiene el mismo
            error.appendChild(mensaje);
            // Agregamos el error como hijo del div donde se encuentra el input password
            mostrarErrorPass.appendChild(error);

            return true; // Hubo un error
        }

        return false; // No hubo errores
    }
});