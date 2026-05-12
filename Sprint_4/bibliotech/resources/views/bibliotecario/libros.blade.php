@extends('layouts.admin')

@section('title', 'Gestión de Libros')

@section('content')
<!-- ========== CONTENIDO ========== -->
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <div class="card-titulo">Gestión de Libros</div>
            <button class="btn btn-naranja btn-sm rounded-pill px-3"
                data-bs-toggle="modal"
                data-bs-target="#modalAdmin"
                data-entity-name="libros"
                data-entity-title="Libro">
                <i class="bi bi-plus-lg"></i> Nuevo Libro
            </button>
        </div>

        <!-- Tabla de Libros -->
        <div class="table-responsive" style="margin-top: 1rem;">
            <table class="tabla-biblioteca">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ISBN</th>
                        <th>Título</th>
                        <th>Cantidad</th>
                        <th>Autor</th>
                        <th>Estado</th>
                        <th style="width: 100px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($libros as $libro)
                    <tr>
                        <td>{{ $libro->id_libro }}</td>
                        <td>{{ $libro->isbn }}</td>
                        <td class="fw-bold">{{ $libro->titulo }}</td>
                        <td>{{ $libro->cantidad }}</td>
                        <td>{{ $libro->autor }}</td>
                        <td>
                            <span class="estado-badge {{ $libro->cantidad > 0 ? 'estado-activo' : 'estado-bloqueado' }}">
                                {{ $libro->cantidad > 0 ? 'Activo' : 'Agotado' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary"
                                    title="Editar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalAdmin"
                                    data-entity-name="libros"
                                    data-entity-title="Libro"
                                    data-entity-data="{{ json_encode($libro) }}"
                                    data-fields='{"titulo": "inputTitulo", "autor": "inputAutor", "isbn": "inputISBN", "editorial": "inputEditorial", "anio_publicacion": "inputAnio", "cantidad": "inputCantidad", "estado": "inputEstado", "descripcion": "inputDescripcionLibro"}'>
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger"
                                    title="Eliminar"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalBorrar"
                                    data-entity-name="libros"
                                    data-id="{{ $libro->id_libro }}">
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
    title="Gestionar Libro"
    action="{{ route('libros.store') }}"
    buttonText="Guardar">
    @include('bibliotecario.partials.form-libro')
</x-modal-reutilizable>

{{-- Modal de Borrado --}}
<x-modal-reutilizable
    id="modalBorrar"
    title="Eliminar Libro"
    action="" 
    buttonText="Eliminar definitivamente">
    <p>¿Estás seguro de que deseas eliminar este libro? Esta acción no se puede deshacer.</p>
</x-modal-reutilizable>
@endsection