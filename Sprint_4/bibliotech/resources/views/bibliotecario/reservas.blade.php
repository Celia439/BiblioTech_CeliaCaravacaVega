@extends('layouts.admin')

@section('title', 'Gestión de Reservas')

@section('content')
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div class="card-titulo">Reservas Pendientes</div>

        <div class="table-responsive" style="margin-top: 1rem;">
            <table class="tabla-biblioteca text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ISBN</th>
                        <th>Título</th>
                        <th>Usuario</th>
                        <th>Fecha Reserva</th>
                        <th>Estado</th>
                        <th style="width: 100px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>55</td>
                        <td>978-Boring-1</td>
                        <td class="fw-bold">Don Quijote</td>
                        <td>Usuario Prueba</td>
                        <td>19/04/2026</td>
                        <td><span class="estado-badge estado-activo">Pendiente</span></td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-sm btn-outline-primary" title="Gestionar"><i class="bi bi-gear"></i></button>
                                <button class="btn btn-sm btn-outline-danger" title="Cancelar"><i class="bi bi-x-lg"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
