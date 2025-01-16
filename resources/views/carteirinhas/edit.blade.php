<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Carteirinha') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mt-4">
                    <form method="POST" action="{{ route('carteirinhas.update', $carteirinha->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <!-- Informações do Aluno (lado esquerdo) -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="aluno_nome" class="form-label">Nome do Aluno</label>
                                    <input type="text" class="form-control" id="aluno_nome" name="aluno_nome"
                                           value="{{ old('aluno_nome', $carteirinha->aluno->nome) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="responsavel" class="form-label">Responsável</label>
                                    <input type="text" class="form-control" id="responsavel" name="responsavel"
                                           value="{{ old('responsavel', $carteirinha->aluno->responsavel) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="contato_responsavel" class="form-label">Contato do Responsável</label>
                                    <input type="text" class="form-control" id="contato_responsavel"
                                           name="contato_responsavel"
                                           value="{{ old('contato_responsavel', $carteirinha->aluno->contato_responsavel) }}"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label for="endereco" class="form-label">Endereço</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco"
                                           value="{{ old('endereco', $carteirinha->aluno->endereco) }}">
                                </div>
                            </div>

                            <!-- Informações da Carteirinha (lado direito) -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="aluno_nascimento" class="form-label">Data de Nascimento</label>
                                    <input type="date" class="form-control" id="aluno_nascimento"
                                           name="aluno_nascimento"
                                           value="{{ old('aluno_nascimento', \Carbon\Carbon::parse($carteirinha->aluno->data_nascimento)->format('Y-m-d')) }}"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label for="vencimento_dia" class="form-label">Dia de Vencimento</label>
                                    <input type="number" class="form-control" id="vencimento_dia" name="vencimento_dia"
                                           min="1" max="31"
                                           value="{{ old('vencimento_dia', $carteirinha->vencimento_dia) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="valor_mensalidade" class="form-label">Valor da Mensalidade</label>
                                    <input type="number" class="form-control" id="valor_mensalidade"
                                           name="valor_mensalidade"
                                           value="{{ old('valor_mensalidade', $carteirinha->valor_mensalidade) }}"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label for="escola" class="form-label">Escola</label>
                                    <select class="form-select" id="escola" name="escola" required>
                                        <option
                                            value="CCA - Todos Irmãos" {{ old('escola', $carteirinha->escola) == 'CCA - Todos Irmãos' ? 'selected' : '' }}>
                                            CCA - Todos Irmãos
                                        </option>
                                        <option
                                            value="CCA - Ana Maria" {{ old('escola', $carteirinha->escola) == 'CCA - Ana Maria' ? 'selected' : '' }}>
                                            CCA - Ana Maria
                                        </option>
                                        <option
                                            value="CEI - Castelo Branco" {{ old('escola', $carteirinha->escola) == 'CEI - Castelo Branco' ? 'selected' : '' }}>
                                            CEI - Castelo Branco
                                        </option>
                                        <option
                                            value="CEI - Novo Amanhecer" {{ old('escola', $carteirinha->escola) == 'CEI - Novo Amanhecer' ? 'selected' : '' }}>
                                            CEI - Novo Amanhecer
                                        </option>
                                        <option
                                            value="CEI - Pequeno Anjo" {{ old('escola', $carteirinha->escola) == 'CEI - Pequeno Anjo' ? 'selected' : '' }}>
                                            CEI - Pequeno Anjo
                                        </option>
                                        <option
                                            value="CEI - Pingo de Orvalho" {{ old('escola', $carteirinha->escola) == 'CEI - Pingo de Orvalho' ? 'selected' : '' }}>
                                            CEI - Pingo de Orvalho
                                        </option>
                                        <option
                                            value="CEI - Vem ser feliz" {{ old('escola', $carteirinha->escola) == 'CEI - Vem ser feliz' ? 'selected' : '' }}>
                                            CEI - Vem ser feliz
                                        </option>
                                        <option
                                            value="CEI - Vila Nina" {{ old('escola', $carteirinha->escola) == 'CEI - Vila Nina' ? 'selected' : '' }}>
                                            CEI - Vila Nina
                                        </option>
                                        <option
                                            value="EMEI - Tito Lívio Ferreira" {{ old('escola', $carteirinha->escola) == 'EMEI - Tito Lívio Ferreira' ? 'selected' : '' }}>
                                            EMEI - Tito Lívio Ferreira
                                        </option>
                                        <option
                                            value="EMF - Raul Fernandes" {{ old('escola', $carteirinha->escola) == 'EMF - Raul Fernandes' ? 'selected' : '' }}>
                                            EMF - Raul Fernandes
                                        </option>
                                        <option
                                            value="EMF - Geraldo Sessor Junior" {{ old('escola', $carteirinha->escola) == 'EMF - Geraldo Sessor Junior' ? 'selected' : '' }}>
                                            EMF - Geraldo Sessor Junior
                                        </option>
                                        <option
                                            value="EMF - Galdino Lopes Chagas" {{ old('escola', $carteirinha->escola) == 'EMF - Galdino Lopes Chagas' ? 'selected' : '' }}>
                                            EMF - Galdino Lopes Chagas
                                        </option>
                                        <option
                                            value="Colégio Rodhum" {{ old('escola', $carteirinha->escola) == 'Colégio Rodhum' ? 'selected' : '' }}>
                                            Colégio Rodhum
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="horario" class="form-label">Horário</label>
                                    <select class="form-select" id="horario" name="horario" required>
                                        <option
                                            value="manha" {{ old('horario', $carteirinha->horario) == 'manha' ? 'selected' : '' }}>
                                            Manhã
                                        </option>
                                        <option
                                            value="tarde" {{ old('horario', $carteirinha->horario) == 'tarde' ? 'selected' : '' }}>
                                            Tarde
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <a href="{{ route('carteirinhas.index') }}" class="btn btn-secondary">Voltar</a>
                            <button type="submit" class="btn btn-success">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
