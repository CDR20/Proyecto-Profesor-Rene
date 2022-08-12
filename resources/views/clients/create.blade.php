@extends('layouts.app')

@section('title', "Crear Cliente")

@section('content')
<div class="row w-100 vh-100 justify-content-center align-items-center">
    <div class="col-12 col-md-6 rounded shadow-lg p-5">
        <div class="col-12 bg-primary p-5 text-white">
            <h3 class="text-center">Crear un nuevo cliente para</h3>
            <h4 class="text-center">
                <p class="text-decoration-none ps-5 pt-2 text-white fw-bold fs-2 fst-italic mb-0"> <span class="text-info fst-italic">H</span><span class="text-warning fst-italic">D</span> Hermanos Diaz</p>
            </h4>
        </div>
        <form action="{{ route('clients.store') }}" class="form mb-3" method="POST">
            @csrf
            @method('POST')

            <div class="form-floating my-4">
                <input class="form-control form-control-lg fs-4" type="text" style="height: 50px" name="name" id="name" required placeholder="Nombre Completo">
                <label class="fs-5" for="name">Nombre Completo</label>
            </div>

            <div class="form-floating my-4">
                <input class="form-control form-control-lg fs-4" type="text" style="height: 50px" name="address" id="address" required placeholder="Nombre Completo">
                <label class="fs-5" for="name">Dirección</label>
            </div>

            <div class="form-floating my-4">
                <input class="form-control form-control-lg fs-4" type="text" style="height: 50px" name="cellphone" id="cellphone" required placeholder="Nombre Completo">
                <label class=" fs-5" for="name">No. Telefonico</label>
            </div>

            <input type="submit" class="btn btn-primary text-white fw-bold fs-4 px-3 py-1 mt-2 mx-auto d-block" value="Guardar Cliente">
        </form>
    </div>
</div>
@endsection
