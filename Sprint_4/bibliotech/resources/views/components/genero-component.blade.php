    @foreach($generos as $genero)
    <a href="{{ route('generos.index', ['id_genero' => $genero->id_genero]) }}" class="text-decoration-none d-flex align-items-center me-3">
        <span class="punto {{ ($generoActivo && $generoActivo->id_genero == $genero->id_genero) ? 'activo' : '' }} mx-2"></span>
        <span class="fs-6 fw-bold {{ ($generoActivo && $generoActivo->id_genero == $genero->id_genero) ? '' : 'text-muted' }}"
            style="{{ ($generoActivo && $generoActivo->id_genero == $genero->id_genero) ? 'color:var(--color-header)' : '' }}">
            {{ $genero->nombre }}
        </span>
    </a>
    @endforeach