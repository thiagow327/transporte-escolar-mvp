<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pagamentos') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mt-4">
                    <a href="{{ route('pagamentos.create') }}" class="btn btn-success mb-3">Novo Pagamento</a>

                    <form method="GET" action="{{ route('pagamentos.index') }}" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Pesquisar por aluno..."
                                   value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Pesquisar</button>
                        </div>
                    </form>

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
                                    <form action="{{ route('pagamentos.destroy', $pagamento->id) }}" method="POST"
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
                    {{ $pagamentos->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
