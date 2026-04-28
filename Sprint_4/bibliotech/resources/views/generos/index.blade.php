@extends('layouts.app')

@section('title', 'Explorar Géneros')

@section('content')
<main class="container my-5">
    
    <!-- Puntos de navegación superior -->
    <div class="d-flex align-items-center justify-content-center mb-4 carrusel-puntos overflow-auto py-2">
        <a href="/" class="text-decoration-none me-3">
            <button class="btn btn-sm btn-secondary rounded-circle" style="width: 32px; height: 32px; background-color: var(--color-header); border:none;">
                <i class="bi bi-chevron-left" style="color:white; font-size:16px;"></i>
            </button>
        </a>
        @foreach($generos as $genero)
            <a href="{{ route('generos.index', ['id_genero' => $genero->id_genero]) }}" class="text-decoration-none d-flex align-items-center me-3">
                <span class="punto {{ ($generoActivo && $generoActivo->id_genero == $genero->id_genero) ? 'activo' : '' }} mx-2"></span>
                <span class="fs-6 fw-bold {{ ($generoActivo && $generoActivo->id_genero == $genero->id_genero) ? '' : 'text-muted' }}" 
                      style="{{ ($generoActivo && $generoActivo->id_genero == $genero->id_genero) ? 'color:var(--color-header)' : '' }}">
                    {{ $genero->nombre }}
                </span>
            </a>
        @endforeach
    </div>

    <!-- Sección de Géneros -->
    <section class="agrupacion-contenido">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h2 class="mb-1 text-white">Género: {{ $generoActivo->nombre ?? 'Todos' }}</h2>
                <p class="subtitulo text-white opacity-75 mb-0" style="font-size: 0.95rem;">Resultados: {{ $libros->count() }}</p>
            </div>
        </div>

        <div class="row g-4">
            @forelse($libros as $libro)
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="tarjeta-item">
                    <div class="tarjeta-imagen">
                        @if($libro->imagen)
                            <img src="{{ asset('storage/' . $libro->imagen) }}" alt="{{ $libro->titulo }}" class="img-fluid rounded">
                        @endif
                    </div>
                    <h3>{{ $libro->titulo }}</h3>
                    <p class="text-truncate">{{ $libro->descripcion }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <span class="text-muted small">{{ $libro->autor }}</span>
                        <a href="{{ route('libros.show', $libro->id_libro) }}" class="btn btn-sm btn-outline-light">Ver más</a>
                    </div>
                    <button class="btn-favorito">❤</button>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-white opacity-50 py-5">
                <p>No hay libros disponibles en este género.</p>
            </div>
            @endforelse
        </div>

        <!-- Paginación -->
         <div class="d-flex justify-content-center mt-5">
            <span class="punto activo border-0 me-2" style="background-color: var(--color-texto-claro);"></span>
            <span class="punto border-0 me-2" style="background-color: rgba(255,255,255,0.2);"></span>
            <span class="punto border-0 me-2" style="background-color: rgba(255,255,255,0.2);"></span>
            <span class="punto border-0" style="background-color: rgba(255,255,255,0.2);"></span>
         </div>
    </section>
</main>
@endsection
