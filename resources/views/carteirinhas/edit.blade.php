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
                    <form action="{{ route('carteirinhas.update', $carteirinha->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="aluno_id" class="form-label">Aluno</label>
                            <select name="aluno_id" id="aluno_id" class="form-select">
                                @foreach($alunos as $aluno)
                                    <option
                                        value="{{ $aluno->id }}" {{ $aluno->id == $carteirinha->aluno_id ? 'selected' : '' }}>
                                        {{ $aluno->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="data_validade" class="form-label
                ">Data de Validade</label>
                            <input type="date" name="data_validade" id="data_validade" class="form-control"
                                   value="{{ $carteirinha->data_validade }}">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <a href="{{ route('carteirinhas.index') }}" class="btn btn-secondary">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
