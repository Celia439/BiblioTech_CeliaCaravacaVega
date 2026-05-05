@extends('layouts.admin')

@section('title', 'Gestión de Géneros')

@section('content')
<!-- ========== CONTENIDO ========== -->
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <div class="card-titulo">Gestión de Géneros</div>
            <button class="btn btn-naranja btn-sm rounded-pill px-3">
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
@endsection