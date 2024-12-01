<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes do Pagamento') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mt-4">
                    <div class="mb-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Carteirinha:</strong> {{ $pagamento->carteirinha->aluno->nome }}</li>
                            <li class="list-group-item"><strong>Data de
                                    Pagamento:</strong> {{ $pagamento->data_pagamento }}</li>
                            <li class="list-group-item"><strong>Valor:</strong>
                                R$ {{ number_format($pagamento->valor, 2, ',', '.') }}</li>
                            <li class="list-group-item"><strong>Recebedor:</strong> {{ $pagamento->recebedor }}</li>
                            <li class="list-group-item"><strong>Tipo de
                                    Pagamento:</strong> {{ $pagamento->tipo_pagamento }}</li>
                            <li class="list-group-item"><strong>Observações:</strong> {{ $pagamento->observacoes }}</li>
                        </ul>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('pagamentos.edit', $pagamento->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

