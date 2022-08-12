<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>H.Diaz | Recuperar Contraseña</title>

</head>
<body>
    <main class="container-fluid p-0 vh-100">
        <div class="row w-100 h-100 justify-content-center align-items-center">
            <div class="col-12 col-lg-6 col-xl-4">
                @include('layouts.alerts')
                <form action="{{ route('password.email') }}" class="h-75 rounded shadow-lg p-5 fs-5" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-group my-3">
                        <label for="email" class="fs-4 fw-bold text-secondary">Ingresa tu Correo Electronico</label>
                        <input type="text" name="email" id="email" class="form-control form-control-lg p-3" required>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <input type="submit" class="btn btn-primary d-block px-3 py-1 fs-3 fw-bold mx-auto" value="Enviar Mail">
                        <a href="{{ route('login') }}" class="text-decoration-none text-secondary fst-itallic fs-4">Regresar</a>
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
