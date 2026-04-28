@extends('layouts.app')

@section('title', 'Contacto | BiblioTech')

@section('content')
<div class="container-fluid p-0 overflow-hidden" style="min-height: calc(100vh - 150px); background-color: #e2e8e9;">
    <div class="row g-0 h-100">
        <!-- Izquierda: Imagen temática -->
        <div class="col-md-6 d-none d-md-block">
            <div class="h-100" style="background-image: url('https://images.unsplash.com/photo-1520923642038-b4259ace9439?q=80&w=2070&auto=format&fit=crop'); background-size: cover; background-position: center; min-height: 500px;">
                <!-- Overlay si se desea -->
                <div class="w-100 h-100" style="background-color: rgba(0,0,0,0.1);"></div>
            </div>
        </div>

        <!-- Derecha: Formulario -->
        <div class="col-md-6 d-flex align-items-center justify-content-center p-5">
            <div class="position-absolute top-0 start-0 p-4 d-md-none">
                 <a href="javascript:history.back()" class="text-dark fs-3"><i class="bi bi-chevron-left"></i></a>
            </div>
            
            <div class="w-100" style="max-width: 450px;">
                <!-- Flecha atrás (solo visible en escritorio dentro de la columna) -->
                <div class="mb-4 d-none d-md-block">
                    <a href="javascript:history.back()" class="text-dark fs-3"><i class="bi bi-chevron-left"></i></a>
                </div>

                <div class="agrupacion-contenido p-5 rounded-4 shadow-lg">
                    <form action="#" method="GET" onsubmit="return false;">
                        <div class="mb-3">
                            <label class="form-label text-white opacity-75">Name</label>
                            <input type="text" class="form-control bg-white text-dark py-2" placeholder="Value">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-white opacity-75">Surname</label>
                            <input type="text" class="form-control bg-white text-dark py-2" placeholder="Value">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-white opacity-75">Email</label>
                            <input type="email" class="form-control bg-white text-dark py-2" placeholder="Value">
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-white opacity-75">Message</label>
                            <textarea class="form-control bg-white text-dark py-2" rows="4" placeholder="Value"></textarea>
                        </div>

                        <button type="button" class="btn btn-naranja w-100 py-2 fs-5 fw-bold rounded-3 shadow">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Ajustes específicos para que encaje con el diseño de la imagen */
    .agrupacion-contenido {
        background-color: var(--color-tarjeta) !important;
        border: none;
    }
    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(255, 107, 91, 0.25);
        border-color: var(--color-btn-primario);
    }
    .btn-naranja {
        background-color: #ff8b6b !important; /* Tono naranja de la imagen */
        border: none;
        color: white;
    }
</style>
@endsection
