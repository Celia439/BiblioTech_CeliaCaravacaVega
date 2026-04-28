@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Multas</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Préstamo ID</th>
                    <th>Importe</th>
                    <th>Estado</th>
                    <th>Fecha Pago</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($multas as $multa)
                    <tr>
                        <td>{{ $multa->id }}</td>
                        <td>{{ $multa->user->name }}</td>
                        <td>{{ $multa->prestamo_id }}</td>
                        <td>{{ $multa->importe }} €</td>
                        <td>
                            @if($multa->estado === 'pendiente')
                                <span class="badge bg-danger">Pendiente</span>
                            @else
                                <span class="badge bg-success">Pagada</span>
                            @endif
                        </td>
                        <td>
                            @if($multa->fecha_pago)
                                {{ $multa->fecha_pago->format('d/m/Y') }}
                            @else
                                - 
                            @endif
                        </td>
                        <td>
                            @if($multa->estado === 'pendiente')
                                <form action="{{ route('multas.pagar', $multa->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Pagar</button>
                                </form>
                            @else
                                <span class="text-success">Pagada</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay multas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
