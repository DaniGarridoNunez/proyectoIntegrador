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
    

    if(seleccion.value !== '0' && seleccionId.value.trim() !== '') {
        const mostrarError = seleccionId.parentNode;
        const elemento = document.createElement('P');
        const mensaje = "ELIGE SOLO UNA OPCIÓN PARA ELIMINAR";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError.appendChild(elemento);

        return false;
    }

    if(seleccion.value == 0 && seleccionId.value.trim() == '') {
        const mostrarError = seleccion.parentNode;
        const elemento = document.createElement('P');
        const mensaje = "ELIGE UNA OPCIÓN VALIDA";
        elemento.textContent = mensaje;
        elemento.classList.add('alerta', 'error', 'max-w-50');
        mostrarError.appendChild(elemento);

        return false;
    }



    return true;
}




// -------------------------------------------------------------------- FORMULARIO DEL ADMIN ------------------------------------------------------------------

const formularioAddProfesional = document.querySelector('.formulario-add-profesional');

formularioAddProfesional.addEventListener('click', function(e) {
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
            }
        })
    }
})


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
















function validacion(formulario) {
    const validarN = validarNombre(formulario);
    const validarA = validarApellidos(formulario);
    const validarE = validarEmail(formulario);
    const validarP = validarPassword(formulario);
    const validarEsp = validarEspecialidad(formulario);
    const validarF = validarFecha(formulario);
    const validarD = validarDescripcion(formulario);
    const validarS = validarSelect(formulario);

    if(validarN && validarA && validarE && validarP && validarEsp && validarF && validarD && validarS) {
        return true;
    } else {
        return false;
    }
}

function validarNombre(formulario) {
    const nombre = formulario.querySelector('input[class="name"]');
    

    if(nombre !== null) {
        const mostrarError = nombre.parentNode;


        const errores = mostrarError.querySelectorAll('.alerta.error');
            errores.forEach(error => {
                error.remove();
            });

        if(nombre.value.trim() == '') {
            const elemento = document.createElement('P');
            const mensaje = "ESTE CAMPO ESTA VACÍO";
            elemento.textContent = mensaje;
            elemento.classList.add('alerta', 'error');
            mostrarError.appendChild(elemento);

            return false;
        }
    }

    ;
    // console.log(nombre);
    return true;
}

function validarApellidos(formulario) {
    const apellidos = formulario.querySelector('input[class="ape"]');

    if(apellidos !== null) {
        const mostrarError = apellidos.parentNode;

        const errores = mostrarError.querySelectorAll('.alerta.error');
            errores.forEach(error => {
                error.remove();
            });

        if(apellidos.value.trim() == '') {
            const elemento = document.createElement('P');
            const mensaje = "ESTE CAMPO ESTA VACÍO";
            elemento.textContent = mensaje;
            elemento.classList.add('alerta', 'error');
            mostrarError.appendChild(elemento);

            return false;
        }
    }
    
    // console.log(apellidos);
    return true;
}

function validarEmail(formulario) {
    const email = formulario.querySelector('input[type="email"]');
    

    if(email !== null) {
        const mostrarError = email.parentNode;

        const errores = mostrarError.querySelectorAll('.alerta.error');
        errores.forEach(error => {
            error.remove();
        });

        if(email.value.trim() == '') {
            const elemento = document.createElement('P');
            const mensaje = "ESTE CAMPO ESTA VACÍO";
            elemento.textContent = mensaje;
            elemento.classList.add('alerta', 'error');
            mostrarError.appendChild(elemento);

            return false;
        }
    }
    // console.log(email);
    return true;
}

function validarPassword(formulario) {
    const password = formulario.querySelector('input[type="password"]');

    if(password !== null) {
        const mostrarError = password.parentNode;

        const errores = mostrarError.querySelectorAll('.alerta.error');
        errores.forEach(error => {
            error.remove();
        });

        if(password.value.trim() == '') {
            const elemento = document.createElement('P');
            const mensaje = "ESTE CAMPO ESTA VACÍO";
            elemento.textContent = mensaje;
            elemento.classList.add('alerta', 'error');
            mostrarError.appendChild(elemento);

            return false;
        }

    }
    // console.log(password);
    return true;
}

function validarEspecialidad(formulario) {
    const especialidad = formulario.querySelector('.especialidad');
    if(especialidad !== null) {

        // const mostrarError = especialidad.parentNode;
        // const errores = mostrarError.querySelectorAll('.alerta.error');
        // errores.forEach(error => {
        //     error.remove();
        // });
        // console.log(especialidad.value);
        // if(especialidad.value == 1) {
        //     const elemento = document.createElement('P');
        //     const mensaje = "ESTE CAMPO ESTA VACÍO";
        //     elemento.textContent = mensaje;
        //     elemento.classList.add('alerta', 'error');
        //     mostrarError.appendChild(elemento);

        //     return false;
        // }
    }
    // console.log(especialidad);
    return true;
}

function validarFecha(formulario) {
    const fecha = formulario.querySelector('input[type="date"]');
    if(fecha !== null) {
        const mostrarError = fecha.parentNode;

        const errores = mostrarError.querySelectorAll('.alerta.error');
            errores.forEach(error => {
                error.remove();
        });

        if(fecha.value == '') {
            const elemento = document.createElement('P');
            const mensaje = "ESTE CAMPO ESTA VACÍO";
            elemento.textContent = mensaje;
            elemento.classList.add('alerta', 'error');
            mostrarError.appendChild(elemento);

            return false;
        }
    }
    // console.log(fecha);
    return true;
}

function validarDescripcion(formulario) {
    const descripcion = formulario.querySelector('textarea');

    if(descripcion !== null) {
        const mostrarError = descripcion.parentNode;

        const errores = mostrarError.querySelectorAll('.alerta.error');
            errores.forEach(error => {
                error.remove();
        });

        if(descripcion.value.length > 254) {
            const elemento = document.createElement('P');
            const mensaje = "HAS SUPERADO LOS CARACTERES MAX. PERMITIDOS (255)";
            elemento.textContent = mensaje;
            elemento.classList.add('alerta', 'error');
            mostrarError.appendChild(elemento);

            return false;
        }
    }
    // console.log(descripcion);
    return true;
}

function validarSelect(formulario) {
    const selectElement = formulario.querySelector('select:not(.especialidad)');
    // console.log(selectElement);
    // Verificar si se ha seleccionado una opción válida
    if (selectElement !== null) {
        const mostrarError = selectElement.parentNode;

        const errores = mostrarError.querySelectorAll('.alerta.error');
            errores.forEach(error => {
                error.remove();
        });

        if(selectElement.value == 0) {
            const elemento = document.createElement('P');
            const mensaje = "POR FAVOR ELIJA UNA OPCIÓN";
            elemento.textContent = mensaje;
            elemento.classList.add('alerta', 'error');
            mostrarError.appendChild(elemento);

            return false;
        }

    } else {
    }
    return true;
}
