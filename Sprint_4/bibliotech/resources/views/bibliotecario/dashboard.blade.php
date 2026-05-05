@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- Contenido principal -->
<div class="contenido-principal">
    <div class="row g-4">

        <!-- Resumen Dashboard -->
        <div class="col-lg-5">
            <div class="card-biblioteca">
                <div class="text-center mb-3">
                    <h5 class="card-titulo" style="font-size: 1.15rem;">Resumen General</h5>
                </div>

                <!-- Libros -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span style="font-weight: 600; font-size: 0.92rem;">Libros: <strong>{{ $stats['libros'] }}</strong></span>
                    </div>
                    <div class="progress" style="height: 10px; background-color: #e9ecef;">
                        <!-- Calculamos un ancho proporcional (máximo 100) -->
                        <div class="progress-bar bg-success" style="width: {{ min($stats['libros'] * 1, 100) }}%;"></div>
                    </div>
                </div>

                <!-- Usuarios -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span style="font-weight: 600; font-size: 0.92rem;">Usuarios: <strong>{{ $stats['usuarios'] }}</strong></span>
                    </div>
                    <div class="progress" style="height: 10px; background-color: #e9ecef;">
                        <div class="progress-bar bg-info" style="width: {{ min($stats['usuarios'] * 5, 100) }}%;"></div>
                    </div>
                </div>

                <!-- Reservas -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span style="font-weight: 600; font-size: 0.92rem;">Reservas: <strong>{{ $stats['reservas'] }}</strong></span>
                    </div>
                    <div class="progress" style="height: 10px; background-color: #e9ecef;">
                        <div class="progress-bar bg-warning" style="width: {{ min($stats['reservas'] * 5, 100) }}%;"></div>
                    </div>
                </div>

                <!-- Préstamos -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span style="font-weight: 600; font-size: 0.92rem;">Préstamos: <strong>{{ $stats['prestamos'] }}</strong></span>
                    </div>
                    <div class="progress" style="height: 10px; background-color: #e9ecef;">
                        <div class="progress-bar" style="background-color: #008188; width: {{ min($stats['prestamos'] * 4, 100) }}%;"></div>
                    </div>
                </div>

                <!-- Multas -->
                <div class="mb-2">
                    <div class="d-flex justify-content-between mb-1">
                        <span style="font-weight: 600; font-size: 0.92rem;">Multas: <strong>{{ $stats['multas'] }}</strong></span>
                    </div>
                    <div class="progress" style="height: 10px; background-color: #e9ecef;">
                        <div class="progress-bar bg-danger" style="width: {{ min($stats['multas'] * 10, 100) }}%;"></div>
                    </div>
                </div>
            </div>


        </div>

        <!-- Accesos rápidos -->
        <div class="col-lg-7">
            <div class="card-biblioteca">
                <div class="card-titulo mb-4">Accesos Rápidos</div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <a href="/bibliotecario/usuarios" class="btn btn-outline-primary w-100 py-3 text-start d-flex align-items-center">
                            <i class="bi bi-people fs-4 me-3"></i> Gestión de Usuarios
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="/bibliotecario/libros" class="btn btn-outline-primary w-100 py-3 text-start d-flex align-items-center">
                            <i class="bi bi-book fs-4 me-3"></i> Catálogo de Libros
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="/bibliotecario/prestamos" class="btn btn-outline-primary w-100 py-3 text-start d-flex align-items-center">
                            <i class="bi bi-plus-lg fs-4 me-3"></i> Nuevo Préstamo
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="/bibliotecario/reservas" class="btn btn-outline-primary w-100 py-3 text-start d-flex align-items-center">
                            <i class="bi bi-calendar fs-4 me-3"></i> Control de Reservas
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="/bibliotecario/multas" class="btn btn-outline-primary w-100 py-3 text-start d-flex align-items-center">
                            <i class="bi bi-clock fs-4 me-3"></i> Fines y Sanciones
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="/bibliotecario/empresa" class="btn btn-outline-primary w-100 py-3 text-start d-flex align-items-center">
                            <i class="bi bi-building fs-4 me-3"></i> Datos de Empresa
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-biblioteca mt-4">
                <div class="card-titulo mb-3">Última actividad</div>
                <p class="text-muted small mb-0">Sistema actualizado correctamente. Todos los servicios operativos.</p>
            </div>
        </div>
    </div>
</div>
@endsection