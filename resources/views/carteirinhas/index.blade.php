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
                                    <option
                                        value="CCA - Todos Irmãos" {{ request('escola') == 'CCA - Todos Irmãos' ? 'selected' : '' }}>
                                        CCA - Todos Irmãos
                                    </option>
                                    <option
                                        value="CCA - Ana Maria" {{ request('escola') == 'CCA - Ana Maria' ? 'selected' : '' }}>
                                        CCA - Ana Maria
                                    </option>
                                    <option
                                        value="CEI - Castelo Branco" {{ request('escola') == 'CEI - Castelo Branco' ? 'selected' : '' }}>
                                        CEI - Castelo Branco
                                    </option>
                                    <option
                                        value="CEI - Novo Amanhecer" {{ request('escola') == 'CEI - Novo Amanhecer' ? 'selected' : '' }}>
                                        CEI - Novo Amanhecer
                                    </option>
                                    <option
                                        value="CEI - Pequeno Anjo" {{ request('escola') == 'CEI - Pequeno Anjo' ? 'selected' : '' }}>
                                        CEI - Pequeno Anjo
                                    </option>
                                    <option
                                        value="CEI - Pingo de Orvalho" {{ request('escola') == 'CEI - Pingo de Orvalho' ? 'selected' : '' }}>
                                        CEI - Pingo de Orvalho
                                    </option>
                                    <option
                                        value="CEI - Vem ser feliz" {{ request('escola') == 'CEI - Vem ser feliz' ? 'selected' : '' }}>
                                        CEI - Vem ser feliz
                                    </option>
                                    <option
                                        value="CEI - Vila Nina" {{ request('escola') == 'CEI - Vila Nina' ? 'selected' : '' }}>
                                        CEI - Vila Nina
                                    </option>
                                    <option
                                        value="EMEI - Tito Lívio Ferreira" {{ request('escola') == 'EMEI - Tito Lívio Ferreira' ? 'selected' : '' }}>
                                        EMEI - Tito Lívio Ferreira
                                    </option>
                                    <option
                                        value="EMF - Raul Fernandes" {{ request('escola') == 'EMF - Raul Fernandes' ? 'selected' : '' }}>
                                        EMF - Raul Fernandes
                                    </option>
                                    <option
                                        value="EMF - Geraldo Sessor Junior" {{ request('escola') == 'EMF - Geraldo Sessor Junior' ? 'selected' : '' }}>
                                        EMF - Geraldo Sessor Junior
                                    </option>
                                    <option
                                        value="EMF - Galdino Lopes Chagas" {{ request('escola') == 'EMF - Galdino Lopes Chagas' ? 'selected' : '' }}>
                                        EMF - Galdino Lopes Chagas
                                    </option>
                                    <option
                                        value="Colégio Roldhum" {{ request('escola') == 'Colégio Roldhum' ? 'selected' : '' }}>
                                        Colégio Roldhum
                                    </option>
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
                                    <option value="integral" {{ request('horario') == 'integral' ? 'selected' : '' }}>
                                        Integral
                                    </option>
                                </select>
                            </div>

                            <!-- Botão de filtro e limpar filtros -->
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Filtrar</button>
                                <a href="{{ route('carteirinhas.index') }}" class="btn btn-secondary">Limpar</a>
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
