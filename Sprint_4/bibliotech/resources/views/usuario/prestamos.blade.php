@extends('layouts.app')

@section('title', 'Historial de Préstamos | BiblioTech')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <h2 class="fw-bold text-dark">Préstamos</h2>
    </div>

    <div class="agrupacion-contenido p-5 rounded-5" style="background-color: var(--color-bloque-fondo) !important;">
        <div class="d-flex flex-column gap-4">
            @forelse($prestamos as $prestamo)
                <div class="tarjeta-item p-4 rounded-4" style="background-color: var(--color-tarjeta) !important; border: 1px solid rgba(255,255,255,0.1);">
                    <div class="row align-items-center">
                        <!-- Imagen del Libro -->
                        <div class="col-md-2">
                            <div class="bg-white bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center" style="aspect-ratio: 1/1;">
                                <i class="bi bi-journal-check text-white-50 fs-1"></i>
                            </div>
                        </div>

                        <!-- Información -->
                        <div class="col-md-10 text-white">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <h5 class="fw-bold mb-1">Libro: {{ $prestamo->ejemplar->libro->titulo }}</h5>
                                    <div class="d-flex gap-4 small opacity-75">
                                        <span>Fecha Préstamo: {{ $prestamo->fecha_prestamo }}</span>
                                        <span>Estado: 
                                            @if($prestamo->estado === 'activo')
                                                <span class="text-warning">Activo <i class="bi bi-clock-history"></i></span>
                                            @else
                                                <span class="text-success">Devuelto <i class="bi bi-check-circle-fill"></i></span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-3 small opacity-75">
                                <p class="mb-1"><strong>Fecha Limite:</strong> {{ $prestamo->fecha_limite }}</p>
                                <p class="mb-0"><strong>Observación:</strong> {{ $prestamo->observacion ?? 'Sin observaciones.' }}</p>
                            </div>

                            <div class="mt-3">
                                <a href="{{ route('libros.show', $prestamo->ejemplar->libro->id_libro) }}" class="btn btn-sm btn-outline-light rounded-pill px-3">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <p class="text-white opacity-50">No tienes préstamos registrados.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection