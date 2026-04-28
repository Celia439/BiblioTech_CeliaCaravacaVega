@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>{{ $libro->titulo }}</h1>
                </div>
                <div class="card-body">
                    <p><strong>Autor:</strong> {{ $libro->autor }}</p>
                    <p><strong>Editorial:</strong> {{ $libro->editorial }}</p>
                    <p><strong>Año de Publicación:</strong> {{ $libro->anio_publicacion }}</p>
                    <p><strong>Idioma:</strong> {{ $libro->idioma }}</p>
                    <p><strong>Número de Páginas:</strong> {{ $libro->num_paginas }}</p>
                    <p><strong>Descripción:</strong> {{ $libro->descripcion }}</p>
                    <p><strong>Estado:</strong> {{ ucfirst($libro->estado) }}</p>
                    <p><strong>Cantidad Disponible:</strong> {{ $libro->cantidad }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Acciones
                </div>
                <div class="card-body">
                    @if($libro->cantidad > 0)
                        <form action="{{ route('prestamos.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="libro_id" value="{{ $libro->id }}">
                            <button type="submit" class="btn btn-primary btn-block">Pedir Prestado</button>
                        </form>
                    @else
                        <button class="btn btn-secondary btn-block" disabled>No disponible</button>
                    @endif
                    <a href="{{ route('libros.index') }}" class="btn btn-secondary btn-block mt-2">Volver al Catálogo</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
