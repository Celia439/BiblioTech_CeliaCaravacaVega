@extends('layouts.admin')

@section('title', 'Gestión de Reservas')

@section('content')
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <div class="card-titulo">Reservas Pendientes</div>
            <button class="btn btn-naranja btn-sm rounded-pill px-3"
                data-bs-toggle="modal"
                data-bs-target="#modalAdmin"
                data-entity-name="reservas"
                data-entity-title="Reserva">
                <i class="bi bi-plus-lg"></i> Nueva Reserva
            </button>
        </div>

        <div class="table-responsive" style="margin-top: 1rem;">
            <table class="tabla-biblioteca text-center">
                <thead>
                    <tr>
                        <th>ID Reserva</th>
                        <th>ISBN</th>
                        <th>Título</th>
                        <th>Usuario</th>
                        <th>Fecha Reserva</th>
                        <th>Estado</th>
                        <th style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reservas as $reserva)
                    <tr>
                        <td>{{ $reserva->id_reserva }}</td>
                        <td>{{ $reserva->ejemplar->libro->isbn }}</td>
                        <td class="fw-bold">{{ $reserva->ejemplar->libro->titulo }}</td>
                        <td>{{ $reserva->usuario->nombre }} {{ $reserva->usuario->apellido }}</td>
                        <td>{{ $reserva->fecha_reserva }}</td>
                        <td>
                            @if($reserva->estado == 'activa')
                            <span class="estado-badge estado-activo">Activa</span>
                            @elseif($reserva->estado == 'cancelada')
                            <span class="estado-badge estado-bloqueado">Cancelada</span>
                            @else
                            <span class="estado-badge shadow-sm">Completada</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-sm btn-outline-primary"
                                    title="Editar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalAdmin"
                                    data-entity-name="reservas"
                                    data-entity-title="Reserva"
                                    data-entity-data="{{ json_encode($reserva) }}"
                                    data-fields='{"id_usuario": "inputUsuario", "id_ejemplar": "inputEjemplarReserva", "fecha_reserva": "inputFechaReserva", "estado": "inputEstadoReserva", "observacion": "inputObservacionReserva"}'>
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger"
                                    title="Eliminar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalBorrar"
                                    data-entity-name="reservas"
                                    data-id="{{ $reserva->id_reserva }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No hay reservas registradas.</td>
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
    title="Gestionar Reserva"
    action="{{ route('reservas.store') }}"
    buttonText="Guardar">
    @include('bibliotecario.partials.form-reserva')
</x-modal-reutilizable>

{{-- Modal de Borrado --}}
<x-modal-reutilizable
    id="modalBorrar"
    title="Eliminar Reserva"
    action=""
    buttonText="Eliminar definitivamente">
    <p>¿Estás seguro de que deseas eliminar esta reserva? Esta acción no se puede deshacer.</p>
</x-modal-reutilizable>
@endsection
