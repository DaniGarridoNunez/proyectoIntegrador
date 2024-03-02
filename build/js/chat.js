// Función para obtener la hora actual en formato HH:MM
function obtenerHoraActual() {
    const ahora = new Date();
    let hora = ahora.getHours();
    let minutos = ahora.getMinutes();

    // Agregar un 0 delante si los minutos son menores que 10
    minutos = minutos < 10 ? '0' + minutos : minutos;

    // Formatear la hora en formato HH:MM
    const horaActual = hora + ':' + minutos;

    return horaActual;
}


const formulario = document.querySelector('#formulario-chat');

formulario.addEventListener('submit', function(e){
    e.preventDefault();

    let mensaje = document.querySelector('#texto-enviar').value;
    const idChat = document.querySelector('#id-chat').value;
    const contenedorMensajes = document.querySelector('.chat-mensajes main');
    
    const datos = {
        mensaje: mensaje,
        idChat: idChat
    }

    fetch('/proyectoIntegrador/build/php/enviarMensaje.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datos) 
    })
    .then(response => {
        if(response.ok) {
            const div = document.createElement('DIV');
            div.classList.add('right');
            
            const p = document.createElement('P');
            p.textContent = mensaje;

            const span = document.createElement('SPAN');
            span.textContent = obtenerHoraActual();

            div.appendChild(p);
            div.appendChild(span);

            contenedorMensajes.appendChild(div);

        }
    })
})