<x-app-layout>
    <div class="container mt-4">
        <h2>Editar Aluno</h2>
        <form method="POST" action="{{ route('alunos.update', $aluno->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $aluno->nome }}" required>
            </div>
            <div class="mb-3">
                <label for="responsavel" class="form-label
                ">Responsável</label>
                <input type="text" class="form-control" id="responsavel" name="responsavel"
                       value="{{ $aluno->responsavel }}" required>
            </div>
            <div class="mb-3">
                <label for="contato_responsavel" class="form-label">Contato do Responsável</label>
                <input type="text" class="form-control" id="contato_responsavel" name="contato_responsavel"
                       value="{{ $aluno->contato_responsavel }}" required>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</x-app-layout>
