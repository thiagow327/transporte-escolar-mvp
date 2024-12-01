<x-app-layout>
    <div class="container mt-4">
        <h2>Detalhes da Carteirinha</h2>
        <ul class="list-group">
            <li class="list-group-item"><strong>Aluno:</strong> {{ $carteirinha->aluno->nome }}</li>
            <li class="list-group-item"><strong>Data de Validade:</strong> {{ $carteirinha->data_validade }}</li>
        </ul>
        <a href="{{ route('carteirinhas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</x-app-layout>
