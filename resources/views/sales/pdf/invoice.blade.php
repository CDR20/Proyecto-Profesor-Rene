@php

    use Carbon\Carbon;

    $sale = $data['sale'];
    $product = json_decode($data['product']);
    date_default_timezone_set('America/Mexico_City');
    $date = Carbon::now()->locale('es');
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura - {{  $data['sale']->code }}</title>
</head>

<style>

    :root{
        --primary: #032451;
        --terciary: #06469e;
        --secondary: #b84600;
        --cuaternary: #883909;
        --white: #ffffff;
        --black: #000000;
        --gray: gray;
        --quinternary: #D0ECF0;
    }

    *{
        padding: 0;
        margin: 0;
     }

    html{
        box-sizing: border-box;
        font-family: Helvetica, Arial, sans-serif;
    }

    #header{
        background-color: #06469e;
        color: white;
        padding: 20px;
        font-size: 0.5rem;
    }

    #header h1, #header  h2{
        display: inline-block;
    }

    #header h2{
        position: absolute;
        right: 20;
    }

    .header-section{
        font-weight: bold;
        font-size: 1rem;
        text-align: center;
        width: 50%;
        margin: 0 auto;
        margin-bottom: 15px;
    }

    .label{
        margin-top: 10px;
        margin-bottom: 5px;
        font-weight: bold;
        font-size: 0.9rem;
    }

    .data{
        color: #555;
        font-weight: bold;
        font-size: 0.8rem;
    }

    hr{
        background-color: #032451;
        padding: 5px;
    }

    footer{
        position: absolute;
        bottom: 0;
        min-width: 100%;
        background-color: #06469e;
        color: white;
        padding: 20px;
        font-size: 0.5rem;
    }

    #date{
        position: absolute;
        bottom: 100px;
        right: 20px;
    }


</style>

<body>
    <div id="header">
        <h1>Muebles Di-Ro</h1>
        <h2>Factura {{ $sale->code }}</h2>
    </div>

    <hr>

    <main>
        <div class="container">
            <h3 class="header-section">Sobre el Producto</h3>

            <hr>

            <div class="container w-100 p-0 text-center">
                <div class="d-inline-block w-25">
                    <h6 class="fs-6 fw-bold">Nombre</h6>
                    <p class="fs-6 data fw-bold ps-3">{{ $product->name }}</p>
                </div>

                <div class="d-inline-block w-25">
                    <h6 class="label">Codigo</h6>
                    <p class="fs-6 data fw-bold ps-3">{{ $product->code }}</p>
                </div>

                <div class="d-inline-block w-25">
                    <h6 class="label">Precio</h6>
                    <p class="fs-6 data fw-bold ps-3">${{ $product->shop_price }}</p>
                </div>
            </div>

        </div>

        <hr>


        <div class="container mt-3">
            <h3 class="header-section">Sobre la Compra</h3>

            <hr>

            <div class="container w-100 p-0 text-center">
                <div class="d-inline-block w-25">
                    <h6 class="fs-6 fw-bold">Subtotal de la Venta:</h6>
                    <p class="fs-6 data fw-bold">${{ $sale->subtotal }}</p>
                </div>

                <div class="d-inline-block w-25">
                    <h6 class="label">IVA Aplicado:</h6>
                    <p class="fs-6 data fw-bold">${{ $sale->iva }}</p>
                </div>

                <div class="d-inline-block w-25">
                    <h6 class="label">Total de Venta</h6>
                    <p class="fs-6 data fw-bold">${{ $sale->total }}</p>
                </div>
            </div>

            <hr class="w-50 mx-auto d-block">

            <div class="container w-100 p-0 text-center">
                <div class="d-inline-block w-25">
                    <h6 class="label">Dia de Pago</h6>
                    <p class="fs-6 data fw-bold">{{ ucfirst(strToLower($sale->payment_day)) }}</p>
                </div>
                <div class="d-inline-block w-25">
                    <h6 class="label">Atendido por</h6>
                    <p class="fs-6 data fw-bold">{{ ucfirst(strToLower($sale->user->name)) }}</p>
                </div>
            </div>
        </div>

        <p class="text-muted" id="date">Venta efectuada el: {{ "$date->dayName $date->day $date->monthName de $date->year a las $date->hour:$date->minute hrs" }}</p>
    </main>

    <footer>
        <h3>
            Muebles Di-Ro
        </h3>
        <h4>Todos los Derechos Reservados &copy;</h4>
    </footer>
</body>
</html>
