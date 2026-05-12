@extends('layouts.admin')

@section('title', 'Gestión de Préstamos')

@section('content')
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <div class="card-titulo">Préstamos Activos</div>
            <button class="btn btn-naranja btn-sm rounded-pill px-3">
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
                        <th>Fecha Devolución</th>
                        <th>Estado</th>
                        <th style="width: 100px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prestamos as $prestamo)
                    <tr>
                        <td>{{ $prestamo->id_prestamo }}</td>
                        <td>{{ $prestamo->ejemplar->libro->isbn }}</td>
                        <td class="fw-bold">{{ $prestamo->ejemplar->libro->titulo }}</td>
                        <td>{{ $prestamo->lector->nombre }}</td>
                        <td>{{ $prestamo->fecha_prestamo }}</td>
                        <td>{{ $prestamo->fecha_devolucion }}</td>
                        <td>
                            @if($prestamo->estado == 'activo')
                            <span class="estado-badge estado-activo">Pendiente</span>
                            @elseif($prestamo->estado == 'cancelado')
                            <span class="estado-badge estado-bloqueado">Cancelada</span>
                            @else
                            <span class="estado-badge shadow-sm">Completada</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-sm btn-outline-success" title="Finalizar"><i class="bi bi-check-lg"></i></button>
                                <button class="btn btn-sm btn-outline-danger" title="Borrar"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
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
@endsection