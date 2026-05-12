@extends('layouts.admin')

@section('title', 'Gestión de Préstamos')

@section('content')
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <div class="card-titulo">Préstamos Activos</div>
            <button class="btn btn-naranja btn-sm rounded-pill px-3"
                data-bs-toggle="modal"
                data-bs-target="#modalAdmin"
                data-entity-name="prestamos"
                data-entity-title="Préstamo">
                <i class="bi bi-plus-lg"></i> Registrar Préstamo
            </button>
        </div>

        <div class="table-responsive">
            <table class="tabla-biblioteca text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ISBN</th>
                        <th>Título</th>
                        <th>Usuario</th>
                        <th>Fecha Salida</th>
                        <th>Fecha Límite</th>
                        <th>Estado</th>
                        <th style="width: 100px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prestamos as $prestamo)
                    <tr>
                        <td>{{ $prestamo->id_prestamo }}</td>
                        <td>{{ $prestamo->ejemplar->libro->isbn ?? '---' }}</td>
                        <td class="fw-bold">{{ $prestamo->ejemplar->libro->titulo ?? '---' }}</td>
                        <td>{{ $prestamo->lector->nombre ?? '---' }} {{ $prestamo->lector->apellido ?? '' }}</td>
                        <td>{{ $prestamo->fecha_prestamo }}</td>
                        <td>{{ $prestamo->fecha_limite }}</td>
                        <td>
                            @if($prestamo->estado == 'activo')
                                <span class="estado-badge estado-activo">Pendiente</span>
                            @elseif($prestamo->estado == 'atrasado')
                                <span class="estado-badge estado-bloqueado">Atrasado</span>
                            @else
                                <span class="estado-badge shadow-sm">Devuelto</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-sm btn-outline-primary"
                                    title="Editar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalAdmin"
                                    data-entity-name="prestamos"
                                    data-entity-title="Préstamo"
                                    data-entity-data="{{ json_encode($prestamo) }}"
                                    data-fields='{"id_usuario_lector": "inputLector", "id_ejemplar": "inputEjemplar", "fecha_prestamo": "inputFechaPrestamo", "fecha_limite": "inputFechaLimite", "estado": "inputEstadoPrestamo", "observacion": "inputObservacion"}'>
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger"
                                    title="Eliminar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalBorrar"
                                    data-entity-name="prestamos"
                                    data-id="{{ $prestamo->id_prestamo }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <i class="bi bi-clipboard-data fs-1 text-muted mb-3"></i>
                            <p class="text-muted fw-bold">No se han registrado préstamos</p>
                        </td>
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
    title="Gestionar Préstamo"
    action="{{ route('prestamos.store') }}"
    buttonText="Guardar">
    @include('bibliotecario.partials.form-prestamo')
</x-modal-reutilizable>

{{-- Modal de Borrado --}}
<x-modal-reutilizable
    id="modalBorrar"
    title="Eliminar Préstamo"
    action="" 
    buttonText="Eliminar definitivamente">
    <p>¿Estás seguro de que deseas eliminar este préstamo? Esta acción no se puede deshacer.</p>
</x-modal-reutilizable>
@endsection