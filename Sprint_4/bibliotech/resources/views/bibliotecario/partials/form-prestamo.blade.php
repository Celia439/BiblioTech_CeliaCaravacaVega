<div class="mb-3">
    <label for="inputLector" class="form-label fw-bold">Lector</label>
    <select name="id_usuario_lector" id="inputLector" class="form-control" required>
        <option value="">Selecciona un lector</option>
        @foreach($lectores as $lector)
            <option value="{{ $lector->id_usuario }}">{{ $lector->nombre }} {{ $lector->apellido }} ({{ $lector->dni }})</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="inputEjemplar" class="form-label fw-bold">Ejemplar</label>
    <select name="id_ejemplar" id="inputEjemplar" class="form-control" required>
        <option value="">Selecciona un ejemplar</option>
        @foreach($ejemplares as $ejemplar)
            <option value="{{ $ejemplar->id_ejemplar }}">{{ $ejemplar->libro->titulo }} - {{ $ejemplar->codigo_barra }}</option>
        @endforeach
    </select>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="inputFechaPrestamo" class="form-label fw-bold">Fecha Préstamo</label>
        <input type="date" name="fecha_prestamo" id="inputFechaPrestamo" class="form-control" value="{{ date('Y-m-d') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label for="inputFechaLimite" class="form-label fw-bold">Fecha Límite</label>
        <input type="date" name="fecha_limite" id="inputFechaLimite" class="form-control" value="{{ date('Y-m-d', strtotime('+15 days')) }}" required>
    </div>
</div>

<div class="mb-3">
    <label for="inputEstadoPrestamo" class="form-label fw-bold">Estado</label>
    <select name="estado" id="inputEstadoPrestamo" class="form-control" required>
        <option value="activo">Activo</option>
        <option value="devuelto">Devuelto</option>
        <option value="atrasado">Atrasado</option>
    </select>
</div>

<div class="mb-3">
    <label for="inputObservacion" class="form-label fw-bold">Observación</label>
    <textarea name="observacion" id="inputObservacion" class="form-control" rows="2"></textarea>
</div>
