// Obtener referencia al input file y a la imagen de vista previa
const inputFile = document.getElementById('subir-archivo');
const previewImage = document.getElementById('previewImage');

// Escuchar el evento change en el input file
inputFile.addEventListener('change', function() {
    console.log(inputFile.files);
    // Verificar si se ha seleccionado un archivo
    if (inputFile.files && inputFile.files[0]) {
        // Obtener el archivo seleccionado
        const selectedFile = inputFile.files[0];

        // Crear un objeto FileReader para leer el contenido del archivo
        const reader = new FileReader();

        // Definir una función de devolución de llamada que se ejecutará cuando se complete la lectura del archivo
        reader.onload = function(e) {
            // Mostrar la imagen seleccionada en la vista previa
            previewImage.src = e.target.result;
            previewImage.style.display = 'block'; // Mostrar la imagen
        };

        // Leer el contenido del archivo como una URL de datos
        reader.readAsDataURL(selectedFile);
    }
});

document.addEventListener('DOMContentLoaded', function() {
    let cropper;
    const image = document.getElementById('previewImage');
    const container = document.querySelector('.cambiar-foto-perfil');
    const cambiarFotoBtn = document.querySelector('.custom-subir-archivo');

    image.addEventListener('click', function(){
        const guardarBtn = document.createElement('BUTTON');
        guardarBtn.classList.add('cropCanvas');
        guardarBtn.textContent = 'Guardar';
        container.insertBefore(guardarBtn, cambiarFotoBtn); // Inserta antes del primer hijo
        // container.appendChild(guardarBtn);

        cropper = new Cropper(image, {
            aspectRatio: 1 / 1,
            minCropBoxWidth: 150, // Establece el mínimo de 200 píxeles de ancho
            minCropBoxHeight: 150, // Establece el mínimo de 200 píxeles de alto
            maxCropBoxWidth: 600, // Establece el máximo de 400 píxeles de ancho
            maxCropBoxHeight: 600 // Establece el máximo de 400 píxeles de alto
          });

          guardarBtn.addEventListener('click', function() {
            const croppedCanva = cropper.getCroppedCanvas({
                minWidth: 256,
                minHeight: 256,
                maxWidth: 1080,
                maxHeight: 1080
            });
            
            image.src = croppedCanva.toDataURL();
            console.log(croppedCanva);
            cropper.destroy();
            guardarBtn.remove();
        })
    })

})
