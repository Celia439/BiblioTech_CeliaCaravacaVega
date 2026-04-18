@extends('layouts.app')

@section('title', 'Mi Cuenta | BiblioTech')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100">
        <!-- Cabecera del Perfil -->
        <div class="header-bg h-32 relative">
            <div class="absolute -bottom-12 left-10">
                <div class="w-24 h-24 bg-blue-500 rounded-2xl border-4 border-white shadow-lg flex items-center justify-center text-white text-3xl font-bold">
                    UN
                </div>
            </div>
        </div>

        <div class="pt-16 pb-10 px-10">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900">Usuario de Prueba</h1>
                    <p class="text-slate-500 font-medium">Socio #12345 · Miembro desde Abril 2026</p>
                </div>
                <div class="flex space-x-3">
                    <button class="px-6 py-2 bg-slate-100 text-slate-700 rounded-xl font-bold hover:bg-slate-200 transition">Editar Perfil</button>
                    <button class="px-6 py-2 bg-red-50 text-red-600 rounded-xl font-bold hover:bg-red-100 transition">Cerrar Sesión</button>
                </div>
            </div>

            <!-- Navegación de Pestañas (Tal como pediste) -->
            <div class="mt-12 flex space-x-8 border-b border-slate-100 overflow-x-auto pb-1">
                <a href="/usuario/cuenta" class="text-blue-600 border-b-2 border-blue-600 pb-4 font-bold whitespace-nowrap">Resumen</a>
                <a href="/usuario/prestamos" class="text-slate-500 hover:text-slate-800 pb-4 font-semibold whitespace-nowrap transition">Mis Préstamos</a>
                <a href="/usuario/reservas" class="text-slate-500 hover:text-slate-800 pb-4 font-semibold whitespace-nowrap transition">Mis Reservas</a>
                <a href="/usuario/favoritos" class="text-slate-500 hover:text-slate-800 pb-4 font-semibold whitespace-nowrap transition">Mis Favoritos</a>
                <a href="/usuario/multas" class="text-slate-500 hover:text-slate-800 pb-4 font-semibold whitespace-nowrap transition">Multas</a>
            </div>

            <!-- Contenido de la pestaña -->
            <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-slate-50 p-6 rounded-2xl">
                    <h3 class="font-bold text-slate-800 mb-2 text-lg">Próximas Devoluciones</h3>
                    <p class="text-slate-600 text-sm">No tienes préstamos activos que venzan pronto.</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-2xl">
                    <h3 class="font-bold text-blue-800 mb-2 text-lg">Resumen de Actividad</h3>
                    <ul class="text-blue-700 text-sm space-y-2 font-medium">
                        <li>• 0 Libros en préstamo</li>
                        <li>• 0 Reservas activas</li>
                        <li>• Sanciones: Ninguna</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection