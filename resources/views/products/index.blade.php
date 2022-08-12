@extends('layouts.app')

@section('title', 'Productos')

@section('content')

    <div class="container-fluid w-75 border border-2 shadow-lg p-3 mt-5 bg-light">
        <div class="row w-100 align-items-center justify-content-center h-100">
            @include('layouts.alerts')
            <div class="col-12 col-md-6">
                <form action="{{ route('products.index') }}" method="GET">
                    @csrf
                    @method('GET')
                    <input type="text" class="form-control form-control-lg d-inline-block w-75 p-3 h-100" placeholder="Buscar Productos" name="q" id="q">
                    <input type="submit" class="d-inline-block btn btn-secondary h-100 btn-lg" value="Buscar">
                </form>
            </div>

            @if(Auth::user()->role === 'ADMIN')
                <div class="col-12 col-md-3 text-center">
                    <a href="{{ route('products.create') }}" class="btn btn-primary text-white fw-bold fs-5 py-2">
                        Crear Nuevo Producto
                    </a>
                </div>
            @endif

            @if(Auth::user()->role === 'ADMIN')
            <div class="col-12 col-md-3 text-center">
                <a href="{{ route('products.export') }}" target="_blank" class="btn btn-success text-white fw-bold fs-5 py-2">
                    Exportar a Excel
                </a>
            </div>
            @endif

            <div class="row align-items-top justify-content-center mt-3" id="products-list">
                @foreach ($products as $product)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                        <div class="card m-1 shadow-lg p-3 border border-secondary border-1">

                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="mx-auto" width="150px" height="150px">

                            <span class="id d-none">{{ $product->id }}</span>

                            <p class="text-center fs-5 fw-bold mb-0 name">{{ $product->name }}</p>

                            <p class="text-secondary fs-6 fw-bold text-center code">{{ $product->code }}</p>

                            <div class="d-flex align-items-center justify-content-around">
                                @if(Auth::user()->role === 'ADMIN')
                                    <span class="text-center text-primary fs-4 w-auto mx-auto align-middle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-up" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z"/>
                                            <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                        </svg>
                                        ${{ $product->provider_price }}
                                    </span>
                                @endif
                                <span class="text-center text-primary fw-bold fs-4 w-auto mx-auto align-middle">
                                    <span class="price">
                                        ${{ $product->shop_price }}
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                                    </svg>
                                </span>
                            </div>

                            @if($product->stock === 0)
                                <p class="text-center text-danger fs-5 fw-bold">AGOTADO</p>
                            @else
                                <p class="text-center text-success fs-5 fw-bold stock">{{ $product->stock }} existente(s)</p>
                            @endif

                            @if(Auth::user()->role === 'ADMIN')
                                <h6 class="text-center fs-6 border-bottom border-primary border-3 pb-2 text-uppercase text-secondary fw-bold">Inversor</h6>
                                <p class="fs-5 text-center fw-bold text-primary">
                                    {{ $product->inversor->name }}
                                </p>
                            @endif

                            @if(Auth::user()->role === 'ADMIN')
                            <small class="text-muted fs-6 text-center">Última vez actualizado
                                <span class="fw-bold">
                                    {{ $product->get_update_date }}
                                </span>
                            </small>
                            @endif

                            <div class="d-flex align-items-center justify-content-around py-3">
                                @if(Auth::user()->role === 'ADMIN')
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-lg fs-5 text-center p-2" title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-lg fs-5 text-center p-2" title="Eliminar" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                                <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                                @if($product->stock >= 1)
                                    <button class="btn btn-lg fs-5 text-center p-2 agregar-carrito" title="Agregar al Carrito">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill disabled" viewBox="0 0 16 16">
                                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12 text-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
