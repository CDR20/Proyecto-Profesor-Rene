@extends('layouts.app')

@section('title', 'ventas')

@section('content')
    <div class="container vh-100">
        <div class="row w-100 h-100 align-items-center justify-content-center">
            <div class="col-12 col-lg-6 text-center">
                <img src="{{ asset('img/succcess-action.png') }}" alt="success-action" class="img-fluid w-75">
                <h1 class="text-primario fw-bold fs-1">Venta Realizada Con Éxito</h1>
                <a href="{{ route('sales.index') }}" class="btn fw-bold fs-5 p-2 btn-outline-primary my-2">Regresar</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        localStorage.setItem('products', JSON.stringify([]));
    </script>
@endsection
