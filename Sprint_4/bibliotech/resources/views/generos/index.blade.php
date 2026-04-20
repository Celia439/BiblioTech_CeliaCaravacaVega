@extends('layouts.app')

@section('title', 'Explorar Géneros')

@section('content')
<main class="container my-5">
    
    <!-- Puntos de navegación superior -->
    <div class="d-flex align-items-center justify-content-center mb-4 carrusel-puntos">
        <a href="/" class="text-decoration-none me-3">
            <button class="btn btn-sm btn-secondary rounded-circle" style="width: 32px; height: 32px; background-color: var(--color-header); border:none;">
                <i class="bi bi-chevron-left" style="color:white; font-size:16px;"></i>
            </button>
        </a>
        <span class="punto activo mx-2"></span><span class="fs-6 me-3 fw-bold" style="color:var(--color-header)">General</span>
        <span class="punto mx-2"></span><span class="fs-6 me-3 text-muted">Miedo</span>
        <span class="punto mx-2"></span><span class="fs-6 me-3 text-muted">Acción</span>
        <span class="punto mx-1"></span><span class="punto mx-1"></span><span class="punto mx-1"></span><span class="punto mx-1"></span>
    </div>

    <!-- Sección de Géneros -->
    <section class="agrupacion-contenido">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h2 class="mb-1 text-white">Género: General</h2>
                <p class="subtitulo text-white opacity-75 mb-0" style="font-size: 0.95rem;">Resultados: 6</p>
            </div>
        </div>

        <div class="row g-4">
            @php
                $ejemplos = [
                    ['titulo' => 'Don Quijote de la Mancha', 'desc' => 'La historia del caballero de la triste figura.'],
                    ['titulo' => 'Cien años de soledad', 'desc' => 'La saga de la familia Buendía en Macondo.'],
                    ['titulo' => '1984', 'desc' => 'Una distopía sobre el control totalitario y la vigilancia.'],
                    ['titulo' => 'El Hobbit', 'desc' => 'El viaje de Bilbo Bolsón para recuperar un tesoro.'],
                    ['titulo' => 'Crónica de una muerte anunciada', 'desc' => 'Una historia sobre el honor y el destino fatal.'],
                    ['titulo' => 'La sombra del viento', 'desc' => 'Un misterio en la Barcelona de la posguerra.'],
                ];
            @endphp

            @foreach($ejemplos as $libro)
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="tarjeta-item">
                    <div class="tarjeta-imagen"></div>
                    <h3>{{ $libro['titulo'] }}</h3>
                    <p>{{ $libro['desc'] }}</p>
                    <button class="btn-favorito">❤</button>
                </div>
            </div>
            @endforeach
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
