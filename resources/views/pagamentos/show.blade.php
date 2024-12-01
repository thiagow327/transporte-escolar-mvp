<x-app-layout>
    <div class="container mt-4">
        <h2>Detalhes do Pagamento</h2>
        <ul class="list-group">
            <li class="list-group-item"><strong>Aluno:</strong> {{ $pagamento->carteirinha->aluno->nome }}</li>
            <li class="list-group-item"><strong>Valor:</strong> R$ {{ number_format($pagamento->valor, 2, ',', '.') }}
            </li>
            <li class="list-group-item"><strong>Data de Pagamento:</strong> {{ $pagamento->data_pagamento }}</li>
        </ul>
        <a href="{{ route('pagamentos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</x-app-layout>
