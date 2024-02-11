// Selecciona todos los elementos <li> dentro de la lista
let items = document.querySelectorAll('.lista-tareas li');

// Asigna funciones diferentes a cada elemento <li>
items.forEach(function(item) {
    // Obtén el texto del elemento <li>
    let texto = item.textContent.trim();

    // Asigna una función específica a cada elemento
    switch (texto) {
        case 'Añadir/Eliminar administrador':
            item.addEventListener('click', function() {
                mostrarElemento('administrador'); // Ajusta la visibilidad adecuadamente
            });
            break;
        case 'Añadir/Eliminar profesional':
            item.addEventListener('click', function() {
                mostrarElemento('profesional'); // Ajusta la visibilidad adecuadamente
            });
            break;
        case 'Añadir/Eliminar faq':
            item.addEventListener('click', function() {
                mostrarElemento('faq'); // Ajusta la visibilidad adecuadamente
            });
            break;
        default:
            console.log('Acción por defecto para ' + texto);
            break;
    }
});

function mostrarElemento(seleccionado) {
    const sections = document.querySelectorAll('.forms');
    sections.forEach(section => {
        if (section.classList.contains(seleccionado)) {
            section.classList.add('mostrar');
            section.classList.remove('oculto');
        } else {
            section.classList.add('oculto');
            section.classList.remove('mostrar');
        }
    });
}

// -------------------------------------------------------------------- FORMULARIO ADD ADMINISTRADOR ------------------------------------------------------------------

// Obtener el formulario de añadir ADMIN
const formularioAddAdmin = document.querySelector('.formulario-add-admin');

formularioAddAdmin.addEventListener('submit', function(e) {
    e.preventDefault();
    
    if (validacionAddAdmin()) {
        const email = document.querySelector('#email-admin').value;
        const password = document.querySelector('#password-admin').value;
    
        const datos = {
            email: email,
            password: password
        }
    
        fetch('/proyectoIntegrador/admin/acciones/addAdmin.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(datos)
        })
        .then( response => {
            if(response.ok) {
                console.log('Datos envíados correctamente');
                window.location.href = 'index.php?resultado=1';
            } else {
                console.log('Error al enviar los datos');
            }
        })
        .catch( error => {
            console.error('Error en la red:', error);
        })
    } else {
        console.log('No ha pasado la validación');
    }
    
})

function validacionAddAdmin() {
    const validarEmail = validarEmailAddAdmin();
    const validarPass = validarPasswordAddAdmin();

    if(validarEmail && validarPass) {
        return true;
    }
}

function validarEmailAddAdmin() {
    const email = document.querySelector('#email-admin');
    const mostrarError = email.parentNode;

    const errores = mostrarError.querySelectorAll('.alerta.error');
    errores.forEach(error => {
        error.remove();
    });

    if( email.value.trim() == '' ) {
        const elemento = document.createElement('P');
        const mensaje = "ESTE CAMPO ESTA VACÍO";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError.appendChild(elemento);

        return false;
    }

    if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+[a-zA-Z]{2,4}$/.test(email.value)) {
        const elemento = document.createElement('P');
        const mensaje = "EL EMAIL ES INVÁLIDO";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError.appendChild(elemento);

        return false;
    }

    return true;
}

function validarPasswordAddAdmin() {
    const password = document.querySelector('#password-admin');
    const mostrarError = password.parentNode;

    const errores = mostrarError.querySelectorAll('.alerta.error');
    errores.forEach(error => {
        error.remove();
    });

    if( password.value.trim() == '' ) {
        const elemento = document.createElement('P');
        const mensaje = "ESTE CAMPO ESTA VACÍO";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError.appendChild(elemento);

        return false;
    }

    return true;
}


// -------------------------------------------------------------------- FORMULARIO DEL ADMIN ------------------------------------------------------------------

const formularioDelAdmin = document.querySelector('.formulario-del-admin');

formularioDelAdmin.addEventListener('submit', function(e) {
    e.preventDefault();

    if(validacionDelAdmin()) {
        let admin = formularioDelAdmin.querySelector('#eliminar-admin');
        let adminId = formularioDelAdmin.querySelector('#id-admin');

        if(admin !== null) {
            admin = admin.value;
        }

        if(adminId !== null) {
            adminId = adminId.value;
        }

        const datos = {
            admin: admin,
            adminId: adminId
        }

        fetch('/proyectoIntegrador/admin/acciones/delAdmin.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(datos)
        })
        .then(response => {
            if(response.ok) {
                console.log('Datos envíados correctamente');
                window.location.href = 'index.php?resultado=2';
            } else {
                console.log('Error al enviar los datos');
            }
        })
        .catch(error => {
            console.error('Error en la red:', error);
        })
    } else {
        console.log('No ha pasado la validación');
    }

})

function validacionDelAdmin() {
    const validar = validarSelectDelAdmin();

    if(validar) {
        return true;
    }

    return false;
}

function validarSelectDelAdmin() {
    const seleccion = formularioDelAdmin.querySelector('#eliminar-admin');
    const seleccionId = formularioDelAdmin.querySelector('#id-admin');
    const mostrarError = seleccion.parentNode;
    const mostrarError2 = seleccionId.parentNode;
    
    const errores = mostrarError.querySelectorAll('.alerta.error');
    errores.forEach(error => {
        error.remove();
    });

    const errores2 = mostrarError2.querySelectorAll('.alerta.error');
    errores2.forEach(error => {
        error.remove();
    });


    if(seleccion.value !== '0' && seleccionId.value.trim() !== '') {
        const elemento = document.createElement('P');
        const mensaje = "ELIGE SOLO UNA OPCIÓN PARA ELIMINAR";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError.appendChild(elemento);

        return false;
    }

    if(seleccion.value == 0 && seleccionId.value.trim() == '') {
        const elemento = document.createElement('P');
        const mensaje = "ELIGE UNA OPCIÓN VALIDA";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError2.appendChild(elemento);

        return false;
    }



    return true;
}




// -------------------------------------------------------------------- FORMULARIO ADD PROFESIONAL ------------------------------------------------------------------

const formularioAddProfesional = document.querySelector('.formulario-add-profesional');

formularioAddProfesional.addEventListener('submit', function(e) {
    e.preventDefault();

    if(validacionAddProfesional()) {
        const nombre = formularioAddProfesional.querySelector('#nombre-profesional').value;
        const apellidos = formularioAddProfesional.querySelector('#apellidos-profesional').value;
        const email = formularioAddProfesional.querySelector('#email-profesional').value;
        const password = formularioAddProfesional.querySelector('#password-profesional').value;
        const especialidad = formularioAddProfesional.querySelector('#especialidad-profesional').value;
        const fecha = formularioAddProfesional.querySelector('#fecha-nac-profesional').value;

        const desc = formularioAddProfesional.querySelector('#desc-profesional');

        if(desc !== null) {
            desc = desc.value;
        }

        const datos = {
            nombre: nombre,
            apellidos: apellidos,
            email: email,
            password: password,
            especialidad: especialidad,
            fecha: fecha,
            desc: desc
        }

        fetch('/proyectoIntegrador/admin/acciones/addProfesional.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(datos)
        })
        .then(response => {
            if(response.ok) {
                console.log('Datos envíados corretamente');
                window.location.href = 'index.php?resultado=3';
            } else {
                console.log('Error al enviar los datos');
            }
        })
        .catch( error => {
            console.error('Error en la red:', error);
        })
    } else {
        console.log('No ha pasado la validación');
    }
})

function validacionAddProfesional() {
    const validarNombre = validarNombreAddProfesional();
    const validarApellidos = validarApellidosAddProfesional();
    const validarEmail = validarEmailAddProfesional();
    const validarPassword = validarPasswordAddProfesional();
    const validarFecha = validarFechaAddProfesional();
    const validarDesc = validarDescAddProfesional();

    if (validarNombre && validarApellidos && validarEmail && validarPassword && validarFecha && validarDesc) {
        return true;
    }

    return false;
}

function validarNombreAddProfesional() {
    const nombre = formularioAddProfesional.querySelector('#nombre-profesional');
    const mostrarError = nombre.parentNode;

    const errores = mostrarError.querySelectorAll('.alerta.error');
    errores.forEach( error => {
        error.remove();
    })
    

    if(nombre.value.trim() == '') {
        const elemento = document.createElement('P'); 
        const mensaje = "ESTE CAMPO ESTÁ VACÍO";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError.appendChild(elemento);

        return false;
    }
}

function validarApellidosAddProfesional() {
    const apellidos = formularioAddProfesional.querySelector('#apellidos-profesional');
    const mostrarError = apellidos.parentNode;

    const errores = mostrarError.querySelectorAll('.alerta.error');
    errores.forEach( error => {
        error.remove();
    })

    if(apellidos.value.trim() == '') {
        const mostrarError = apellidos.parentNode;
        const elemento = document.createElement('P'); 
        const mensaje = "ESTE CAMPO ESTÁ VACÍO";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError.appendChild(elemento);

        return false;
    }
}

function validarEmailAddProfesional() {
    const email = formularioAddProfesional.querySelector('#email-profesional');
    const mostrarError = email.parentNode;

    const errores = mostrarError.querySelectorAll('.alerta.error');
    errores.forEach( error => {
        error.remove();
    })

    if (email.value.trim() == '') {
        const elemento = document.createElement('P'); 
        const mensaje = "ESTE CAMPO ESTÁ VACÍO";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError.appendChild(elemento);

        return false;
    }

    if(!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,4}$/.test(email.value)) {
        const elemento = document.createElement('P'); 
        const mensaje = "EL EMAIL ES INVÁLIDO";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError.appendChild(elemento);

        return false;
    }
}

function validarPasswordAddProfesional() {
    const password = formularioAddProfesional.querySelector('#password-profesional');
    const mostrarError = password.parentNode;

    const errores = mostrarError.querySelectorAll('.alerta.error');
    errores.forEach( error => {
        error.remove();
    })

    if(password.value.trim() == '') {
        const elemento = document.createElement('P'); 
        const mensaje = "ESTE CAMPO ESTÁ VACÍO";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError.appendChild(elemento);

        return false;
    }

    if(password.value.trim().length < 8 ) {
        const elemento = document.createElement('P'); 
        const mensaje = "DEBE TENER AL MENOS 8 CARÁCTERES";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError.appendChild(elemento);

        return false;
    }
}


function validarFechaAddProfesional() {
    const fecha = formularioAddProfesional.querySelector('#fecha-nac-profesional');
    const mostrarError = fecha.parentNode;
    let fechaActual = new Date();
    let fechaUsuario = new Date(fecha.value);
    let fechaMinima = new Date(fechaActual.getFullYear() - 18, fechaActual.getMonth(), fechaActual.getDate());

    console.log(fechaMinima);
    const errores = mostrarError.querySelectorAll('.alerta.error');
    errores.forEach( error => {
        error.remove();
    })

    if(fecha.value === '') {
        const elemento = document.createElement('P'); 
        const mensaje = "POR FAVOR, ELIJA UNA FECHA";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError.appendChild(elemento);

        return false;
    }

    if(fechaUsuario > fechaActual) {
        const elemento = document.createElement('P'); 
        const mensaje = "LA FECHA ES MAYOR A LA ACTUALIDAD";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError.appendChild(elemento);

        return false;
    }

    if(fechaUsuario > fechaMinima ) {
        const elemento = document.createElement('P'); 
        const mensaje = "DEBE TENER AL MENOS 18 AÑOS";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError.appendChild(elemento);

        return false;
    }
}

function validarDescAddProfesional() {
    const desc = formularioAddProfesional.querySelector('#desc-profesional');
    const mostrarError = desc.parentNode;

    const errores = mostrarError.querySelectorAll('.alerta.error');
    errores.forEach( error => {
        error.remove();
    })

    if(desc.value.length > 254 ) {
        const elemento = document.createElement('P'); 
        const mensaje = "LIMITE DE 254 CARÁCTERES EXCEDIDO";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError.appendChild(elemento);

        return false;
    }
}


// -------------------------------------------------------------------- FORMULARIO FAQ ------------------------------------------------------------------

// Obtener el formulario de FAQ
const formularioFAQ = document.querySelector('.faq.forms form');

// Agregar un event listener al formulario de FAQ
formularioFAQ.addEventListener('submit', function(e) {
    e.preventDefault(); // Prevenir el envío del formulario por defecto

    // Recolectar los valores del formulario de FAQ
    const pregunta = formularioFAQ.querySelector('#pregunta').value;
    const respuesta = formularioFAQ.querySelector('#respuesta').value;

    // Objeto con los valores recolectados del formulario de FAQ
    const datosFAQ = {
        pregunta: pregunta,
        respuesta: respuesta
    };

    // Enviar los datos del formulario de FAQ al servidor
    fetch('/proyectoIntegrador/admin/acciones/addFaq.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datosFAQ)
    })
    .then(response => {
        if (response.ok) {
            console.log('Datos de FAQ enviados correctamente');
            // Puedes hacer algo con la respuesta del servidor si es necesario
        } else {
            console.error('Error al enviar los datos de FAQ');
        }
    })
    .catch(error => {
        console.error('Error de red:', error);
    });
})
