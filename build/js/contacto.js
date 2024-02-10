document.addEventListener("DOMContentLoaded", function() {
    const formulario = document.querySelector('.contacto-formulario');
    const emailInput = document.querySelector('#emailInput');
    const nombreInput = document.querySelector('#nameInput');
    const motivoInput = document.querySelector('#motivoInput');
    const errorEmail = document.querySelector('.contenedor-email');
    const errorName = document.querySelector('.contenedor-name');
    const errorTextarea = document.querySelector('.contenedor-textarea');

    emailInput.addEventListener('blur', function() {
        validarMail();
    });

    nombreInput.addEventListener('blur', function() {
        validarName();
    });

    asuntoInput.addEventListener('blur', function() {
        validarAsunto();
    });

    motivoInput.addEventListener('blur', function() {
        validarMotivo();
    });

    formulario.addEventListener('submit', function(event) {
        const errorEmail = validarMail();
        const errorNombre = validarName();
        const errorMotivo = validarMotivo();

        if (errorEmail || errorNombre || errorAsuntos || errorMotivo) {
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
            errorEmail.appendChild(error);
            return true; // Hubo un error
        }

        if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,4}$/.test(email)) {
            // Creamos el div que contendrá el error
            const error = document.createElement('DIV');
            // Le añadimos una clase para los estilos
            error.classList.add('error');
            // Añadimos esta clase para diferenciar los errores
            error.classList.add('mail');

            // Creamos el elemento párrafo que contendrá el texto del mensaje
            const mensaje = document.createElement('P');
            // Añadimos el texto del error
            mensaje.textContent = "EMAIL INVÁLIDO O CONTIENE CARÁCTERES NO PERMITIDOS";
            // Añadimos el mensaje de error al div que contiene el mismo
            error.appendChild(mensaje);
            // Agregamos el error como hijo del div donde se encuentra el input password
            errorEmail.appendChild(error);

            return true; // Hubo un error
        }

        return false; // No hubo errores
    }

    function validarName() {
        // Eliminar errores anteriores
        const errores = document.querySelectorAll('.error.name');
        errores.forEach(error => {
            error.remove();
        });

        const name = nombreInput.value.trim();

        if (name == '') {
            // Creamos el div que contendrá el error
            const error = document.createElement('DIV');
            // Le añadimos una clase para los estilos
            error.classList.add('error');
            // Añadimos esta clase para diferenciar los errores
            error.classList.add('name');

            // Creamos el elemento párrafo que contendrá el texto del mensaje
            const mensaje = document.createElement('P');
            // Añadimos el texto del error
            mensaje.textContent = "EL NOMBRE ES OBLIGATORIO";
            // Añadimos el mensaje de error al div que contiene el mismo
            error.appendChild(mensaje);
            // Agregamos el error como hijo del div donde se encuentra el input password
            errorName.appendChild(error);

            return true; // Hubo un error
        }

        if (/\d/.test(name)) {
            // Creamos el div que contendrá el error
            const error = document.createElement('DIV');
            // Le añadimos una clase para los estilos
            error.classList.add('error');
            // Añadimos esta clase para diferenciar los errores
            error.classList.add('name');

            // Creamos el elemento párrafo que contendrá el texto del mensaje
            const mensaje = document.createElement('P');
            // Añadimos el texto del error
            mensaje.textContent = "EL NOMBRE NO PUEDE TENER NÚMEROS";
            // Añadimos el mensaje de error al div que contiene el mismo
            error.appendChild(mensaje);
            // Agregamos el error como hijo del div donde se encuentra el input password
            errorName.appendChild(error);

            return true; // Hubo un error
        }

        return false; // No hubo errores
    }

    function validarMotivo() {
        // Eliminar errores anteriores
        const errores = document.querySelectorAll('.error.motivo');
        errores.forEach(error => {
            error.remove();
        });
        const motivo = motivoInput.value.trim();

        if (motivo == '') {
            // Creamos el div que contendrá el error
            const error = document.createElement('DIV');
            // Le añadimos una clase para los estilos
            error.classList.add('error');
            // Añadimos esta clase para diferenciar los errores
            error.classList.add('motivo');

            // Creamos el elemento párrafo que contendrá el texto del mensaje
            const mensaje = document.createElement('P');
            // Añadimos el texto del error
            mensaje.textContent = "POR FAVOR, INDICA EL MOTIVO DE CONTACTO";
            // Añadimos el mensaje de error al div que contiene el mismo
            error.appendChild(mensaje);
            // Agregamos el error como hijo del div donde se encuentra el input password
            errorTextarea.appendChild(error);

            return true; // Hubo un error
        }

        if (motivo.length  > 256) {
            // Creamos el div que contendrá el error
            const error = document.createElement('DIV');
            // Le añadimos una clase para los estilos
            error.classList.add('error');
            // Añadimos esta clase para diferenciar los errores
            error.classList.add('motivo');

            // Creamos el elemento párrafo que contendrá el texto del mensaje
            const mensaje = document.createElement('P');
            // Añadimos el texto del error
            mensaje.textContent = "HAS SUPERADO EL LIMITE DE CARÁCTERES PERMITIDOS";
            // Añadimos el mensaje de error al div que contiene el mismo
            error.appendChild(mensaje);
            // Agregamos el error como hijo del div donde se encuentra el input password
            errorTextarea.appendChild(error);

            return true; // Hubo un error
        }

        return false; // No hubo errores
    }
});