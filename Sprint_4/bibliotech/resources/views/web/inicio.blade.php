@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<main>
    <!-- Banner Principal -->
    <section id="carouselExampleIndicators" class="carousel slide banner-principal container">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="banner-contenido p-5">
                    <div class="banner-imagen"></div>
                    <div class="banner-descripcion">
                        <p>En libros seleccionados</p>
                        <h1 class="banner-descuento">50%</h1>
                    </div>
                    <div class="promo-button">
                        <p class="banner-promo">¡Tu próxima aventura te espera! </p>
                        <button class="btn-general">Ver Ofertas</button>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/ImagenAnuncioEj.png') }}" class="d-block w-100 rounded" alt="Ejemplo de anuncio">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>

    <!-- Panel con Imagen y Contenido -->
    <div class="container my-5">
        <section class="panel-imagen-contenido m-0">
            <div class="panel-imagen"></div>
            <div class="panel-texto">
                <h2>1º Libro</h2>
                <p class="subtitulo">El Principito</p>
                <p class="descripcion">Descubre la historia del pequeño príncipe que vivía en un asteroide.</p>
                <p class="texto-completo">Una obra maestra de la literatura universal que nos enseña el valor de la amistad y la importancia de ver con el corazón.</p>
            </div>
        </section>
    </div>

    <!-- Navegación de Géneros con Inputs -->
    <div class="container mt-5">
        <form class="carrusel-puntos d-flex align-items-center justify-content-center gap-4">
            <div class="form-check p-0 m-0 d-flex align-items-center">
                <input class="form-check-input d-none" type="radio" name="generoPref" id="genGeneral" checked>
                <label class="form-check-label d-flex align-items-center cursor-pointer" for="genGeneral">
                    <span class="punto me-2"></span> <span class="fw-bold" style="color:var(--color-header)">General</span>
                </label>
            </div>
            <div class="form-check p-0 m-0 d-flex align-items-center">
                <input class="form-check-input d-none" type="radio" name="generoPref" id="genMiedo">
                <label class="form-check-label d-flex align-items-center cursor-pointer" for="genMiedo">
                    <span class="punto me-2"></span> <span class="text-muted">Miedo</span>
                </label>
            </div>
            <div class="form-check p-0 m-0 d-flex align-items-center">
                <input class="form-check-input d-none" type="radio" name="generoPref" id="genAccion">
                <label class="form-check-label d-flex align-items-center cursor-pointer" for="genAccion">
                    <span class="punto me-2"></span> <span class="text-muted">Acción</span>
                </label>
            </div>
            <div class="form-check p-0 m-0 d-flex align-items-center">
                <input class="form-check-input d-none" type="radio" name="generoPref" id="genRomance">
                <label class="form-check-label d-flex align-items-center cursor-pointer" for="genRomance">
                    <span class="punto me-2"></span> <span class="text-muted">Romance</span>
                </label>
            </div>
            
            <a href="/generos" class="ms-3"><button type="button" class="btn-siguiente">›</button></a>
        </form>
    </div>

    <!-- Sección de Libros Reales -->
    <div class="container my-5">
        <section class="agrupacion-contenido">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <h2 class="mb-1 text-white">Libros Destacados</h2>
                    <p class="subtitulo text-white opacity-75 mb-0" style="font-size: 0.95rem;">Basado en tu catálogo actual</p>
                </div>
            </div>

            <div class="row g-4">
                @forelse($libros as $libro)
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="tarjeta-item">
                        <div class="tarjeta-imagen">
                            <!-- Placeholder visual -->
                            <div class="d-flex align-items-center justify-content-center h-100 bg-secondary rounded opacity-25">
                                <i class="bi bi-book text-white fs-1"></i>
                            </div>
                        </div>
                        <h3>{{ $libro->titulo }}</h3>
                        <p>{{ Str::limit($libro->descripcion, 100) }}</p>
                        <button class="btn-favorito">❤</button>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-white text-center">No hay libros cargados todavía. Por favor, ejecuta los seeders.</p>
                </div>
                @endforelse
            </div>
        </section>
    </div>
</main>
@endsection
