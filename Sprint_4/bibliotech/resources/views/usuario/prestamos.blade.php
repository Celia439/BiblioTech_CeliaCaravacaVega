@extends('layouts.app')

@section('title', 'Mis Préstamos')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Mis Préstamos</h1>

    @if($prestamos->isEmpty())
    <div class="alert alert-info">
        No tienes libros prestados actualmente.
    </div>
    @else
    <div class="row">
        @foreach($prestamos as $prestamo)
        @php
        $libro = $prestamo->libro;
        @endphp
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $libro->portada) }}" class="card-img-top" alt="{{ $libro->titulo }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $libro->titulo }}</h5>
                    <p class="card-text"><strong>Autor:</strong> {{ $libro->autor }}</p>
                    <p class="card-text"><strong>Fecha Préstamo:</strong> {{ $prestamo->fecha_prestamo }}</p>
                    <p class="card-text"><strong>Fecha Devolución:</strong> {{ $prestamo->fecha_devolucion }}</p>
                    <p class="card-text">
                        <strong>Estado:</strong>
                        @if($prestamo->estado === 'activo')
                        <span class="badge bg-warning">Activo</span>
                        @else
                        <span class="badge bg-success">Devuelto</span>
                        @endif
                    </p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('libros.show', $libro->id) }}" class="btn btn-primary btn-sm">Ver detalles</a>
                    @if($prestamo->estado === 'activo')
                        <button class="btn btn-success btn-sm" disabled>Devolver</button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection