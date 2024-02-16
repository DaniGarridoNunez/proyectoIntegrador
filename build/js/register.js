document.addEventListener("DOMContentLoaded", function() {

    // VER CONTRASEÑA
    const ojo = document.querySelector('.ver-contraseña');
    ojo.addEventListener('click', verContrasena);

    function verContrasena() {

        if(passwordInput.type == 'password') {
            passwordInput.type = 'text';
            ojo.setAttribute('src', 'build/img/nover-contraseña.svg');
        } else {
            passwordInput.type = 'password';
            ojo.setAttribute('src', 'build/img/ver-contraseña.svg');
        }
        
    }


    const formulario = document.querySelector('.login-formulario');
    const emailInput = document.querySelector('#emailInput');
    const passwordInput = document.querySelector('#passwordInput');
    const mostrarErrorEmail = document.querySelector('.contenedor-email');
    const mostrarErrorPass = document.querySelector('.contenedor-pass');
    const mostrarErrorCb = document.querySelector('.login-terms');

    emailInput.addEventListener('blur', function() {
        validarMail();
    });

    passwordInput.addEventListener('blur', function() {
        validarPass();
    });

    formulario.addEventListener('submit', function(event) {
        event.preventDefault();
        const errorEmail = validarMail();
        const errorPass = validarPass();
        const errorCb = validarCb();
        
        if (!errorEmail && !errorPass && !errorCb) {
            const email = emailInput.value;
            const password = passwordInput.value;

            const datos = {
                email: email,
                password: password
            }

            fetch('/proyectoIntegrador/build/php/registroFetch.php', {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(datos)
            })
            .then(response => {
                if(response.ok) {

                    console.log(response);
                    return response.json(); // Convertir la respuesta a JSON
                } else {
                    // return response.json(); // Convertir la respuesta a JSON

                    throw new Error('Error en la respuesta del servidor');
                }
            })
            .then(data => {
                console.log(data);
                if (data.registroExitoso) {
                    console.log('Datos enviados correctamente');
                    window.location.href = '/proyectoIntegrador?registro=1';
                } else {
                    console.error('Fallo en el registro:', data.errores);
                    const divErrores = document.querySelector('.errores-registro');
                    const div = document.createElement('DIV');
                    div.classList.add('alerta', 'error');
                    const mensaje = document.createTextNode(data.errores);
                    div.appendChild(mensaje);
                    divErrores.appendChild(div);
                }
                
            })
            .catch(error => {
                console.error('Fallo enviando los datos:', error);
            });
        }     
    });

    function validarCb() {
        // Verificar si el checkbox está marcado
        const checkbox = document.querySelector('#cb-terminos');
        if (!checkbox.checked) {
            const error = document.createElement('DIV');
            error.classList.add('error');
            error.classList.add('pass');

            const mensaje = document.createElement('P');
            mensaje.textContent = "Debes aceptar los Términos y Condiciones";
            error.appendChild(mensaje);
            mostrarErrorCb.appendChild(error);
            return true;
        }
    }

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
            return true; // Hay un error
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

            return true; // Hay un error
        }

        return false; // No hay errores
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
    
            return true; // Hay un error
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
    
            return true; // Hay un error
        }
    
        // Comprobación de si tiene un carácter especial
        const tieneCaracterEspecial = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/.test(password);
    
        if (!tieneCaracterEspecial) {
            const error = document.createElement('DIV');
            error.classList.add('error');
            error.classList.add('pass');
    
            const mensaje = document.createElement('P');
            mensaje.textContent = "EL PASSWORD DEBE TENER ALGÚN CARÁCTER ESPECIAL";
            error.appendChild(mensaje);
            mostrarErrorPass.appendChild(error);
        }
    
        // Comprobación si contiene mínimo un número la contraseña
        const tieneNumero = /\d/.test(password);
    
        if (!tieneNumero) {
            const error = document.createElement('DIV');
            error.classList.add('error');
            error.classList.add('pass');
    
            const mensaje = document.createElement('P');
            mensaje.textContent = "EL PASSWORD DEBE TENER AL MENOS UN NÚMERO";
            error.appendChild(mensaje);
            mostrarErrorPass.appendChild(error);
        }
    }


    
});
