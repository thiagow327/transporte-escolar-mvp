<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Novo Aluno') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mt-4">
                    <form method="POST"
                          action="{{ isset($aluno) ? route('alunos.update', $aluno->id) : route('alunos.store') }}">
                        @csrf
                        @if(isset($aluno))
                            @method('PUT')
                        @endif
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                   value="{{ $aluno->nome ?? old('nome') }}"
                                   required>
                        </div>
                        <div class="mb-3">
                            <label for="responsavel" class="form-label">Responsável</label>
                            <input type="text" class="form-control" id="responsavel" name="responsavel"
                                   value="{{ $aluno->responsavel ?? old('responsavel') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="contato_responsavel" class="form-label">Contato do Responsável</label>
                            <input type="text" class="form-control" id="contato_responsavel" name="contato_responsavel"
                                   value="{{ $aluno->contato_responsavel ?? old('contato_responsavel') }}" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Salvar</button>
                            <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
