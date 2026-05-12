@extends('layouts.admin')

@section('title', 'Gestión de Usuarios')

@section('content')
<!-- ========== CONTENIDO ========== -->
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <div class="card-titulo">Gestión de Usuarios</div>
            <button class="btn btn-naranja btn-sm rounded-pill px-3"
                data-bs-toggle="modal"
                data-bs-target="#modalAdmin"
                data-entity-name="usuarios"
                data-entity-title="Usuario">
                <i class="bi bi-plus-lg"></i> Nuevo Usuario
            </button>
        </div>

        <!-- Tabla de Usuarios -->
        <div class="table-responsive">
            <table class="tabla-biblioteca">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th style="width: 100px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id_usuario }}</td>
                        <td class="fw-bold">{{ $usuario->nombre }} {{ $usuario->apellido }}</td>
                        <td>{{ $usuario->dni ?? '---' }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td><span class="badge bg-light text-dark border">{{ ucfirst($usuario->rol ?? 'lector') }}</span></td>
                        <td>
                            <span class="estado-badge {{ $usuario->estado == 'activo' ? 'estado-activo' : 'estado-bloqueado' }}">
                                {{ ucfirst($usuario->estado ?? 'Activo') }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary"
                                    title="Editar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalAdmin"
                                    data-entity-name="usuarios"
                                    data-entity-title="Usuario"
                                    data-entity-data="{{ json_encode($usuario) }}"
                                    data-fields='{"nombre": "inputNombre", "apellido": "inputApellido", "dni": "inputDni", "email": "inputEmail", "rol": "inputRol", "estado": "inputEstado"}'>
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger"
                                    title="Eliminar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalBorrar"
                                    data-entity-name="usuarios"
                                    data-id="{{ $usuario->id_usuario }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">No hay usuarios registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- Modal de Edición/Creación --}}
<x-modal-reutilizable
    id="modalAdmin"
    title="Gestionar Usuario"
    action="{{ route('usuarios.store') }}"
    buttonText="Guardar">
    @include('bibliotecario.partials.form-usuario')
</x-modal-reutilizable>
{{-- Modal de Borrado --}}
<x-modal-reutilizable
    id="modalBorrar"
    title="Eliminar Usuario"
    action="" 
    buttonText="Eliminar definitivamente">
    <p>¿Estás seguro de que deseas eliminar este usuario? Esta acción no se puede deshacer.</p>
</x-modal-reutilizable>
@endsection