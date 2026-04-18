@extends('layouts.app')

@section('title', 'Bienvenido a BiblioTech')

@section('content')
<div class="space-y-16">
    <!-- Hero Section -->
    <section class="flex flex-col md:flex-row items-center justify-between gap-12 py-10">
        <div class="md:w-1/2 space-y-6">
            <h1 class="text-5xl md:text-6xl font-bold text-slate-900 leading-tight">
                El futuro de la <span class="text-blue-600">lectura</span> está aquí.
            </h1>
            <p class="text-lg text-slate-600 leading-relaxed">
                Explora miles de títulos, gestiona tus préstamos y mantente al día con las últimas novedades de nuestra biblioteca digital. Todo en un solo lugar.
            </p>
            <div class="flex space-x-4">
                <a href="/generos" class="bg-blue-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                    Explorar Catálogo
                </a>
                <a href="/login" class="bg-white border-2 border-slate-200 text-slate-700 px-8 py-4 rounded-xl font-bold hover:bg-slate-50 transition">
                    Saber más
                </a>
            </div>
        </div>
        <div class="md:w-1/2">
            <!-- Representación visual (Placeholder de imagen con estilo) -->
            <div class="w-full h-80 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-3xl shadow-2xl flex items-center justify-center text-white transform rotate-3 hover:rotate-0 transition duration-500">
                <div class="text-center">
                    <svg class="w-24 h-24 mx-auto mb-4 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <p class="text-xl font-semibold">BiblioTech Library</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Características -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition">
            <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-lg flex items-center justify-center mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-xl font-bold mb-3">Reservas 24/7</h3>
            <p class="text-slate-600 text-sm">Reserva tus libros favoritos desde cualquier lugar y en cualquier momento.</p>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition">
            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-xl font-bold mb-3">Sin Multas Sorpresa</h3>
            <p class="text-slate-600 text-sm">Recibe notificaciones automáticas antes de que venza tu préstamo.</p>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition">
            <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center mb-6">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path></svg>
            </div>
            <h3 class="text-xl font-bold mb-3">Favoritos</h3>
            <p class="text-slate-600 text-sm">Guarda los libros que quieres leer después en tu lista personalizada.</p>
        </div>
    </section>
</div>
@endsection
