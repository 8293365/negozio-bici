<main>
    <h2>Catalogo</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
        </tr>

        @foreach($articoli as $a)
            <tr>
                <td>{{ $a->id }}</td>
                <td>
                    <a href="{{ url('go/dettaglio/' . $a->id) }}">
                        {{ $a->nome }}
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
</main>
@include('layouts.footer')