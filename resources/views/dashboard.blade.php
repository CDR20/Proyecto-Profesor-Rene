@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

    <main class="container-fluid">

        <div class="row mt-1 mt-2xl-5 align-items-center justify-content-around" id="index-main-container">

            @include('layouts.alerts')

            <section class="col-12 col-md-4 col-lg-3">
                <div class="row align-items-center justify-content-around">
                    @if(Auth::user()->role === 'ADMIN')
                    <div class="col-12 my-5">
                        <div class="card bg-primary text-white pt-3">
                            <h3 class="card-title fs-4 text-white text-center">Usuarios con Acceso al Sistema</h3>
                            <p class="text-center fs-3 fw-bold">{{ $users }}</p>
                        </div>
                    </div>
                    @endif

                    @if(Auth::user()->role === 'EMPLEADO')
                    <div class="col-8 my-5">
                        <div class="card bg-primary text-white pt-3">
                            <h3 class="card-title fs-4 text-white text-center">Ventas Efectuadas</h3>
                            <p class="text-center fs-3 fw-bold">{{ $my_sales->count() }}</p>
                        </div>
                    </div>
                    @endif

                    <div class="col-8 my-5">
                        <div class="card bg-primary text-white pt-3">
                            <h3 class="card-title fs-4 text-white text-center">Clientes</h3>
                            <p class="text-center fs-3 fw-bold">{{ $clients }}</p>
                        </div>
                    </div>

                    @if(Auth::user()->role === 'ADMIN')
                    <div class="col-8 my-5">
                        <div class="card bg-primary text-white pt-3">
                            <h3 class="card-title fs-4 text-white text-center">Provedores</h3>
                            <p class="text-center fs-3 fw-bold">{{ $providers }}</p>
                        </div>
                    </div>
                    @endif

                    <div class="col-8 my-5">
                        <div class="card bg-primary text-white pt-3">
                            <h3 class="card-title fs-4 text-white text-center">Productos</h3>
                            <p class="text-center fs-3 fw-bold">{{ $products }}</p>
                        </div>
                    </div>

                </div>
            </section>

            <div class="col-12 col-md-4 col-lg-3">
                @if(Auth::user()->role === 'ADMIN')
                <div class="row w-100 h-100 align-items-around justify-content-center">
                    <div class="col-12 h-100 my-5">
                        <h3 class="bg-primary p-3 fs-3 text-white text-center">Mis Productos</h3>
                        <ul class="list-group">
                            @forelse ($my_products as $product)
                                <li class="list-group-item d-flex justify-content-between align-items-center fs-4">
                                    {{ $product->name }}
                                    <span class="badge bg-primary rounded-pill">{{ $product->stock }}</span>
                                </li>
                            @empty
                                <h4 class="text-center text-danger fw-bold fs-3">Aun no has invertido en ningun producto</h4>
                            @endforelse
                        </ul>
                    </div>
                    <div class="col-12 my-5">
                        <h3 class="bg-primary p-3 fs-3 text-white text-center">Mis Ventas</h3>
                        <ul class="list-group">
                            @forelse ($my_sales as $sale)
                                <li class="list-group-item d-flex justify-content-between align-items-center fs-4">
                                    {{ $sale->code }}
                                    <span class="badge bg-primary rounded-pill">${{ $sale->total }}</span>
                                </li>
                            @empty
                                <h4 class="text-center text-danger fw-bold fs-3">Aun no has generado ninguna venta</h4>
                            @endforelse
                        </ul>
                    </div>
                </div>
                @endif
                @if(Auth::user()->role === 'EMPLEADO')
                <div class="row w-100 h-100 align-items-around justify-content-center">
                    <div class="col-12 h-100 my-5">
                        <h3 class="bg-primary p-3 fs-3 text-white text-center">Mis Ventas</h3>
                        <ul class="list-group">
                            @forelse ($my_sales as $sale)
                                <li class="list-group-item d-flex justify-content-between align-items-center fs-4">
                                    {{ $sale->code }}
                                    <span class="badge bg-primary rounded-pill">${{ $sale->total }}</span>
                                </li>
                                @if ($loop->last)
                                    <a href="#" class="btn btn-danger d-block w-75 text-end ms-auto fs-5 text-white fw-bold">Ver Todos -> NO FUNCIONA</a>
                                @endif
                            @empty
                                <h4 class="text-center text-danger fw-bold fs-3">Aun no has generado ninguna venta</h4>
                            @endforelse
                        </ul>
                    </div>
                </div>
                @endif
            </div>

            <section class="col-12 col-md-4 col-lg-3">
                <div class="row w-100 justify-content-center align-items-center rounded shadow-lg pt-5">
                    <div class="col-10 my-5">
                        <div class="card">
                            <h3 class="text-center text-white fs-3 fw-bold bg-primary p-2">{{ ucfirst(strtolower(Auth::user()->role)) }}</h3>
                            <h3 class="card-title text-center fw-bold">{{ Auth::user()->name }}</h3>
                        </div>
                    </div>

                    <div class="col-10 my-5">
                        <div class="card">
                            <h3 class="text-center text-white fs-3 fw-bold bg-primary p-2">Email</h3>
                            <h3 class="card-title text-center fw-bold">{{ Auth::user()->email }}</h3>
                        </div>
                    </div>

                    <div class="col-10 my-5">
                        <h3 class="text-center text-white fs-3 fw-bold bg-primary p-2">Cambiar Contraseña</h3>
                        <form action="">

                            <hr>

                            <div class="form-group">
                                <label for="password" class="fs-4 text-center d-block mb-2 fw-bold">Nueva Contraseña</label>
                                <input type="password" class="form-control form-control-lg fs-3 p-2" name="password"
                                    id="password">
                            </div>

                            <hr>

                            <div class="form-group">
                                <label for="confirm_password" class="fs-4 text-center d-block mb-2 fw-bold">Confirmar Nueva
                                    Contraseña</label>
                                <input type="password" class="form-control form-control-lg fs-3 p-2" name="confirm_password"
                                    id="confirm_password">
                            </div>

                            <hr>

                            <div class="form-group my-3">
                                <input type="submit" value="Cambiar Contraseña NO FUNCIONA"
                                    class="btn btn-danger fs-5 text-white fw-bold d-block w-100">
                            </div>

                        </form>
                    </div>

                </div>
            </section>

        </div>

    </main>

@endsection
