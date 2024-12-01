<x-app-layout>
    <div class="container mt-4">
        <h2>Alunos</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Responsável</th>
                <th>Contato</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->responsavel }}</td>
                    <td>{{ $aluno->contato_responsavel }}</td>
                    <td>
                        <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-primary btn-sm">Detalhes</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $alunos->links() }}
    </div>
</x-app-layout>
