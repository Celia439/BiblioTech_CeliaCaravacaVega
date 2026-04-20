@extends('layouts.admin')

@section('title', 'Gestión de Multas')

@section('content')
<div class="contenido-principal">
    <div class="card-biblioteca">
        <div class="card-titulo">Control de Multas y Sanciones</div>

        <div class="table-responsive" style="margin-top: 1rem;">
            <table class="tabla-biblioteca text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>DNI</th>
                        <th>Importe</th>
                        <th>Fecha Multa</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th style="width: 100px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12</td>
                        <td>Usuario Demo</td>
                        <td>12345678X</td>
                        <td class="fw-bold text-danger">5.00€</td>
                        <td>15/04/2026</td>
                        <td class="small">Retraso de 5 días en devolución</td>
                        <td><span class="estado-badge estado-bloqueado">Impagada</span></td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-sm btn-outline-success" title="Marcar como Pagada"><i class="bi bi-cash"></i></button>
                                <button class="btn btn-sm btn-outline-danger" title="Anular"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
