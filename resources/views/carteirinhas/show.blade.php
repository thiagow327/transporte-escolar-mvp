<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes do Aluno') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mt-4">
                    <h2>Detalhes da Carteirinha</h2>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Aluno:</strong> {{ $carteirinha->aluno->nome }}</li>
                        <li class="list-group-item"><strong>Ativo:</strong> {{ $carteirinha->ativo ? 'Sim' : 'Não' }}
                        </li>
                        <li class="list-group-item"><strong>Data de Validade:</strong> {{ $carteirinha->data_validade }}
                        </li>
                    </ul>
                    <div class="mb-3">
                        <a href="{{ route('carteirinhas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
