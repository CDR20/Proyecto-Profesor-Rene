@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')

    <div class="row mt-3 w-100 align-items-center justify-content-center">

        <div class="col-12">
            <h1 class="text-center fs-4 p-2 rounded bg-warning text-dark fw-bold w-50 mx-auto">Catalogo de Proveedores</h1>
        </div>

        <div class="col-12 text-center mb-4">
            <a href="{{ route('providers.create') }}" class="btn btn-primary text-white fw-bold fs-5 py-2">
                Crear Nuevo Proveedor
            </a>
        </div>

        <div class="col-12 col-md-3 text-center">
            <a href="{{ route('providers.export') }}" target="_blank" class="btn btn-success text-white fw-bold fs-5 py-2">
                Exportar a Excel
            </a>
        </div>

        @include('layouts.alerts')

        @forelse ($providers as $provider)
            <div class="col-11 col-md-5 col-lg-3 m-2">
                <a href="{{ route('providers.edit', $provider) }}" class="card rounded shadow-lg pt-5 card-linked">
                    <h3 class="card-title fs-3 text-primary text-center fw-bold">{{ $provider->name }}</h3>
                    <div class="card-body">
                        <p class="text-center fs-6 text-black">{{ $provider->address }}</p>
                        <p class="text-center fs-5 fw-bold">{{ $provider->cellphone }}</p>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12">
                <h6>Aún no hay clientes en Existencia</h6>
            </div>
        @endforelse

        <div class="col-12 text-center mt-5">
            {{ $providers->links() }}
        </div>
    </div>
@endsection
