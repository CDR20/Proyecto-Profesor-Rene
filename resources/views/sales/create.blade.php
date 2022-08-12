@php
    $globalSubTotal = 0;
    $globalTotal = 0;
    $globalIVA = 0;
@endphp

@extends('layouts.app')

@section('title', 'Ventas')

@section('content')

    <div class="container-fluid">
        <div class="row alignt-items justify-content-center">
            <div class="col-12 col-lg-10 bg-white shadow mt-5 p-5">
                <h1 class="text-center p-5 bg-primario text-white mb-5">Generar nueva venta</h1>
                <form action="{{ route('sales.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row align-items-center justify-content-around">

                        @foreach ($products as $product)

                        <input type="hidden" name="products[]" value="{{ $product->id }}">
                        <input type="hidden" name="users[]" value="{{ Auth::id() }}">

                        <div class="col-12 col-lg-4">
                            <div class="row align-items-center justify-content-around">
                                <div class="col-12 col-lg-4">
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <h3 class="fs-4 fw-bold">{{ $product->name }}</h3>
                                    <h4 class="text-secondary fs-5">{{ $product->code }}</h4>
                                    <h5 class="my-2 text-terciario fs-5 fst-itallic text-end fw-bold">{{ $product->stock }} Disponibles(s)</h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 h-100 my-2">
                            <label for="clients" class="fw-bold my-2 fs-5">Cliente</label>
                            <select name="clients[]" class="form-select p-3 fs-5 clients" required id="clients">
                                <option selected disabled="disabled">-- Seleccionar un Cliente --</option>
                                @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>

                            <label for="payment_days" class="fw-bold my-2 fs-5">Dia de Pago</label>
                            <select class="form-select overflow-hidden p-3 fs-5" multiple aria-label="multiple select" name="payment_days[]" id="payment_days" required>
                                <option value="lunes">Lunes</option>
                                <option value="miercoles">Miercoles</option>
                                <option value="domingo">Domingo</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-4 h-100 my-2">
                            <input type="text" name="subtotals[]" readonly class="form-control-plaintext fs-4 fw-bold text-secundario text-end pe-5" id="staticSubTotal" value="Subtotal: ${{ number_format($product->shop_price, 2) }}">
                            <input type="text" name="IVAs[]" readonly class="form-control-plaintext fs-4 fw-bold text-secundario text-end pe-5" id="staticIVA" value="IVA: ${{ number_format($product->shop_price * 0.16, 2) }}">
                            <input type="text" name="totals[]" readonly class="form-control-plaintext fs-4 fw-bold text-secundario text-end pe-5" id="staticTotal" value="Total: ${{ number_format($product->shop_price + ($product->shop_price * 0.16), 2) }}">
                        </div>

                        <hr class="my-5 p-2 text-secundario mx-auto w-75">

                        @php
                            $globalSubTotal += $product->shop_price;
                            $globalTotal += $product->shop_price + ($product->shop_price * 0.16);
                            $globalIVA += $product->shop_price * 0.16;
                        @endphp

                        @endforeach

                        <div class="col-12 col-lg-6 ms-auto">
                            <div class="row w-100 align-items-center justify-content-center">
                                <div class="col-12 col-lg-6">
                                    <button class="btn btn-primary btn-lg" id="btn-submit">Guardar Venta y Generar Facturas</button>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input type="text" name="globalSubTotal" readonly class="form-control-plaintext text-primario fw-bold fs-3" id="staticGlobalSubTotal" value="SubTotal: ${{ number_format($globalSubTotal, 2) }}">
                                    <input type="text" name="globalIVA" readonly class="form-control-plaintext text-primario fw-bold fs-3" id="staticGlobalIVA" value="IVA: ${{ number_format($globalIVA, 2) }}">
                                    <input type="text" name="globalTotal" readonly class="form-control-plaintext text-primario fw-bold fs-3" id="staticGlobalTotal" value="Total: ${{ number_format($globalTotal, 2) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        window.addEventListener('load', ()=>{
            const selects = document.querySelectorAll('.clients');
            const btnSubmit = document.querySelector('#btn-submit');
            btnSubmit.setAttribute('disabled', 'true');

            const selectsToValidate = selects.length;
            let validatedSelects = 0;


            selects.forEach( select => {
                select.addEventListener('change', () => {
                    select.value !== 0 ? validatedSelects += 1 : validatedSelects -= 1;
                    checkValidatedSelects()
                });
            });


            const checkValidatedSelects = () => {
                if(selectsToValidate === validatedSelects){
                    btnSubmit.removeAttribute('disabled');
                }
            }
        })

    </script>
@endsection
