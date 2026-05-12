@csrf
<div class="mb-3">
    <label class="form-label fw-bold">Nombre</label>
    <input type="text" name="nombre" id="inputNombre" class="form-control rounded-pill px-3"
        value="{{ $usuario->nombre ?? '' }}" required>
</div>
<div class="mb-3">
    <label class="form-label fw-bold">Apellido</label>
    <input type="text" name="apellido" id="inputApellido" class="form-control rounded-pill px-3"
        value="{{ $usuario->apellido ?? '' }}" required>
</div>
<div class="mb-3">
    <label class="form-label fw-bold"></label>DNI</label>
    <input type="text" name="dni" id="inputDni" class="form-control rounded-pill px-3"
        value="{{ $usuario->dni ?? '' }}" required>
</div>
<div class="mb-3">
    <label class="form-label fw-bold">Email</label>
    <input type="email" name="email" id="inputEmail" class="form-control rounded-pill px-3"
        value="{{ $usuario->email ?? '' }}" required>
</div>
<div class="mb-3">
    <label class="form-label fw-bold">Rol</label>
    <select name="rol" id="inputRol" class="form-control rounded-pill px-3"
        value="{{ $usuario->role ?? '' }}" required>
        <option value="lector">Lector</option>
        <option value="bibliotecario">Bibliotecario</option>
    </select>
</div>
<div class="mb-3">
    <label class="form-label fw-bold">Estado</label>
    <select name="estado" id="inputEstado" class="form-control rounded-pill px-3"
        value="{{ $usuario->estado ?? '' }}" required>
        <option value="activo">Activo</option>
        <option value="bloqueado">Bloqueado</option>
    </select>
</div>