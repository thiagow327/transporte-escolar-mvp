<x-app-layout>
    <div class="container mt-4">
        <h2>Editar Carteirinha</h2>
        <form action="{{ route('carteirinhas.update', $carteirinha->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="aluno_id" class="form-label">Aluno</label>
                <select name="aluno_id" id="aluno_id" class="form-select">
                    @foreach($alunos as $aluno)
                        <option value="{{ $aluno->id }}" {{ $aluno->id == $carteirinha->aluno_id ? 'selected' : '' }}>
                            {{ $aluno->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="data_validade" class="form-label
                ">Data de Validade</label>
                <input type="date" name="data_validade" id="data_validade" class="form-control"
                       value="{{ $carteirinha->data_validade }}">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('carteirinhas.index') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</x-app-layout>
