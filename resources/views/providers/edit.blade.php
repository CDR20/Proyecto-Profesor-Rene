@extends('layouts.app')

@section('title', "Editar - $provider->name")

@section('content')
<div class="row w-100 vh-100 justify-content-center align-items-center">
    <div class="col-12 col-md-6 rounded shadow-lg p-5">
        <h2 class="text-white fs-3 fw-bold bg-primary p-3 rounded text-center">Editar Cliente - {{ $provider->name }}</h2>
        <form action="{{ route('providers.update', $provider) }}" class="form mb-3" method="POST">
            @csrf
            @method('PUT')

            <div class="form-floating my-4">
                <input class="form-control form-control-lg fs-4" type="text" style="height: 50px" name="name" id="name" required
                    placeholder="Nombre Completo" value="{{ $provider->name }}">
                <label class="fs-5" for="name">Nombre Completo</label>
            </div>

            <div class="form-floating my-4">
                <input class="form-control form-control-lg fs-4" type="text" style="height: 50px" name="address" id="address"
                    required placeholder="Nombre Completo" value="{{ $provider->address }}">
                <label class="fs-5" for="name">Dirección</label>
            </div>

            <div class="form-floating my-4">
                <input class="form-control form-control-lg fs-4" type="text" style="height: 50px" name="cellphone" id="cellphone"
                    required placeholder="Nombre Completo" value="{{ $provider->cellphone }}"">
                <label class=" fs-5" for="name">No. Telefonico</label>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary text-white fw-bold fs-4 px-3 py-1 mt-2 mx-auto d-block"
                value="Guardar Cliente">
            </div>
        </form>

        <form action="{{ route('providers.destroy', $provider) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger text-white fw-bold fs-4 px-3 py-1 mt-2 mx-auto d-block"
            value="Eliminar Cliente">
        </form>
        <a class="text-end d-block w-100" href="{{ route('providers.index') }}">Regresar</a>
    </div>
</div>
@endsection
