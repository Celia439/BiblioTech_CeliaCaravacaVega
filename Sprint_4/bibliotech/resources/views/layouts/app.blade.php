<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioTech - @yield('title', 'Inicio')</title>
    <!--Icono de la web-->
    <link rel="icon" href="{{ asset('img/LogoBiblioteca.svg') }}">

    <!--Estilos css-->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/WebBiblioTech.css') }}">

    <!--css Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Cabecera -->
    <header class="bg-prymary">
        <div class="container">
            <nav class="menu-principal border-0">
                <!-- Izquierda: Logo -->
                <a href="/"><img class="logo-icon" src="{{ asset('img/LogoBiblioteca.svg') }}"></a>

                <!-- Centro: Enlaces -->
                <div class="d-flex flex-grow-1 justify-content-around gap-4 px-5">
                    <a class="{{ request()->is('/') ? 'seleccionado' : '' }}" href="/">inicio</a>
                    <a class="{{ request()->is('contacto') ? 'seleccionado' : '' }}" href="/contacto">Contactos</a>
                    <a href="/devoluciones">Devoluciones</a>
                    <a href="/prestamos">Prestamos</a>
                    @auth
                        @if(Auth::user()->rol === 'bibliotecario')
                            <a href="/bibliotecario/reservas">Reservas</a>
                        @else
                            <a href="/usuario/reservas/crear">Reservas</a>
                        @endif
                    @else
                        <a href="/login">Reservas</a>
                    @endauth
                </div>

                <!-- Derecha: Botones -->
                <div class="d-flex align-items-center gap-3">
                    <button class="iconos-header"><img src="{{ asset('img/lupa.svg') }}" /></button>
                    <button class="iconos-header"><img src="{{ asset('img/notificacion.svg') }}" /></button>
                    <button class="iconos-header"><img src="{{ asset('img/lista.svg') }}" /></button>
                    
                    @auth
                    {{-- Usuario logueado: botón con avatar --}}
                    <a href="/usuario/cuenta" class="btn-general d-flex align-items-center gap-2 py-1 pe-3 ps-1 text-decoration-none">
                        <div class="avatar-header">
                            <img src="{{ asset('img/user_avatar_placeholder.png') }}" alt="Avatar" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                        </div>
                        <span class="text-white">Mi cuenta</span>
                    </a>
                    @else
                    {{-- Sin sesión --}}
                    <a href="/login" class="btn-general text-decoration-none text-white">Login</a>
                    @endauth
                </div>
            </nav>
        </div>

        <hr class="opacity-10 m-0">

        <!-- Pestañas -->
        <div class="container">
            <div class="pestanas bg-prymary">
                <div class="pestana">Recientes</div>
                <div class="pestana">Los número 1</div>
                <div class="pestana">Categorias</div>
                <div class="pestana">Recursos Académicos</div>
                <div class="pestana">Editoriales</div>
            </div>
        </div>
    </header>

    <!-- CONTENIDO -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="footer-contenido">
            <div class="footer-columna">
                <h3 class="text-uppercase fw-bold">TITULO</h3>
                <p>Un espacio sagrado donde las palabras susurran paz y cada momento es una invitación a la serenidad.</p>
                <div class="footer-logo">
                    <!-- Izquierda: Logo -->
                    <a href="/"><img class="logo-icon" src="{{ asset('img/LogoBiblioteca.svg') }}"></a> 
                </div>
            </div>

            <div class="footer-columna">
                <h4 class="fw-bold mb-4">NAVIGACIÓN</h4>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-white-50 text-decoration-none">Inicio</a></li>
                    <li><a href="/generos" class="text-white-50 text-decoration-none">Géneros</a></li>
                    <li><a href="/contacto" class="text-white-50 text-decoration-none">Contactos</a></li>
                </ul>
            </div>

            <div class="footer-columna">
                <h4 class="fw-bold mb-4">CUENTA</h4>
                <ul class="list-unstyled">
                    <li><a href="/login" class="text-white-50 text-decoration-none">Login</a></li>
                    <li><a href="/usuario/cuenta" class="text-white-50 text-decoration-none">Mi Cuenta</a></li>
                </ul>
            </div>

            <div class="footer-columna">
                <h4 class="fw-bold mb-4">AYUDA</h4>
                <ul class="list-unstyled">
                    <li><a href="/prestamos" class="text-white-50 text-decoration-none">Préstamos</a></li>
                    <li><a href="/ devolucion" class="text-white-50 text-decoration-none">Devoluciones</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <!--JS Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>