@extends('layouts.admin')

@section('title', 'Datos de Empresa')

@section('content')
<div class="contenido-principal">
    <div class="card-biblioteca" style="max-width: 800px;">
        <div class="card-titulo" style="font-size: 1.1rem; margin-bottom: 1.2rem;">
            <i class="bi bi-building label-icon"></i> Configuración de la Empresa
        </div>

        <form action="#" method="POST">
            @csrf
            <div class="row g-3">
                <!-- Nombre -->
                <div class="col-md-6">
                    <label class="form-label fw-bold small text-muted">
                        <i class="bi bi-building"></i> Nombre de la Entidad
                    </label>
                    <input type="text" class="form-control" value="BiblioTech" required>
                </div>

                <!-- Teléfono -->
                <div class="col-md-6">
                    <label class="form-label fw-bold small text-muted">
                        <i class="bi bi-telephone"></i> Teléfono de Contacto
                    </label>
                    <input type="tel" class="form-control" value="+34 951 123 456">
                </div>

                <!-- Correo Electrónico -->
                <div class="col-md-6">
                    <label class="form-label fw-bold small text-muted">
                        <i class="bi bi-envelope"></i> Correo Electrónico
                    </label>
                    <input type="email" class="form-control" value="info@bibliotech.es">
                </div>

                <!-- Dirección -->
                <div class="col-md-6">
                    <label class="form-label fw-bold small text-muted">
                        <i class="bi bi-geo-alt"></i> Dirección Física
                    </label>
                    <input type="text" class="form-control" value="Málaga, España">
                </div>

                <!-- Logo (área de subida) -->
                <div class="col-md-12">
                    <label class="form-label fw-bold small text-muted">
                        <i class="bi bi-image"></i> Logo de la Biblioteca
                    </label>
                    <div class="area-logo border rounded p-5 text-center bg-light" style="border-style: dashed !important;">
                        <img src="{{ asset('img/LogoBiblioteca.svg') }}" alt="Logo" style="height: 60px;" class="mb-2 opacity-50">
                        <div class="text-muted small">Haz clic para cambiar el logo o arrastra una imagen</div>
                    </div>
                </div>
            </div>

            <!-- Botón Actualizar -->
            <div class="mt-4">
                <button type="submit" class="btn btn-naranja px-4 font-weight-bold">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>
@endsection
