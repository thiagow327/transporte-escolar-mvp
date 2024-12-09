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
                        <div class="row">
                            <!-- Filtro por nome do aluno -->
                            <div class="col-md-3">
                                <input type="text" name="nome" class="form-control" placeholder="Filtrar por nome"
                                       value="{{ request('nome') }}">
                            </div>

                            <!-- Filtro por escola --><!-- Filtro por escola -->
                            <div class="col-md-3">
                                <select name="escola" class="form-select">
                                    <option value="">Filtrar por escola</option>
                                    <option value="a" {{ request('escola') == 'a' ? 'selected' : '' }}>A</option>
                                    <option value="b" {{ request('escola') == 'b' ? 'selected' : '' }}>B</option>
                                    <option value="c" {{ request('escola') == 'c' ? 'selected' : '' }}>C</option>
                                </select>
                            </div>

                            <!-- Filtro por horário -->
                            <div class="col-md-3">
                                <select name="horario" class="form-select">
                                    <option value="">Filtrar por horário</option>
                                    <option value="manha" {{ request('horario') == 'manha' ? 'selected' : '' }}>Manhã
                                    </option>
                                    <option value="tarde" {{ request('horario') == 'tarde' ? 'selected' : '' }}>Tarde
                                    </option>
                                </select>
                            </div>

                            <!-- Botão de filtro -->
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Filtrar</button>
                            </div>
                        </div>
                    </form>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Aluno</th>
                            <th>Escola</th>
                            <th>Horário</th>
                            <th>Dia de Vencimento</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carteirinhas as $carteirinha)
                            <tr>
                                <td>{{ $carteirinha->aluno->nome }}</td>
                                <td>{{ $carteirinha->escola }}</td>
                                <td>{{ $carteirinha->horario }}</td>
                                <td>{{ $carteirinha->vencimento_dia }}</td>
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
