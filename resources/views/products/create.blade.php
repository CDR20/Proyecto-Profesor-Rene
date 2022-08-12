@extends('layouts.app')

@section('title', 'Crear Nuevo Producto')

@section('content')
    <div class="container my-5 bg-light border border-2 shadow-lg rounded p-5">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 bg-primary p-5 text-white">
                <h3 class="text-center">Crear un nuevo producto para</h3>
                <h4 class="text-center">
                    <p class="text-decoration-none ps-5 pt-2 text-white fw-bold fs-2 fst-italic mb-0"> <span class="text-info fst-italic">H</span><span class="text-warning fst-italic">D</span> Hermanos Diaz</p>
                </h4>
                <ul class="mt-5">
                    <li class="fs-5">El código del producto se genera de manera automatica</li>
                    <li class="fs-5">Solo se asignan provedores o inversores previamente creados</li>
                    <li class="fs-5">Si no se especifica un stock por defecto se colocará 0</li>
                    <li class="fs-5">Usa la tecla TAB para moverte entre los campos de manera mas rápida</li>
                </ul>
            </div>
            <div class="col-12">
                <form action="{{ route('products.store') }}" class="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row justify-content-center w-100 align-items-center my-5">

                        <div class="col-12 col-md-8">
                            <div class="form-group w-100">
                                <label for="name" class="fs-4 fw-bold mb-3">Nombre del Producto</label>
                                <input type="text" class="form-control form-control-lg fs-4 p-2" name="name" placeholder="Ej. Lavadora Daeewoo 16Kg" value="{{ old('name') }}" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-2">
                            <div class="form-group w-100">
                                <label for="stock" class="fs-4 fw-bold mb-3">Stock</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg fs-4 p-2" name="stock" placeholder="Ej. 5" value="{{ old('stock') }}">
                                    <div class="input-group-text fs-4">Pz.</div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row justify-content-center w-100 align-items-center my-5">

                        <div class="col-12 col-md-3">
                            <div class="form-group w-100">
                                <label for="provider_price" class="fs-4 fw-bold mb-3">Precio de Proveedor</label>
                                <div class="input-group">
                                    <div class="input-group-text fs-4">$</div>
                                    <input type="text" class="form-control form-control-lg fs-4 p-2" name="provider_price" placeholder="Ej. 1500" value="{{ old('provider_price') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3">
                            <div class="form-group w-100">
                                <label for="shop_price" class="fs-4 fw-bold mb-3">Precio de Venta</label>
                                <div class="input-group">
                                    <div class="input-group-text fs-4">$</div>
                                    <input type="text" class="form-control form-control-lg fs-4 p-2" name="shop_price" placeholder="Ej. 2500" value="{{ old('shop_price') }}" required>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row justify-content-center w-100 align-items-center my-5">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label fs-4 fw-bold mb-3 w-100 text-center d-block">Imagen del Producto</label>
                                <input class="form-control form-contro-lg fs-4 p-2" type="file" id="image" name="image">
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-around w-100 align-items-center my-5">

                        <div class="col-12 col-md-5">
                            <div class="form-group w-100">
                                <label for="provider_id" class="fs-4 fw-bold mb-3">Proveedor</label>
                                <select class="form-select form-select-lg fs-4 p-2" name="provider_id" required>
                                    <option value="0" selected disabled>-- Selecciona un Proveedor --</option>
                                    @forelse ($providers as $provider)
                                        <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                    @empty
                                        <option value="0" disabled class="text-danger">Primero crea proveedores</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-5">
                            <div class="form-group w-100">
                                <label for="inversor_id" class="fs-4 fw-bold mb-3">Inversor</label>
                                <select class="form-select form-select-lg fs-4 p-2" name="inversor_id" required>
                                    <option value="0" selected disabled>-- Selecciona un Invsersor --</option>
                                    @forelse ($inversors as $inversor)
                                        <option value="{{ $inversor->id }}">{{ $inversor->name }}</option>
                                    @empty
                                        <option value="0" disabled class="text-danger">Primero crea proveedores</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row justify-content-center w-100 align-items-center my-5">
                        <div class="col-3 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Guardar Producto</button>
                        </div>
                        <div class="col-3 text-center">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary btn-lg">Cancelar & Volver</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
