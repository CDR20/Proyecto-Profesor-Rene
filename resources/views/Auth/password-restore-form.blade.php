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
                <form action="{{ route('restore.password.finished') }}" class="h-75 rounded shadow-lg p-5 fs-5" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-group my-3">
                        <label for="password">Ingresa tu Nueva Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg" required>
                    </div>

                    <div class="form-group my-3">
                        <label for="confirmpassword">Confirma tu Nueva Contraseña</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" class="form-control form-control-lg" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary d-block px-3 py-1 fs-3 fw-bold mx-auto" value="Actualizar Contraseña">
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
