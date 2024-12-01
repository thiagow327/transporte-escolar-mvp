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
                    <h4 class="mt-4">Dados</h4>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Aluno:</strong> {{ $carteirinha->aluno->nome }}</li>
                        <li class="list-group-item"><strong>Ativo:</strong> {{ $carteirinha->ativo ? 'Sim' : 'Não' }}
                        </li>
                        <li class="list-group-item"><strong>Data de Validade:</strong> {{ $carteirinha->data_validade }}
                        </li>
                    </ul>

                    <h4 class="mt-8">Pagamentos</h4>
                    @if($carteirinha->pagamentos->isEmpty())
                        <p>Nenhum pagamento registrado.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Valor</th>
                                <th>Data de Pagamento</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carteirinha->pagamentos as $pagamento)
                                <tr>
                                    <td>R$ {{ number_format($pagamento->valor, 2, ',', '.') }}</td>
                                    <td>{{ $pagamento->data_pagamento }}</td>
                                    <td>
                                        <a href="{{ route('pagamentos.show', $pagamento->id) }}"
                                           class="btn btn-primary btn-sm">Detalhes</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif

                    <div class="mb-3">
                        <a href="{{ route('carteirinhas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
