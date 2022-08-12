<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>H.Diaz | Iniciar Sesion</title>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <main class="container-fluid p-0 vh-100">
        <div class="row w-100 h-100 justify-content-center align-items-center">
            <div class="col-12 col-lg-6 col-xl-4">
                @include('layouts.alerts')
                <form action="{{ route('authenticate') }}" class="h-75 rounded shadow-lg p-5 fs-5" method="POST">
                    @csrf
                    @method('POST')
                    <h1 class="text-center text-primary fw-bold border-bottom border-3 border-primary pb-3">Iniciar Sesion</h1>

                    <div class="form-group my-3">
                        <label for="email" class="fs-4 fw-bold text-secondary">Correo</label>
                        <input type="text" name="email" id="email" class="form-control form-control-lg p-3" required>
                    </div>

                    <div class="form-group my-3">
                        <label for="password" class="fs-4 fw-bold text-secondary">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg p-3" required>
                    </div>

                    <div class="form-group my-3">
                        <div class="g-recaptcha" data-sitekey="6Lc4OgkgAAAAAB_rKDq7zRMGtdjhjbkL_sF0SNiS"></div>
                    </div>

                    <a href="{{ route('password.request')}}">¿Olvidaste tu contraseña?</a>

                    <div class="d-flex justify-content-between mt-3">
                        <input type="submit" class="btn btn-primary d-block px-3 py-1 fs-3 fw-bold" value="Iniciar Sesion">
                        <a href="{{ route('index') }}" class="text-decoration-none text-secondary fst-itallic fs-4">Regresar</a>
                    </div>
                </form>
            </div>
        </div>

    </main>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
