<x-app-layout>
    <div class="container mt-4">
        <h2>Lista de Carteirinhas</h2>
        <a href="{{ route('carteirinhas.create') }}" class="btn btn-success mb-3">Nova Carteirinha</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Aluno</th>
                <th>Data de Validade</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($carteirinhas as $carteirinha)
                <tr>
                    <td>{{ $carteirinha->aluno->nome }}</td>
                    <td>{{ $carteirinha->data_validade }}</td>
                    <td>
                        <a href="{{ route('carteirinhas.show', $carteirinha->id) }}" class="btn btn-primary btn-sm">Detalhes</a>
                        <a href="{{ route('carteirinhas.edit', $carteirinha->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('carteirinhas.destroy', $carteirinha->id) }}" method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Tem certeza?')">Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $carteirinhas->links() }}
    </div>
</x-app-layout>
