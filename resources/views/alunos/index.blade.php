<x-app-layout>
    <div class="container mt-4">
        <h2>Lista de Alunos</h2>
        <a href="{{ route('alunos.create') }}" class="btn btn-success mb-3">Novo Aluno</a>
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
                        <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Tem certeza?')">Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $alunos->links() }}
    </div>
</x-app-layout>
