@extends('layouts.app')

@section('title', 'Mis Favoritos | BiblioTech')

@section('content')
<div class="container py-5">
    <div class="mb-4">
        <h2 class="fw-bold text-dark">Mis Favoritos</h2>
    </div>

    <div class="agrupacion-contenido p-5 rounded-5" style="background-color: var(--color-bloque-fondo) !important;">
        <!-- Rejilla de Favoritos -->
        <div class="row g-4">
            @forelse($favoritos as $favorito)
                @php $libro = $favorito->libro; @endphp
                <div class="col-md-4">
                    <div class="tarjeta-item p-3 rounded-4 h-100" style="background-color: var(--color-tarjeta) !important; border: 1px solid rgba(255,255,255,0.1);">
                        <!-- Imagen y Corazón (activo) -->
                        <div class="position-relative mb-3">
                            <div class="bg-white bg-opacity-10 rounded-3 d-flex align-items-center justify-content-center" style="aspect-ratio: 1/1;">
                                <i class="bi bi-heart-fill text-danger fs-1"></i>
                            </div>
                            <button class="btn btn-link position-absolute top-0 end-0 p-2 text-danger">
                                <i class="bi bi-heart-fill fs-4"></i>
                            </button>
                        </div>

                        <!-- Info del Libro -->
                        <div class="text-white">
                            <h5 class="fw-bold mb-2">{{ $libro->titulo }}</h5>
                            <p class="small opacity-75 mb-3">
                                {{ Str::limit($libro->descripcion, 100) }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-light text-dark rounded-pill">{{ $libro->estado }}</span>
                                <a href="{{ route('libros.show', $libro->id_libro) }}" class="btn btn-sm btn-naranja rounded-pill px-3">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-white opacity-50">Aún no has añadido libros a tus favoritos.</p>
                    <a href="/generos" class="btn btn-naranja rounded-pill mt-3">Explorar catálogo</a>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection