<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nova Carteirinha') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mt-4">
                    <form method="POST"
                          action="{{ isset($carteirinha) ? route('carteirinhas.update', $carteirinha->id) : route('carteirinhas.store') }}">
                        @csrf
                        @if(isset($carteirinha))
                            @method('PUT')
                        @endif

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="aluno_nome" class="form-label">Nome do Aluno</label>
                                <input type="text" class="form-control" id="aluno_nome" name="aluno_nome"
                                       value="{{ old('aluno_nome') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="aluno_idade" class="form-label">Idade do Aluno</label>
                                <input type="number" class="form-control" id="aluno_idade" name="aluno_idade"
                                       value="{{ old('aluno_idade') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="responsavel" class="form-label">Nome do Responsável</label>
                                <input type="text" class="form-control" id="responsavel" name="responsavel"
                                       value="{{ old('responsavel') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="contato_responsavel" class="form-label">Contato do Responsável</label>
                                <input type="text" class="form-control" id="contato_responsavel"
                                       name="contato_responsavel"
                                       value="{{ old('contato_responsavel') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="escola" class="form-label">Escola</label>
                                <select class="form-select" id="escola" name="escola" required>
                                    <option
                                        value="a" {{ old('escola', $carteirinha->escola ?? '') == 'a' ? 'selected' : '' }}>
                                        A
                                    </option>
                                    <option
                                        value="b" {{ old('escola', $carteirinha->escola ?? '') == 'b' ? 'selected' : '' }}>
                                        B
                                    </option>
                                    <option
                                        value="c" {{ old('escola', $carteirinha->escola ?? '') == 'c' ? 'selected' : '' }}>
                                        C
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="horario" class="form-label">Horário</label>
                                <select class="form-select" id="horario" name="horario" required>
                                    <option
                                        value="manha" {{ old('horario', $carteirinha->horario ?? '') == 'manha' ? 'selected' : '' }}>
                                        Manhã
                                    </option>
                                    <option
                                        value="tarde" {{ old('horario', $carteirinha->horario ?? '') == 'tarde' ? 'selected' : '' }}>
                                        Tarde
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="vencimento_dia" class="form-label">Dia de Vencimento</label>
                                <input type="number" class="form-control" id="vencimento_dia" name="vencimento_dia"
                                       min="1" max="31"
                                       value="{{ old('vencimento_dia', $carteirinha->vencimento_dia ?? '') }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit"
                                    class="btn btn-success">{{ isset($carteirinha) ? 'Atualizar' : 'Criar' }}
                                Carteirinha
                            </button>
                            <a href="{{ route('carteirinhas.index') }}" class="btn btn-secondary">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
