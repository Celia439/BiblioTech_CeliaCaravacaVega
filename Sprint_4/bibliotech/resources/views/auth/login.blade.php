<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BiblioTech</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/componets.css') }}">
    <link rel="stylesheet" href="{{ asset('css/WebBiblioTech.css') }}">
</head>

<body class="bg-light">

    <main class="container-fluid p-0 vh-100 d-flex flex-column flex-md-row">

        <!-- Lado Izquierdo: Imagen -->
        <div class="col-12 col-md-6 d-none d-md-block" style="background: url({{ asset('img/loginIMG.png') }}) center/cover no-repeat;">
        </div>

        <!-- Lado Derecho: Formulario -->
        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center bg-white position-relative">

            <!-- Botón volver -->
            <a href="/" class="position-absolute top-0 start-0 m-4 text-dark fs-4">
                <i class="bi bi-chevron-left"></i>
            </a>

            <!-- Contenedor del form -->
            <div class="agrupacion-contenido w-75 p-5 shadow-lg">
                <h2 class="text-white mb-4 fw-bold">Entrar en BiblioTech</h2>

                @if(session('error'))
                <div class="alert alert-danger py-2 mb-4" style="font-size: 0.9rem;">
                    {{ session('error') }}
                </div>
                @endif

                <form action="{{ url('/login') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label text-white">Correo Electrónico</label>
                        <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" placeholder="ejemplo@correo.com" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback text-warning">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label text-white">Contraseña</label>
                        <input type="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" placeholder="********" required>
                        @error('password')
                            <div class="invalid-feedback text-warning">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-naranja btn-lg">Acceder</button>
                    </div>

                    <div class="text-center">
                        <a href="#" class="text-white-50 text-decoration-none">¿Has olvidado tu contraseña?</a>
                    </div>

                </form>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>