@extends('layouts.app')

@section('title', 'Editar Operador')

@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12">
                <h3 class="card-title text-center p-2 bg-primario fw-bold text-white my-2">{{ $user->name }}</h3>
            </div>
            <div class="col-12 col-md-8 col-lg-6">
                <form action="{{ route('users.update', $user) }}" class="bg-light shadow-lg rounded p-5" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" class="text-center d-block fw-bold fs-4 mb-2">Nombre</label>
                        <input type="text" name="name" class="form-control fs-3 p-2" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-center d-block fw-bold fs-4 mb-2">email</label>
                        <input type="text" name="email" class="form-control fs-3 p-2" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="text-center d-block fw-bold fs-4 mb-2">Rol</label>
                        <select name="role" id="" class="form-select p-4 fs-3">
                            <option value="{{ $user->role }}" selected disabled>{{ ucfirst(strToLower($user->role)) }}</option>
                            <option value="ADMIN">Admin</option>
                            <option value="EMPLEADO">Empleado</option>
                        </select>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary fw-bold p-2 fs-3">Guardar Cabmios</button>
                        <a href="{{ route('users.index') }}" class="d-block btn fw-bold p-2 fs-3">Regresar...</a>
                    </div>
                </form>

                <div class="col-12 text-end">
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger fw-bold p-2 fs-3">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection