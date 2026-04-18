<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioTech - @yield('title', 'Tu Biblioteca Digital')</title>
    
    <!-- Fuentes (Google Fonts) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;600;700&family=Outfit:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (Vía Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: #f8fafc;
        }
        .header-bg {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        }
        .accent-gold {
            color: #d4af37;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <!-- HEADER: Este es el bloque que se repite -->
    <header class="header-bg text-white shadow-lg">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center shadow-inner">
                    <span class="text-2xl font-bold">B</span>
                </div>
                <span class="text-2xl font-bold tracking-tight">Biblio<span class="accent-gold">Tech</span></span>
            </div>

            <!-- Menú Principal -->
            <ul class="hidden md:flex space-x-8 font-medium">
                <li><a href="/" class="hover:text-blue-400 transition">Inicio</a></li>
                <li><a href="/generos" class="hover:text-blue-400 transition">Explorar</a></li>
                <li><a href="#" class="hover:text-blue-400 transition">Préstamos</a></li>
                <li><a href="#" class="hover:text-blue-400 transition">Devoluciones</a></li>
            </ul>

            <!-- Acciones de Usuario -->
            <div class="flex items-center space-x-4">
                @if(request()->is('usuario*'))
                    <a href="/usuario/cuenta" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-full text-sm font-semibold transition shadow-md">
                        Mi Cuenta
                    </a>
                @else
                    <a href="/login" class="text-sm font-medium hover:text-blue-400 transition">Entrar</a>
                    <a href="/registro" class="bg-white text-slate-900 px-4 py-2 rounded-full text-sm font-bold hover:bg-slate-200 transition shadow-md">
                        Unirse
                    </a>
                @endif
            </div>
        </nav>
    </header>

    <!-- CONTENIDO: Aquí es donde cada página mete su código -->
    <main class="flex-grow container mx-auto px-6 py-10">
        @yield('content')
    </main>

    <!-- FOOTER: El otro bloque que se repite -->
    <footer class="bg-slate-900 text-slate-400 py-12">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12">
            <div>
                <h3 class="text-white text-lg font-bold mb-4">BiblioTech</h3>
                <p class="text-sm">Tu espacio digital para el conocimiento y la lectura. Gestiona tus préstamos y reservas de forma fácil.</p>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-4">Enlaces Rápidos</h4>
                <ul class="text-sm space-y-2">
                    <li><a href="#" class="hover:text-white transition">Política de Privacidad</a></li>
                    <li><a href="#" class="hover:text-white transition">Términos de Uso</a></li>
                    <li><a href="#" class="hover:text-white transition">Contacto</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-semibold mb-4">Contacto</h4>
                <p class="text-sm">Calle de la Lectura, 42<br>28080 Madrid, España<br>info@bibliotech.es</p>
            </div>
        </div>
        <div class="container mx-auto px-6 mt-12 pt-8 border-t border-slate-800 text-center text-xs">
            &copy; {{ date('Y') }} Celia Caravaca - BiblioTech Project. Sprint 4.
        </div>
    </footer>

</body>
</html>
