@extends('layouts.app')

@section('title', 'Mis Multas | BiblioTech')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4 text-white">
        <h2 class="fw-bold m-0">Multas</h2>
        <div class="d-flex align-items-center gap-2">
            <span>Sin pagar</span>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="filterUnpaid" checked>
            </div>
        </div>
    </div>

    <div class="agrupacion-contenido p-5 rounded-5" style="background-color: var(--color-bloque-fondo) !important;">
        <div class="d-flex flex-column gap-4">
            @forelse($multas as $multa)
                <div class="tarjeta-item p-4 rounded-4" style="background-color: var(--color-tarjeta) !important; border: 1px solid rgba(255,255,255,0.1);">
                    <div class="row align-items-center">
                        <!-- Imagen del Libro -->
                        <div class="col-md-2">
                            <div class="bg-white bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center" style="aspect-ratio: 1/1;">
                                <i class="bi bi-image text-white-50 fs-1"></i>
                            </div>
                        </div>

                        <!-- Información -->
                        <div class="col-md-10 text-white">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <h5 class="fw-bold mb-1">Libro: {{ $multa->prestamo->ejemplar->libro->titulo }}</h5>
                                    <div class="d-flex gap-4 small opacity-75">
                                        <span>Fecha de Generación: {{ $multa->fecha }}</span>
                                        <span>Estado: 
                                            @if(!$multa->pagada)
                                                Pendiente <i class="bi bi-exclamation-circle-fill text-danger"></i>
                                            @else
                                                Pagada <i class="bi bi-check-circle-fill text-success"></i>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <h4 class="fw-bold text-white mb-2">Multa: {{ $multa->importe }}€</h4>
                            
                            <div class="small opacity-75">
                                <p class="mb-1">Días de retraso: --</p>
                                <p class="mb-0">Motivo: Retraso en la devolución.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <p class="text-white opacity-50">No tienes multas registradas.</p>
                </div>
            @endforelse
        </div>

        <!-- Paginación estética -->
        @if($multas->count() > 0)
            <div class="d-flex justify-content-center gap-3 mt-5">
                <div class="rounded-circle bg-white bg-opacity-25" style="width: 25px; height: 25px;"></div>
                <div class="rounded-circle bg-white bg-opacity-25" style="width: 25px; height: 25px;"></div>
                <div class="rounded-circle bg-white bg-opacity-25" style="width: 25px; height: 25px;"></div>
                <div class="rounded-circle bg-white bg-opacity-25" style="width: 25px; height: 25px;"></div>
            </div>
        @endif
    </div>
</div>

<style>
    .form-check-input:checked {
        background-color: var(--color-btn-primario);
        border-color: var(--color-btn-primario);
    }
</style>
@endsection
