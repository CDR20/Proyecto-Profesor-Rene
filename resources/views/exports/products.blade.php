<table>
    <thead>
        <tr>
            <th colspan="3">Codigo</th>
            <th colspan="3">Nombre</th>
            <th colspan="2">Precio en tienda</th>
            <th colspan="3">Precio de proveedor</th>
            <th colspan="2">Existencias</th>
            <th colspan="3">Proveedor</th>
            <th colspan="3">Inversor</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
            <tr>
                <td colspan="3">{{ $product->code }}</td>
                <td colspan="3">{{ $product->name }}</td>
                <td colspan="2">${{ $product->shop_price }}</td>
                <td colspan="3">${{ $product->provider_price }}</td>
                <td colspan="2">{{ $product->stock }}</td>
                <td colspan="3">{{ $product->provider->name }}</td>
                <td colspan="3">{{ $product->inversor->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
