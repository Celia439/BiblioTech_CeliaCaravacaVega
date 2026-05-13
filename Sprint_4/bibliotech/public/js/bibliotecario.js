document.addEventListener("DOMContentLoaded", function () {
    // --- LÓGICA PARA EL MODAL DE EDICIÓN/CREACIÓN (modalAdmin) ---
    const modalAdmin = document.getElementById("modalAdmin");
    if (modalAdmin) {
        modalAdmin.addEventListener("show.bs.modal", function (event) {
            // Es el botón pulsado
            const button = event.relatedTarget;

            //Recoger los datos del registro 
            const entityData = button.getAttribute("data-entity-data");
            const entity = entityData ? JSON.parse(entityData) : null;
            // Nombre de entidad y titulo del modal
            const entityName = button.getAttribute("data-entity-name"); // p.ej. "generos", "libros", "usuarios"
            const entityTitle = button.getAttribute("data-entity-title"); // p.ej. "Género", "Libro", "Usuario"
            //Seleccionar el formualrio el titulo y div del metodo.
            const form = modalAdmin.querySelector("form");
            const modalTitle = modalAdmin.querySelector(".modal-title-text");
            const methodField = document.getElementById("method-field-modalAdmin");

            if (entity) {
                // MODO EDICIÓN
                modalTitle.textContent = "Editar " + entityTitle;
                // Ajustamos la acción del formulario según la entidad
                // Nota: Usamos el ID de la entidad que puede variar (id_genero, id_libro, id_usuario, etc.)
                const id = entity.id || entity.id_genero || entity.id_libro || entity.id_usuario || entity.id_prestamo || entity.id_reserva || entity.id_multa;
                //Cambiar la ruta del formulario
                form.action = "/bibliotecario/" + entityName + "/" + id;
                // Asignar el metodo PUT para que laravel sepa que vamos a editar
                methodField.innerHTML = '<input type="hidden" name="_method" value="PUT">';

                // Rellenar campos automáticamente
                // El botón puede tener un atributo data-fields con los IDs de los inputs a rellenar
                const fieldsAttr = button.getAttribute("data-fields");
                if (fieldsAttr) {
                    const fields = JSON.parse(fieldsAttr);
                    Object.keys(fields).forEach(key => {
                        const input = document.getElementById(fields[key]);
                        if (input) {
                            input.value = entity[key] || "";
                        }
                    });
                }
            } else {
                // MODO CREACIÓN
                modalTitle.textContent = "Añadir Nuevo " + entityTitle;
                form.action = "/bibliotecario/" + entityName;
                methodField.innerHTML = "";
                form.reset();
            }
        });
    }

    // --- LÓGICA PARA EL MODAL DE BORRADO (modalBorrar) ---
    const modalBorrar = document.getElementById("modalBorrar");
    if (modalBorrar) {
        modalBorrar.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;
            const id = button.getAttribute("data-id");
            const entityName = button.getAttribute("data-entity-name");
            const form = modalBorrar.querySelector("form");
            const methodField = document.getElementById("method-field-modalBorrar");

            form.action = "/bibliotecario/" + entityName + "/" + id;
            methodField.innerHTML = '<input type="hidden" name="_method" value="DELETE">';
        });
    }
});
