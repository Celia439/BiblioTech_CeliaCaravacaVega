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
                                @if(!$multa->pagada)
                                    <button class="btn btn-sm btn-outline-success" title="Marcar como Pagada"><i class="bi bi-cash"></i></button>
                                @endif
                                <button class="btn btn-sm btn-outline-danger" title="Anular"><i class="bi bi-trash"></i></button>
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
@endsection
