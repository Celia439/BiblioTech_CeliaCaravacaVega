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
                    <tr>
                        <td>124</td>
                        <td>978-84-1107-123-9</td>
                        <td class="fw-bold">El Principito</td>
                        <td>Usuario Demo</td>
                        <td>20/04/2026</td>
                        <td>10/05/2026</td>
                        <td><span class="estado-badge estado-activo">Pendiente</span></td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-sm btn-outline-success" title="Finalizar"><i class="bi bi-check-lg"></i></button>
                                <button class="btn btn-sm btn-outline-danger" title="Borrar"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
