@extends('layouts.admin')

@section('title', 'Gestión de Usuarios')

@section('content')
<!-- ========== CONTENIDO ========== -->
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <div class="card-titulo">Gestión de Usuarios</div>
            <button class="btn btn-naranja btn-sm rounded-pill px-3">
                <i class="bi bi-person-plus-fill"></i> Nuevo Usuario
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
                        <td>{{ $usuario->id }}</td>
                        <td class="fw-bold">{{ $usuario->name }}</td>
                        <td>{{ $usuario->dni ?? '---' }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td><span class="badge bg-light text-dark border">{{ ucfirst($usuario->role ?? 'lector') }}</span></td>
                        <td>
                            <span class="estado-badge {{ $usuario->status == 'activo' ? 'estado-activo' : 'estado-bloqueado' }}">
                                {{ ucfirst($usuario->status ?? 'Activo') }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary" title="Editar"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="bi bi-trash"></i></button>
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
@endsection
