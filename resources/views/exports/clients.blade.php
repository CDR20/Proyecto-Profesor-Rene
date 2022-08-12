<table>
    <thead>
        <tr>
            <th colspan="4">Nombre</th>
            <th colspan="6">Dirección</th>
            <th colspan="3">Numero Telefónico</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($clients as $client)
            <tr>
                <td colspan="4">{{ $client->name }}</td>
                <td colspan="6">{{ $client->address }}</td>
                <td colspan="3">{{ $client->cellphone }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
