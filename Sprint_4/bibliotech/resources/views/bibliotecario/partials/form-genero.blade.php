<div class="mb-3">
    <label class="form-label fw-bold">Nombre del Género</label>
    <input type="text" name="nombre" id="inputNombre" class="form-control rounded-pill px-3"
        value="{{ $genero->nombre ?? '' }}" required>
</div>
<div class="mb-3">
    <label class="form-label fw-bold">Descripción</label>
    <textarea name="descripcion" id="inputDescripcion" class="form-control" rows="3"
        style="border-radius: 12px;">{{ $genero->descripcion ?? '' }}</textarea>
</div>