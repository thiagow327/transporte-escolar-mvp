<x-app-layout>
    <div class="container mt-4">
        <h2>{{ isset($carteirinha) ? 'Editar Carteirinha' : 'Nova Carteirinha' }}</h2>
        <form method="POST"
              action="{{ isset($carteirinha) ? route('carteirinhas.update', $carteirinha->id) : route('carteirinhas.store') }}">
            @csrf
            @if(isset($carteirinha))
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="aluno_id" class="form-label">Aluno</label>
                <select class="form-select" id="aluno_id" name="aluno_id" required>
                    <option value="" disabled {{ isset($carteirinha) ? '' : 'selected' }}>Selecione um aluno</option>
                    @foreach($alunos as $aluno)
                        <option
                            value="{{ $aluno->id }}" {{ isset($carteirinha) && $carteirinha->aluno_id == $aluno->id ? 'selected' : '' }}>
                            {{ $aluno->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="data_validade" class="form-label">Data de Validade</label>
                <input type="date" class="form-control" id="data_validade" name="data_validade"
                       value="{{ $carteirinha->data_validade ?? old('data_validade') }}" required>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</x-app-layout>
