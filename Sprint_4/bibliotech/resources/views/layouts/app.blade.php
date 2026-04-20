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
            <nav class="menu-principal">
                <!-- Izquierda: Logo -->
                <img class="logo-icon" src="{{ asset('img/LogoBiblioteca.svg') }}">
                
                <!-- Centro: Enlaces (Ocupan el espacio) -->
                <div class="d-flex flex-grow-1 justify-content-around gap-4 px-5">
                    <a class="{{ request()->is('/') ? 'seleccionado' : '' }}" href="/">Inicio</a>
                    <a href="/devoluciones">Devoluciones</a>
                    <a href="/prestamos">Prestamos</a>
                    <a href="/usuario/reservas">Reservas</a>
                    <a href="/generos">Géneros</a>
                </div>

                <!-- Derecha: Botones -->
                <div class="d-flex align-items-center gap-3">
                    <button class="iconos-header"><img src="{{ asset('img/lupa.svg') }}" /></button>
                    <button class="iconos-header"><img src="{{ asset('img/notificacion.svg') }}" /></button>
                    <button class="iconos-header"><img src="{{ asset('img/lista.svg') }}" /></button>
                    <button class="btn-general ms-2"><a href="/login">Login</a></button>
                </div>
            </nav>
        </div>

        <hr>

        <!-- Pestañas -->
        <div class="container">
            <div class="pestanas bg-prymary">
                <div class="pestana">Recientes</div>
                <div class="pestana">Los número 1</div>
                <div class="pestana">Categorias</div>
                <div class="pestana">Recursos Académicos</div>
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
                <h3>BiblioTech</h3>
                <p>Un espacio sagrado donde las palabras encuentran paz y la lectura se convierte en una invitación a la serenidad.</p>
                <div class="footer-logo"><img src="{{ asset('img/LogoBiblioteca.svg') }}" /></div>
            </div>

            <div class="footer-columna">
                <h4>Navegación</h4>
                <ul>
                    <li><a href="/">Inicio</a></li>
                    <li><a href="/generos">Géneros</a></li>
                </ul>
            </div>

            <div class="footer-columna">
                <h4>Cuenta</h4>
                <ul>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/usuario/cuenta">Mi Cuenta</a></li>
                </ul>
            </div>

            <div class="footer-columna">
                <h4>Ayuda</h4>
                <ul>
                    <li><a href="/info-prestamos">Préstamos</a></li>
                    <li><a href="/info-devolucion">Devoluciones</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <!--JS Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>