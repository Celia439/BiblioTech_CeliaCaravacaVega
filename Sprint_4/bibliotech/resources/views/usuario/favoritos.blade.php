@extends('layouts.app')

@section('title', 'Mis Favoritos')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Mis Libros Favoritos</h1>

    @if($favoritos->isEmpty())
    <div class="alert alert-info">
        No tienes libros marcados como favoritos todavía.
    </div>
    @else
    <div class="row">
        @foreach($favoritos as $favorito)
        @php
        $libro = $favorito->libro;
        @endphp
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $libro->portada) }}" class="card-img-top" alt="{{ $libro->titulo }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $libro->titulo }}</h5>
                    <p class="card-text"><strong>Autor:</strong> {{ $libro->autor }}</p>
                    <p class="card-text"><strong>Género:</strong> {{ $libro->genero }}</p>
                    <p class="card-text"><strong>ISBN:</strong> {{ $libro->isbn }}</p>
                    <p class="card-text"><strong>Estado:</strong>
                        @if($libro->estado === 'disponible')
                        <span class="badge bg-success">Disponible</span>
                        @else
                        <span class="badge bg-warning">Prestado</span>
                        @endif
                    </p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('libros.show', $libro->id) }}" class="btn btn-primary btn-sm">Ver detalles</a>
                    <button class="btn btn-danger btn-sm" disabled>Eliminar</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection