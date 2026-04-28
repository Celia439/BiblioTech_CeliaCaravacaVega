@extends('layouts.app')

@section('title', 'Historial de Reservas | BiblioTech')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <h2 class="fw-bold text-dark">Reservas</h2>
    </div>

    <div class="agrupacion-contenido p-5 rounded-5" style="background-color: var(--color-bloque-fondo) !important;">
        <!-- Cabecera de la sección -->
        <div class="mb-4 text-white">
            <h4 class="fw-bold m-0">Realizada/Pendiente</h4>
            <small class="opacity-75">5/10/2025 - 10/01/2026</small>
        </div>

        <!-- Rejilla de Reservas -->
        <div class="row g-4 mb-5">
            @forelse($reservas as $reserva)
                <div class="col-md-4">
                    <div class="tarjeta-item p-3 rounded-4 h-100" style="background-color: var(--color-tarjeta) !important; border: 1px solid rgba(255,255,255,0.1);">
                        <!-- Imagen y Corazón -->
                        <div class="position-relative mb-3">
                            <div class="bg-white bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center" style="aspect-ratio: 1/1;">
                                <i class="bi bi-book text-white-50 fs-1"></i>
                            </div>
                            <button class="btn btn-link position-absolute top-0 end-0 p-2 text-white opacity-75">
                                <i class="bi bi-heart fs-4"></i>
                            </button>
                        </div>

                        <!-- Info del Libro -->
                        <div class="text-white">
                            <h5 class="fw-bold mb-2">{{ $reserva->ejemplar->libro->titulo }}</h5>
                            <p class="small opacity-75 line-clamp-3">
                                {{ Str::limit($reserva->ejemplar->libro->descripcion, 100) }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-white opacity-50">No tienes reservas actualmente.</p>
                    <a href="/generos" class="btn btn-naranja rounded-pill mt-3">Explorar libros</a>
                </div>
            @endforelse
        </div>

        <!-- Paginación estética -->
        @if($reservas->count() > 0)
            <div class="d-flex justify-content-center gap-3 mt-4">
                <div class="rounded-circle bg-white bg-opacity-25" style="width: 25px; height: 25px;"></div>
                <div class="rounded-circle bg-white bg-opacity-100" style="width: 25px; height: 25px;"></div>
                <div class="rounded-circle bg-white bg-opacity-25" style="width: 25px; height: 25px;"></div>
                <div class="rounded-circle bg-white bg-opacity-25" style="width: 25px; height: 25px;"></div>
            </div>
        @endif
    </div>
</div>

<style>
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
</style>
@endsection
