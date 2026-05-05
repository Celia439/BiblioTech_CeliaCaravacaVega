@extends('layouts.app')

@section('title', $libro->titulo)

@section('content')
<div class="libro-main-wrapper">
    <!-- Sección Hero: Información Principal -->
    <section class="libro-hero">
        <div class="libro-portada">
             <img src="{{ asset('img/LogoBiblioteca.svg') }}" style="width: 50%; opacity: 0.15;">
        </div>
        <article class="libro-info">
            <h1>{{ $libro->titulo }}</h1>
            <p class="autor">Por {{ $libro->autor }}</p>
            <p class="descripcion">
                {{ $libro->descripcion }}
            </p>
            
            <div class="d-flex gap-3 align-items-center">
                @if($libro->cantidad > 0)
                    <form action="{{ route('prestamos.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_ejemplar" value="{{ $libro->ejemplares->first()->id_ejemplar ?? '' }}">
                        <button type="submit" class="btn-reserva-premium">Reservar ahora</button>
                    </form>
                @else
                    <button class="btn btn-secondary rounded-pill px-4" disabled>No disponible</button>
                @endif
                <a href="/" class="btn btn-outline-light rounded-pill px-4">Volver al catálogo</a>
            </div>
        </article>
    </section>

    <!-- Sección de Reseñas -->
    <h3 class="section-header text-uppercase">Últimas reseñas</h3>
    <section class="reviews-grid">
        @for($i = 0; $i < 3; $i++)
        <article class="review-card">
            <div class="stars">★★★★★</div>
            <p class="review-body">
                "Este libro es una obra maestra. La narrativa de {{ $libro->autor }} es simplemente cautivadora y te atrapa desde la primera página."
            </p>
            <div class="review-user">
                <div class="user-avatar"></div>
                <div>
                    <div class="fw-bold" style="font-size: 0.85rem;">Reviewer name</div>
                    <div style="font-size: 0.75rem; opacity: 0.6;">Fecha del post</div>
                </div>
            </div>
        </article>
        @endfor
    </section>

    <!-- Sección de Detalles Técnicos -->
    <section class="info-list-card">
        <h3 class="mb-4 text-uppercase fw-bold">Detalles del libro</h3>
        <div class="list-item">
            <h4>Editorial e Idioma</h4>
            <p>Publicado por {{ $libro->editorial }} en {{ $libro->idioma }}.</p>
        </div>
        <div class="list-item">
            <h4>Edición y Formato</h4>
            <p>Año de publicación: {{ $libro->anio_publicacion }}. Contiene {{ $libro->num_paginas }} páginas.</p>
        </div>
        <div class="list-item">
            <h4>Estado en el Catálogo</h4>
            <p>Stock actual: {{ $libro->cantidad }} unidades. Disponibilidad: {{ ucfirst($libro->estado) }}.</p>
        </div>
    </section>

    <!-- Sección de Libros Relacionados -->
    <h3 class="section-header text-uppercase">Libros recomendados</h3>
    <section class="related-grid">
        @foreach($librosRelacionados as $rel)
        <article class="book-thumb">
            <div class="thumb-img d-flex align-items-center justify-content-center">
                <img src="{{ asset('img/LogoBiblioteca.svg') }}" style="width: 30%; opacity: 0.1;">
            </div>
            <a href="{{ route('libros.show', $rel->id_libro) }}" class="thumb-title text-decoration-none">{{ $rel->titulo }}</a>
            <p style="font-size: 0.7rem; color: #666; margin: 5px 0;">{{ $rel->autor }}</p>
            <button class="btn-favorito" style="color: var(--color-btn-primario)">♥</button>
        </article>
        @endforeach
    </section>
</div>
@endsection
