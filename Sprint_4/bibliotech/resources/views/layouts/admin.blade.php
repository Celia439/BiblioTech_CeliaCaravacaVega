<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioTech Admin - @yield('title', 'Gestión')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Estilos del proyecto original -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos-bibliotecario.css') }}">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- JS del Bibliotecario -->
    <script src="{{ asset('js/bibliotecario.js') }}"></script>
</head>

<body>
    <!-- ========== NAVBAR ========== -->
    <nav class="navbar navbar-biblioteca navbar-expand-lg">
        <a class="navbar-brand px-3" href="/bibliotecario/libros">
            <img src="{{ asset('img/LogoBiblioteca.svg') }}" alt="Logo" style="height: 40px;">
        </a>
        <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-3">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('*/prestamos*') ? 'active' : '' }}" href="/bibliotecario/prestamos">
                        <span class="nav-icon">+</span> Préstamos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('*/reservas*') ? 'active' : '' }}" href="/bibliotecario/reservas">
                        <span class="nav-icon"><i class="bi bi-calendar3"></i></span> Reservas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('*/multas*') ? 'active' : '' }}" href="/bibliotecario/multas">
                        <span class="nav-icon"><i class="bi bi-clock"></i></span> Multas
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto align-items-center px-3">
                <li class="nav-item">
                    <button class="btn border-0 text-white fs-4"><i class="bi bi-bell"></i></button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-light ms-2">Login</button>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ========== SIDEBAR + CONTENIDO ========== -->
    <div class="d-flex h-100">

        <!-- Sidebar -->
        <div class="sidebar d-none d-md-block" style="width: 160px; min-height: calc(100vh - 60px); background-color: #fff; border-right: 1px solid #eee; padding-top: 0.8rem; flex-shrink: 0;">
            <a href="/bibliotecario/usuarios" class="d-block px-3 py-2 text-decoration-none {{ request()->is('*/usuarios*') ? 'active-sidebar' : '' }}"
                style="color: #333; font-size: 0.9rem; font-weight: 600; border-left: 3px solid transparent; transition: all 0.2s;">
                Usuarios
            </a>
            <a href="/bibliotecario/libros" class="d-block px-3 py-2 text-decoration-none {{ request()->is('*/libros*') ? 'active-sidebar' : '' }}"
                style="color: #333; font-size: 0.9rem; font-weight: 600; border-left: 3px solid transparent; transition: all 0.2s;">
                Libros
            </a>
            <a href="/bibliotecario/empresa" class="d-block px-3 py-2 text-decoration-none {{ request()->is('*/empresa*') ? 'active-sidebar' : '' }}"
                style="color: #333; font-size: 0.9rem; font-weight: 600; border-left: 3px solid transparent; transition: all 0.2s;">
                Empresa
            </a>
        </div>

        <!-- Contenido principal -->
        <div class="flex-grow-1" style="background-color: #f8fafc; min-height: calc(100vh - 60px);">

            <!-- Barra secundaria de búsqueda -->
            <div class="barra-secundaria p-3 bg-white border-bottom">
                <div class="input-group" style="max-width: 400px;">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control border-start-0" placeholder="Buscar...">
                </div>
            </div>

            <!-- Contenido dinámico -->
            <div class="p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .active-sidebar {
            border-left-color: var(--color-navbar, #008188) !important;
            background-color: #f0f8f8;
        }

        .navbar-biblioteca {
            background-color: #008188;
            /* Color representativo del navbar original */
        }
    </style>
</body>

</html>