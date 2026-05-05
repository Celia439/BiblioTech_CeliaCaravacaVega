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
        <x-generoComponent :generos=$generos />

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
            @if($libros)
            <x-libro-component :libros=$libros />
            @else
            <div class="col-12 text-center text-white opacity-50 py-5">
                <p>No hay libros disponibles en este género.</p>
            </div>
            @endif
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