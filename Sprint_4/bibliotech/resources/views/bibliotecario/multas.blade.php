@extends('layouts.admin')

@section('title', 'Gestión de Multas')

@section('content')
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <div class="card-titulo">Control de Multas y Sanciones</div>
        </div>

        <div class="table-responsive" style="margin-top: 1rem;">
            <table class="tabla-biblioteca text-center">
                <thead>
                    <tr>
                        <th>ID Multa</th>
                        <th>Usuario</th>
                        <th>DNI</th>
                        <th>Importe</th>
                        <th>Fecha Multa</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($multas as $multa)
                    <tr>
                        <td>{{ $multa->id_multa }}</td>
                        <td>{{ $multa->prestamo->lector->nombre }} {{ $multa->prestamo->lector->apellido }}</td>
                        <td>{{ $multa->prestamo->lector->dni }}</td>
                        <td class="fw-bold text-danger">{{ $multa->importe }}€</td>
                        <td>{{ $multa->fecha }}</td>
                        <td class="small">Multa generada por retraso</td>
                        <td>
                            @if(!$multa->pagada)
                                <span class="estado-badge estado-bloqueado">Impagada</span>
                            @else
                                <span class="estado-badge estado-activo">Pagada</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-sm btn-outline-primary"
                                    title="Editar estado"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalAdmin"
                                    data-entity-name="multas"
                                    data-entity-title="Multa"
                                    data-entity-data="{{ json_encode($multa) }}"
                                    data-fields='{"pagada": "inputPagada"}'>
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger"
                                    title="Eliminar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalBorrar"
                                    data-entity-name="multas"
                                    data-id="{{ $multa->id_multa }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">No hay multas registradas en el sistema.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal de Edición --}}
<x-modal-reutilizable
    id="modalAdmin"
    title="Gestionar Multa"
    action="{{ route('multas.store') }}"
    buttonText="Guardar">
    @include('bibliotecario.partials.form-multa')
</x-modal-reutilizable>

{{-- Modal de Borrado --}}
<x-modal-reutilizable
    id="modalBorrar"
    title="Eliminar Multa"
    action=""
    buttonText="Eliminar definitivamente">
    <p>¿Estás seguro de que deseas eliminar esta multa? Esta acción no se puede deshacer.</p>
</x-modal-reutilizable>
@endsection
