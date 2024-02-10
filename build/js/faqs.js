document.addEventListener("DOMContentLoaded", function() {
    const boton = document.querySelectorAll('.preguntas-faq img');
    console.log(boton);

    boton.forEach(boton => {
        boton.addEventListener('click', desplegar);
    })

    function desplegar(e) {
        const index = e.currentTarget.parentNode.parentNode;
        const respuesta = index.querySelector('.respuesta');
        const icono = e.currentTarget;

        if (icono.getAttribute('src') === 'build/img/icono-mas.png') {
            icono.setAttribute('src', 'build/img/icono-menos.png');
        } else if (icono.getAttribute('src') === 'build/img/icono-menos.png') {
            icono.setAttribute('src', 'build/img/icono-mas.png');
        }

        respuesta.classList.toggle('mostrar');
    }
});