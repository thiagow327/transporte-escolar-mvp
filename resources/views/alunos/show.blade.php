<x-app-layout>
    <div class="container mt-4">
        <h2>Detalhes do Aluno</h2>
        <ul class="list-group">
            <li class="list-group-item"><strong>Nome:</strong> {{ $aluno->nome }}</li>
            <li class="list-group-item"><strong>Responsável:</strong> {{ $aluno->responsavel }}</li>
            <li class="list-group-item"><strong>Contato:</strong> {{ $aluno->contato_responsavel }}</li>
        </ul>
        <a href="{{ route('alunos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</x-app-layout>
