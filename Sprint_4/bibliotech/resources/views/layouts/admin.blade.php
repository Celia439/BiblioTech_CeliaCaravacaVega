<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioTech Admin - @yield('title', 'Panel de Gestión')</title>
    
    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
        }
        .admin-sidebar {
            background-color: #0f172a;
        }
    </style>
</head>
<body class="bg-gray-100 flex h-screen overflow-hidden">

    <!-- SIDEBAR: Navegación del Bibliotecario -->
    <aside class="admin-sidebar text-slate-300 w-64 flex-shrink-0 flex flex-col shadow-xl">
        <div class="p-6 flex items-center space-x-3 text-white border-b border-slate-800">
            <div class="w-8 h-8 bg-amber-500 rounded flex items-center justify-center font-bold text-slate-900">A</div>
            <span class="text-xl font-bold tracking-tight">Admin<span class="text-amber-500">Tech</span></span>
        </div>
        
        <nav class="flex-grow py-6 overflow-y-auto">
            <div class="px-6 mb-2 text-xs font-semibold text-slate-500 uppercase tracking-wider">Gestión</div>
            <ul class="space-y-1">
                <li><a href="/bibliotecario/libros" class="flex items-center px-6 py-3 hover:bg-slate-800 hover:text-white transition">Libros</a></li>
                <li><a href="/bibliotecario/usuarios" class="flex items-center px-6 py-3 hover:bg-slate-800 hover:text-white transition">Usuarios</a></li>
                <li><a href="/bibliotecario/prestamos" class="flex items-center px-6 py-3 hover:bg-slate-800 hover:text-white transition">Préstamos Aktivos</a></li>
                <li><a href="/bibliotecario/reservas" class="flex items-center px-6 py-3 hover:bg-slate-800 hover:text-white transition">Reservas</a></li>
                <li><a href="/bibliotecario/multas" class="flex items-center px-6 py-3 hover:bg-slate-800 hover:text-white transition text-amber-500">Multas/Sanciones</a></li>
            </ul>

            <div class="px-6 mt-8 mb-2 text-xs font-semibold text-slate-500 uppercase tracking-wider">Configuración</div>
            <ul class="space-y-1">
                <li><a href="#" class="flex items-center px-6 py-3 hover:bg-slate-800 hover:text-white transition">Mi Biblioteca</a></li>
                <li><a href="/" class="flex items-center px-6 py-3 hover:bg-slate-800 hover:text-white transition text-blue-400">Ver Web Pública</a></li>
            </ul>
        </nav>

        <div class="p-4 border-t border-slate-800 bg-slate-900/50">
            <div class="text-sm font-medium text-white">Bibliotecario</div>
            <div class="text-xs text-slate-500">Sesión iniciada</div>
        </div>
    </aside>

    <!-- CONTENT AREA -->
    <main class="flex-grow flex flex-col min-w-0 overflow-hidden">
        <!-- Top Header for Admin -->
        <header class="bg-white border-b border-gray-200 h-16 flex items-center justify-between px-8 flex-shrink-0">
            <h1 class="text-xl font-semibold text-gray-800">@yield('header_title', 'Dashboard')</h1>
            <div class="flex items-center space-x-4">
                <button class="text-gray-500 hover:text-gray-700">Notificaciones</button>
                <div class="w-8 h-8 rounded-full bg-slate-200"></div>
            </div>
        </header>

        <!-- Main Content Scrollable -->
        <section class="flex-grow overflow-y-auto p-8">
            <div class="max-w-6xl mx-auto">
                @yield('content')
            </div>
        </section>
    </main>

</body>
</html>
