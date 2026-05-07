document.addEventListener('DOMContentLoaded', function () {
    const modalAdmin = document.getElementById('modalAdmin');

    if (modalAdmin) {
        modalAdmin.addEventListener('show.bs.modal', function (event) {
            // El botón que abrió el modal
            const button = event.relatedTarget;
            
            // Extraemos la información del atributo data-genero
            const generoData = button.getAttribute('data-genero');
            const genero = generoData ? JSON.parse(generoData) : null;

            const form = modalAdmin.querySelector('form');
            const modalTitle = modalAdmin.querySelector('.modal-title-text');
            const methodField = document.getElementById('method-field-modalAdmin');
            
            // Campos del formulario (usamos los IDs que pusiste en el parcial)
            const inputNombre = document.getElementById('inputNombre');
            const inputDescripcion = document.getElementById('inputDescripcion');

            if (genero) {
                // --- MODO EDITAR ---
                modalTitle.textContent = 'Editar Género';
                // Cambiamos la ruta a /generos/ID
                form.action = '/generos/' + genero.id_genero;
                // Añadimos el @method('PUT') que requiere Laravel para editar
                methodField.innerHTML = '<input type="hidden" name="_method" value="PUT">';
                
                // Rellenamos los campos con los datos del género
                inputNombre.value = genero.nombre;
                inputDescripcion.value = genero.descripcion;
            } else {
                // --- MODO NUEVO ---
                modalTitle.textContent = 'Añadir Nuevo Género';
                // La ruta para crear es /generos
                form.action = '/generos';
                // Quitamos el método PUT (porque para crear es POST)
                methodField.innerHTML = '';
                
                // Limpiamos el formulario
                form.reset();
            }
        });
    }
});
