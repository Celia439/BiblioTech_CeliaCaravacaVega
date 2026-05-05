@extends('layouts.admin')

@section('title', 'Gestión de Géneros')

@section('content')
<!-- ========== CONTENIDO ========== -->
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <div class="card-titulo">Gestión de Géneros</div>
            <button class="btn btn-naranja btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalNuevoGenero">
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
                        <td>{{ $genero->id }}</td>
                        <td class="fw-bold">{{ $genero->nombre }}</td>
                        <td>{{ $genero->descripcion }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-primary" title="Editar"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger" title="Eliminar"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Nuevo Género -->
<div class="modal fade" id="modalNuevoGenero" tabindex="-1" aria-labelledby="modalNuevoGeneroLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
            <div class="modal-header bg-prymary text-white" style="border-radius: 15px 15px 0 0;">
                <h5 class="modal-title fw-bold" id="modalNuevoGeneroLabel">
                    <i class="bi bi-plus-circle me-2"></i>Añadir Nuevo Género
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('generos.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4 text-dark">
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="color: var(--color-header);">Nombre del Género</label>
                        <input type="text" name="nombre" class="form-control rounded-pill px-3" placeholder="Ej: Ciencia Ficción" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold" style="color: var(--color-header);">Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="3" style="border-radius: 12px;" placeholder="Breve descripción del género..."></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 pb-4 justify-content-center">
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-naranja rounded-pill px-4 fw-bold">Guardar Género</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection