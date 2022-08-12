<table>
    <thead>
        <tr>
            <th colspan="4">Nombre</th>
            <th colspan="6">Dirección</th>
            <th colspan="3">Numero Telefónico</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($providers as $provider)
            <tr>
                <td colspan="4">{{ $provider->name }}</td>
                <td colspan="6">{{ $provider->address }}</td>
                <td colspan="3">{{ $provider->cellphone }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
