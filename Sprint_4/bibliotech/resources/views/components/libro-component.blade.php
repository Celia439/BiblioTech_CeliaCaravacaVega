@foreach($libros as $libro)

<div class="col-lg-4 col-md-6 mb-3">
    <div class="tarjeta-item">
        <div class="tarjeta-imagen">
            @if($libro->imagen)
            <img src="{{ asset('storage/' . $libro->imagen) }}" alt="{{ $libro->titulo }}" class="img-fluid rounded">
            @endif
        </div>
        <h3>{{ $libro->titulo }}</h3>
        <p class="text-truncate">{{ $libro->descripcion }}</p>
        <div class="d-flex justify-content-evenly align-items-center mt-auto">
            <span class="text-muted small">{{ $libro->autor }}</span>
            <a href="{{ route('libros.show', $libro->id_libro) }}" class="btn btn-sm btn-outline-light">Ver más</a>
        </div>
        <button class="btn-favorito">❤</button>
    </div>
</div>

@endforeach