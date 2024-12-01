<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Carteirinhas') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mt-4">
                    <a href="{{ route('carteirinhas.create') }}" class="btn btn-success mb-3">Nova Carteirinha</a>

                    <form method="GET" action="{{ route('carteirinhas.index') }}" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Pesquisar por aluno..."
                                   value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Pesquisar</button>
                        </div>
                    </form>

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
                                <td>{{ $carteirinha->data_validade_formatted }}</td>
                                <td>
                                    <a href="{{ route('carteirinhas.show', $carteirinha->id) }}"
                                       class="btn btn-primary btn-sm">Detalhes</a>
                                    <a href="{{ route('carteirinhas.edit', $carteirinha->id) }}"
                                       class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('carteirinhas.destroy', $carteirinha->id) }}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Tem certeza que deseja excluir?')">Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $carteirinhas->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
