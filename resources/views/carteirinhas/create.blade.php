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
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome do Aluno</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                   value="{{ old('nome', $carteirinha->nome ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="idade" class="form-label">Idade</label>
                            <input type="number" class="form-control" id="idade" name="idade"
                                   value="{{ old('idade', $carteirinha->idade ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="vencimento_dia" class="form-label">Dia de Vencimento</label>
                            <input type="number" class="form-control" id="vencimento_dia" name="vencimento_dia"
                                   min="1" max="31"
                                   value="{{ old('vencimento_dia', $carteirinha->vencimento_dia ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="escola" class="form-label">Escola</label>
                            <input type="text" class="form-control" id="escola" name="escola"
                                   value="{{ old('escola', $carteirinha->escola ?? '') }}" required>
                        </div>

                        <div class="mb-3">
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
