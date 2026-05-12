<div class="mb-3">
    <label for="inputTitulo" class="form-label fw-bold">Título</label>
    <input type="text" name="titulo" id="inputTitulo" class="form-control" required>
</div>
<div class="mb-3">
    <label for="inputAutor" class="form-label fw-bold">Autor</label>
    <input type="text" name="autor" id="inputAutor" class="form-control" required>
</div>
<div class="mb-3">
    <label for="inputISBN" class="form-label fw-bold">ISBN</label>
    <input type="text" name="isbn" id="inputISBN" class="form-control" required>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="inputEditorial" class="form-label fw-bold">Editorial</label>
        <input type="text" name="editorial" id="inputEditorial" class="form-control">
    </div>
    <div class="col-md-6 mb-3">
        <label for="inputAnio" class="form-label fw-bold">Año de Publicación</label>
        <input type="number" name="anio_publicacion" id="inputAnio" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="inputCantidad" class="form-label fw-bold">Cantidad</label>
        <input type="number" name="cantidad" id="inputCantidad" class="form-control" value="1">
    </div>
    <div class="col-md-6 mb-3">
        <label for="inputEstado" class="form-label fw-bold">Estado</label>
        <select name="estado" id="inputEstado" class="form-control">
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
    </div>
</div>
<div class="mb-3">
    <label for="inputDescripcionLibro" class="form-label fw-bold">Descripción</label>
    <textarea name="descripcion" id="inputDescripcionLibro" class="form-control" rows="3"></textarea>
</div>
