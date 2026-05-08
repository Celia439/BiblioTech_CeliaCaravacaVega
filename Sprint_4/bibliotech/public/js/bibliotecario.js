document.addEventListener("DOMContentLoaded", function () {
    // --- LÓGICA PARA EL MODAL DE EDICIÓN/CREACIÓN (modalAdmin) ---
    const modalAdmin = document.getElementById("modalAdmin");
    if (modalAdmin) {
        modalAdmin.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;
            const generoData = button.getAttribute("data-genero");
            const genero = generoData ? JSON.parse(generoData) : null;
            const form = modalAdmin.querySelector("form");
            const modalTitle = modalAdmin.querySelector(".modal-title-text");
            const methodField = document.getElementById(
                "method-field-modalAdmin",
            );
            const inputNombre = document.getElementById("inputNombre");
            const inputDescripcion =
                document.getElementById("inputDescripcion");

            if (genero) {
                modalTitle.textContent = "Editar Género";
                form.action = "/generos/" + genero.id_genero;
                methodField.innerHTML =
                    '<input type="hidden" name="_method" value="PUT">';
                inputNombre.value = genero.nombre;
                inputDescripcion.value = genero.descripcion;
            } else {
                modalTitle.textContent = "Añadir Nuevo Género";
                form.action = "/generos";
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
            const form = modalBorrar.querySelector("form");
            const methodField = document.getElementById(
                "method-field-modalBorrar",
            );

            form.action = "/generos/" + id;
            methodField.innerHTML =
                '<input type="hidden" name="_method" value="DELETE">';
        });
    }
});
