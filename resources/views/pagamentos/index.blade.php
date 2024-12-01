<x-app-layout>
    <div class="container mt-4">
        <h2>Lista de Pagamentos</h2>
        <a href="{{ route('pagamentos.create') }}" class="btn btn-success mb-3">Novo Pagamento</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Carteirinha</th>
                <th>Valor</th>
                <th>Data de Pagamento</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pagamentos as $pagamento)
                <tr>
                    <td>{{ $pagamento->carteirinha->aluno->nome }}</td>
                    <td>R$ {{ number_format($pagamento->valor, 2, ',', '.') }}</td>
                    <td>{{ $pagamento->data_pagamento }}</td>
                    <td>
                        <a href="{{ route('pagamentos.show', $pagamento->id) }}"
                           class="btn btn-primary btn-sm">Detalhes</a>
                        <a href="{{ route('pagamentos.edit', $pagamento->id) }}"
                           class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('pagamentos.destroy', $pagamento->id) }}" method="POST" class="d-inline">
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
        {{ $pagamentos->links() }}
    </div>
</x-app-layout>
