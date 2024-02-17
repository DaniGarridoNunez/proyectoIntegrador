let fechaVar = flatpickr("#fecha", {
    // Configuración opcional de Flatpickr
    minDate: "today", // Fecha mínima permitida (hoy)
    maxDate: new Date().fp_incr(60), // La fecha máxima para pedir cita es 2 meses
    defaultDate: "today", // Fecha predeterminada (hoy)
    // inline: true,
    enableTime: true,
    dateFormat: "Y-m-d H:i",
    minTime: "16:00",
    maxTime: "22:30",
    time_24hr: true,
    disable: [
        function(date) {
            return (date.getDay() === 0 || date.getDay() === 6);
        }
    ]
})

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
    console.log('hola');
    const reviews = document.querySelector('.form-imgs.cards');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    const reviewWidth = 720;
    let currentIndex2 = 0;

    // Function to move reviews to the left
    function moveLeft() {
        currentIndex2 = Math.max(currentIndex2 - 1, 0);
        reviews.style.transform = `translateX(-${currentIndex2 * reviewWidth}px)`;
    }

    // Function to move reviews to the right
    function moveRight() {
        const maxIndex = reviews.children.length - 1;
        currentIndex2 = Math.min(currentIndex2 + 1, maxIndex);
        reviews.style.transform = `translateX(-${currentIndex2 * reviewWidth}px)`;
    }

    // Event listeners for navigation buttons
    prevBtn.addEventListener('click', moveLeft);
    nextBtn.addEventListener('click', moveRight);

})

// Event listener para el envío del formulario
document.getElementById('miFormulario').addEventListener('submit', function (event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto

    const especialidad = valoresSeleccionados[0];
    const modalidad = valoresSeleccionados[1];
    const profesional = valoresSeleccionados[2];
    const fecha = document.querySelector('#fecha');

    // Aquí puedes acceder a los valores seleccionados en valoresSeleccionados y enviarlos al servidor
    console.log('Datos seleccionados:');
    console.log(especialidad);
    console.log(modalidad);
    console.log(profesional);
    console.log(fecha.value.length);

    // Lógica para enviar los datos al servidor
});
