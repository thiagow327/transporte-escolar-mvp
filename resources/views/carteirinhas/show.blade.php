<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes da Carteirinha') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mt-4">
                    <h3>Informações do Aluno</h3>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Nome:</strong> {{ $carteirinha->aluno->nome }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Idade:</strong> {{ $carteirinha->aluno->idade }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Responsável:</strong> {{ $carteirinha->aluno->responsavel }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Contato do Responsável:</strong> {{ $carteirinha->aluno->contato_responsavel }}
                            </p>
                        </div>
                    </div>

                    <h3>Informações da Carteirinha</h3>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <p><strong>Dia de Vencimento:</strong> {{ $carteirinha->vencimento_dia }}</p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Escola:</strong> {{ $carteirinha->escola }}</p>
                        </div>
                        <div class="col-md-3">
                            <p><strong>Horário:</strong> {{ $carteirinha->horario }}</p>
                        </div>
                    </div>

                    <h3 class="mt-8">Pagamentos</h3>
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
