@extends('layouts.admin')

@section('title', 'Gestión de Géneros')

@section('content')
<!-- ========== CONTENIDO ========== -->
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <div class="card-titulo">Gestión de Géneros</div>
            <button class="btn btn-naranja btn-sm rounded-pill px-3"
                data-bs-toggle="modal"
                data-bs-target="#modalAdmin">
                <i class="bi bi-plus-lg"></i> Nuevo Género
            </button>
        </div>

        <!-- Tabla de Géneros -->
        <div class="table-responsive" style="margin-top: 1rem;">
            <table class="tabla-biblioteca">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th style="width: 100px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($generos as $genero)
                    <tr>
                        <td>{{ $genero->id_genero }}</td>
                        <td class="fw-bold">{{ $genero->nombre }}</td>
                        <td>{{ $genero->descripcion }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary"
                                    title="Editar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalAdmin"
                                    data-genero="{{ json_encode($genero) }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger"
                                    title="Eliminar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalBorrar"
                                    data-id="{{ $genero->id_genero }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- Modal de Edición/Creación --}}
<x-modal-reutilizable
    id="modalAdmin"
    title="Gestionar Género"
    action="{{ route('generos.store') }}"
    buttonText="Guardar">
    @include('bibliotecario.partials.form-genero')
</x-modal-reutilizable>
{{-- Modal de Borrado --}}
<x-modal-reutilizable
    id="modalBorrar"
    title="Eliminar Género"
    action="" {{-- La pondremos con JS --}}
    buttonText="Eliminar definitivamente">
    <p>¿Estás seguro de que deseas eliminar este género? Esta acción no se puede deshacer.</p>
</x-modal-reutilizable>
@endsection