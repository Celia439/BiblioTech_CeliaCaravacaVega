@extends('layouts.app')

@section('title', 'Mi Cuenta | BiblioTech')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <!-- TARJETA DE PERFIL -->
            <div class="agrupacion-contenido p-4 mb-4 rounded-5" style="background-color: var(--color-tarjeta) !important;">
                <div class="row align-items-center">
                    <!-- Foto y Botón Editar -->
                    <div class="col-md-4 text-center">
                        <div class="mb-3 px-4">
                            <div class="bg-white rounded-5 p-1 shadow-sm mx-auto" style="width: fit-content;">
                                <img src="{{ asset('img/user_avatar_placeholder.png') }}" alt="Perfil" class="rounded-5 w-100" style="max-width: 200px; aspect-ratio: 1/1; object-fit: cover;">
                            </div>
                        </div>
                        <button class="btn-naranja w-75 rounded-pill py-2 shadow-sm d-flex align-items-center justify-content-center gap-2 mx-auto">
                            <span>Editar</span>
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z'/%3E%3Cpath d='m15 5 4 4'/%3E%3C/svg%3E" alt="edit">
                        </button>
                    </div>

                    <!-- Datos del Usuario -->
                    <div class="col-md-8 text-white">
                        <div class="ps-md-4">
                            <p class="mb-2"><strong>Nombre completo:</strong> {{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</p>
                            <p class="mb-2"><strong>Dirección de residencia:</strong> {{ auth()->user()->direccion ?? 'No especificada' }}</p>
                            <p class="mb-2"><strong>TLF:</strong> {{ auth()->user()->telefono ?? 'No especificado' }}</p>
                            <p class="mb-2"><strong>Correo:</strong> {{ auth()->user()->email }}</p>
                            <p class="mb-2"><strong>Fecha de nacimiento:</strong> --/--/----</p>
                            <p class="mb-3"><strong>DNI:</strong> {{ auth()->user()->dni }}</p>
                            
                            <div class="row mt-4 pt-3 border-top border-white border-opacity-25">
                                <div class="col-6">
                                    <small class="d-block opacity-75">Fecha de alta:</small>
                                    <span>{{ auth()->user()->created_at->format('d/m/Y') }}</span>
                                </div>
                                <div class="col-6">
                                    <small class="d-block opacity-75">Fecha de vencimiento del carnet:</small>
                                    <span>--/--/----</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECCIONES DE ACTIVIDAD -->
            
            <!-- Historial de préstamos -->
            <div class="agrupacion-contenido p-4 mb-4 rounded-5" style="background-color: var(--color-bloque-fondo) !important; min-height: 250px; display: flex; flex-direction: column;">
                <h4 class="mb-4">Historial de prestamos:</h4>
                <div class="flex-grow-1 d-flex align-items-center justify-content-center">
                    @if($numPrestamos > 0)
                        <p class="text-white">Tienes <strong>{{ $numPrestamos }}</strong> préstamos en tu historial.</p>
                    @else
                        <p class="opacity-75 text-center">¡Tu historia lectora aún no ha comenzado!</p>
                    @endif
                </div>
                <div class="text-end mt-3">
                    <a  href="/usuario/prestamos" class="btn-naranja rounded-pill px-4">Ver más</a>
                </div>
            </div>

            <!-- Historial de reservas -->
            <div class="agrupacion-contenido p-4 mb-4 rounded-5" style="background-color: var(--color-bloque-fondo) !important; min-height: 250px; display: flex; flex-direction: column;">
                <h4 class="mb-4">Historial de reservas</h4>
                <div class="flex-grow-1 d-flex align-items-center justify-content-center">
                    @if($numReservas > 0)
                        <p class="text-white">Tienes <strong>{{ $numReservas }}</strong> reservas activas o completadas.</p>
                    @else
                        <p class="opacity-75 text-center">No se encontraron reservas activas ni completadas.</p>
                    @endif
                </div>
                <div class="text-end mt-3">
                    <a  href="/usuario/reservas" class="btn-naranja rounded-pill px-4">Ver más</a>
                </div>
            </div>

            <!-- Multas -->
            <div class="agrupacion-contenido p-4 mb-4 rounded-5" style="background-color: var(--color-bloque-fondo) !important; min-height: 250px; display: flex; flex-direction: column;">
                <h4 class="mb-4">Multas</h4>
                <div class="flex-grow-1 d-flex align-items-center justify-content-center text-center text-white">
                    @if($numMultas > 0)
                        <p class="px-5">Actualmente tienes <strong>{{ $numMultas }}</strong> multas pendientes de pago.</p>
                    @else
                        <p class="opacity-75 px-5">¡Felicitaciones! Tu cuenta está en 0,00 €, Eres un ejemplo de puntualidad (o simplemente no has sacado nada aún).</p>
                    @endif
                </div>
                <div class="text-end mt-3">
                    <a href="/usuario/multas" class="btn-naranja rounded-pill px-4">Ver más</a>
                </div>
            </div>

            <!-- Favoritos -->
            <div class="agrupacion-contenido p-4 mb-0 rounded-5" style="background-color: var(--color-bloque-fondo) !important; min-height: 250px; display: flex; flex-direction: column;">
                <div class="d-flex align-items-center gap-2 mb-4">
                    <h4 class="m-0">Favoritos</h4>
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23ff6b5b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z'%3E%3C/svg%3E" alt="heart">
                </div>
                <div class="flex-grow-1 d-flex align-items-center justify-content-center">
                    <p class="opacity-75 text-center">Aún no tienes favoritos</p>
                </div>
                <div class="text-end mt-3">
                    <a href="/usuario/favoritos" class="btn-naranja rounded-pill px-4">Ver más</a>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .rounded-5 {
        border-radius: 2rem !important;
    }
    .agrupacion-contenido h4 {
        font-weight: 700;
        letter-spacing: 0.5px;
    }
    .btn-naranja {
        transition: all 0.3s ease;
        border: none;
    }
    .btn-naranja:hover {
        transform: scale(1.05);
        filter: brightness(1.1);
    }
</style>
@endsection