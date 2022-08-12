@extends('layouts.app')

@section('title', 'Ventas')

@section('content')
<div class="container mx-auto vh-100">
    <div class="row align-items-center justify-content-center h-100 w-100">
        <div class="col-12 col-lg-10">
            @empty($sales)
                <h1 class="text-center fw-bold fs-1 text-primario">Aun no hay ventas</h1>
            @else
                <table class="table table-hover table table-light shadow-lg border border-2">
                    <thead class="text-primario fw-bold fs-5 text-center">
                        <th class="p-3 fs-3">Ticket</th>
                        <th class="p-3 fs-3">Total</th>
                        <th class="p-3 fs-3">Cliente</th>
                        <th class="p-3 fs-3">Vendido por</th>
                        <th class="p-3 fs-3">Dia de pago</th>
                        <th class="p-3 fs-3">&nbsp;</th>
                    </thead>
                    <tbody class="text-center text-secondary fw-bold fs-5">
                        @foreach ($sales as $sale)
                            <tr>
                                <td class="p-3">{{ $sale->code }}</td>
                                <td class="text-dark p-3">${{ $sale->total }}</td>
                                <td class="p-3">{{ $sale->client->name }}</td>
                                <td class="p-3">{{ $sale->user->name }}</td>
                                <td class="p-3">{{ ucfirst(strToLower($sale->payment_day)) }}</td>
                                <td>
                                    <a href="{{ route('sales.invoice', $sale->code) }}" class="btn text-secundario fs-5 fw-bold" target="_blank">Ver Factura</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        {{ $sales->links() }}
                    </tfoot>
                </table>
            @endempty
        </div>
    </div>
</div>
@endsection
