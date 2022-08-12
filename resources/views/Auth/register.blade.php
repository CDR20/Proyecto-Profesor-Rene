<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>H.Diaz | Registrarme</title>
</head>

<body>
    <div class="container vh-100">
        <div class="row h-100 w-100 justify-content-center align-items-center">
            <div class="col-6 bg-white rounded shadow-lg p-5">
                <form action="{{ route('create.account') }}" method="POST">
                    @csrf
                    @method('POST')

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @include('layouts.alerts')

                    <h1 class="border-bottom b-5 pb-3 border-primary text-primary text-center">Crear Nueva Cuenta</h1>

                    <div class="form-group my-3">
                        <label for="name" class="fs-4 fw-bold text-secondary">Nombre Completo </label>
                        <input class="form-control form-control-lg p-3" type="text" name="name" id="name"
                            value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group my-3">
                        <label for="email" class="fs-4 fw-bold text-secondary">Correo Electronico</label>
                        <input class="form-control form-control-lg p-3" type="text" name="email" id="email"
                            value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group my-3">
                        <label for="password" class="fs-4 fw-bold text-secondary">Contraseña</label>
                        <input class="form-control form-control-lg p-3" type="password" name="password" id="password"
                            value="{{ old('password') }}" required>
                    </div>

                    <div class="form-group my-3">
                        <label for="confirmPassword" class="fs-4 fw-bold text-secondary">Confirmar Contraseña</label>
                        <input class="form-control form-control-lg p-3" type="password" name="confirmPassword"
                            id="confirmPassword" value="{{ old('confirmPassword') }}" required>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <button type="submit" class="btn btn-primary btn-lg fs-4">Crear Cuenta</button>
                        <a href="{{ route('index') }}"
                            class="text-decoration-none text-secondary fst-itallic fs-4">Regresar</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
