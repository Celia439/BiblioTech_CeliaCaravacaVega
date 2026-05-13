<div class="mb-3">
    <label for="inputUsuario" class="form-label fw-bold">Usuario</label>
    <select name="id_usuario" id="inputUsuario" class="form-control" required>
        <option value="">Selecciona un usuario</option>
        @foreach($usuarios as $usuario)
            <option value="{{ $usuario->id_usuario }}">{{ $usuario->nombre }} {{ $usuario->apellido }} ({{ $usuario->dni }})</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="inputEjemplarReserva" class="form-label fw-bold">Ejemplar</label>
    <select name="id_ejemplar" id="inputEjemplarReserva" class="form-control" required>
        <option value="">Selecciona un ejemplar</option>
        @foreach($ejemplares as $ejemplar)
            <option value="{{ $ejemplar->id_ejemplar }}">{{ $ejemplar->libro->titulo }} - {{ $ejemplar->codigo_barra }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="inputFechaReserva" class="form-label fw-bold">Fecha de Reserva</label>
    <input type="date" name="fecha_reserva" id="inputFechaReserva" class="form-control" value="{{ date('Y-m-d') }}" required>
</div>

<div class="mb-3">
    <label for="inputEstadoReserva" class="form-label fw-bold">Estado</label>
    <select name="estado" id="inputEstadoReserva" class="form-control" required>
        <option value="activa">Activa</option>
        <option value="cancelada">Cancelada</option>
        <option value="completada">Completada</option>
    </select>
</div>

<div class="mb-3">
    <label for="inputObservacionReserva" class="form-label fw-bold">Observación</label>
    <textarea name="observacion" id="inputObservacionReserva" class="form-control" rows="2"></textarea>
</div>
