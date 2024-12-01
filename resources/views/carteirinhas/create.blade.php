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
                            <label for="aluno_id" class="form-label">Aluno</label>
                            <select class="form-select" id="aluno_id" name="aluno_id" required>
                                <option value="" disabled {{ isset($carteirinha) ? '' : 'selected' }}>Selecione um
                                    aluno
                                </option>
                                @foreach($alunos as $aluno)
                                    <option
                                            value="{{ $aluno->id }}" {{ isset($carteirinha) && $carteirinha->aluno_id == $aluno->id ? 'selected' : '' }}>
                                        {{ $aluno->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="data_validade" class="form-label">Data de Validade</label>
                            <input type="date" class="form-control" id="data_validade" name="data_validade"
                                   value="{{ $carteirinha->data_validade ?? old('data_validade') }}" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Salvar</button>
                            <a href="{{ route('carteirinhas.index') }}" class="btn btn-secondary">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
