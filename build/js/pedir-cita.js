let fechaVar = flatpickr("#fecha", {
    // Configuración opcional de Flatpickr
    minDate: "today", // Fecha mínima permitida (hoy)
    maxDate: new Date().fp_incr(60), // La fecha máxima para pedir cita es 2 meses
    defaultDate: "today", // Fecha predeterminada (hoy)
    // inline: true,
    enableTime: true,   // Sirve para activar las opciones de fecha y hora
    dateFormat: "Y-m-d H:i",
    minTime: "16:00",   // Hora mínima
    maxTime: "22:30",   // Hora máxima
    time_24hr: true,    // Formato 24h en vez de AM y PM
    disable: [  // Deshabilitamos los sabados y domingos
        function(date) {
            return (date.getDay() === 0 || date.getDay() === 6);
        }
    ]
})

// Array para almacenar la selección del usuario
let valoresSeleccionados = {};


document.addEventListener("DOMContentLoaded", function () {
    const formSteps = document.querySelectorAll(".form");
    const previousButtons = document.querySelectorAll("#anteriorBtn");
    const nextButtons = document.querySelectorAll(".form-imgs div");
    const asideItems = document.querySelectorAll("aside .item span");

    let currentStep = 0;

    // Función para mostrar el paso actual y ocultar los demás
    function showStep(stepIndex) {
        formSteps.forEach((step, index) => {
            if (index === stepIndex) {
                step.classList.add("active");
            } else {
                step.classList.remove("active");
            }
        });

        // Actualizar estilos del aside
        asideItems.forEach((item, index) => {
            if (index === stepIndex) {
                item.classList.add("current-step");
            } else {
                item.classList.remove("current-step");
            }
        });
    }

    // Función para avanzar al siguiente paso
    function nextStep() {
        if (currentStep < formSteps.length - 1) {
            currentStep++;
            showStep(currentStep);
        }
    }

    // Función para retroceder al paso anterior
    function previousStep() {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    }

    // Event listener para los botones "Anterior"
    previousButtons.forEach((button) => {
        button.addEventListener("click", () => {
            // Ejecutamos la función volver atrás
            previousStep();
        });
    });



    // Event listener para las imágenes
    nextButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            const valor = event.currentTarget.querySelector('img').getAttribute('data-value');
            valoresSeleccionados[currentStep] = valor;
            nextStep();
        });
    });


    /*--------------------------------------- SLIDER PROFESIONALES ----------------------------------------*/
    const reviews = document.querySelector('.form-imgs.cards');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    // El width del contenedor
    const reviewWidth = 720;
    let currentIndex2 = 0;

    // Función para mover los profesionales (cards) a la izquierda
    function moveLeft() {
        currentIndex2 = Math.max(currentIndex2 - 1, 0);
        reviews.style.transform = `translateX(-${currentIndex2 * reviewWidth}px)`;
    }

    // Función para mover los profesionales (cards) a la derecha
    function moveRight() {
        const maxIndex = reviews.children.length - 1;
        currentIndex2 = Math.min(currentIndex2 + 1, maxIndex);
        reviews.style.transform = `translateX(-${currentIndex2 * reviewWidth}px)`;
    }

    // Event listeners para los botones de "navegación"
    prevBtn.addEventListener('click', moveLeft);
    nextBtn.addEventListener('click', moveRight);

})

// Event listener para el envío del formulario
document.getElementById('miFormulario').addEventListener('submit', function (event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto

    // Almacenamos en variable los valores
    const especialidad = valoresSeleccionados[0];
    const modalidad = valoresSeleccionados[1];
    const profesional = valoresSeleccionados[2];
    const fecha = document.querySelector('#fecha');

    // Comprobamos que haya seleccionado una fecha al no estar vacío
    if(fecha.value.length > 1) {

        // Creamos el objeto que enviaremos como JSON al archivo PHP
        const data = {
            especialidad: especialidad,
            modalidad: modalidad,
            profesional: profesional,
            fecha: fecha.value
        }

        // Hacemos el fetch
        fetch('/proyectoIntegrador/build/php/pedirCita-fetch.php', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json"
            },
            // Pasamos en el body el objeto con toda la información del formulario, pero pasandolo como JSON
            body: JSON.stringify(data)
        })
        .then(response => {
            if(response.ok) {
                console.log('Datos envíados');
                return response.json();
            } else {
                throw new Error('Error en la respuesta del servidor');
            }
        })
        .then(data => {
            if (data.registroExitoso) {
                console.log('Datos enviados correctamente');
                // Si los datos se han subido correctamente, redirijimos al usuario a la home pasando por la URL la variable cita con el valor 1, el cual abrirá una ventana modal de confirmación de cita
                window.location.href = '/proyectoIntegrador?cita=1';
            } else {
                
            }
        })
        // En caso de error:
        .catch(error => {
            console.error('Fallo enviando los datos:', error);
        });


    } else {

    }

    // Lógica para enviar los datos al servidor
});
