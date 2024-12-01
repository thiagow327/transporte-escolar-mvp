<x-app-layout>
    <div class="container mt-4">
        <h2>Novo Pagamento</h2>
        <form method="POST" action="{{ route('pagamentos.store') }}">
            @csrf
            <div class="mb-3">
                <label for="carteirinha_id" class="form-label">Carteirinha</label>
                <select class="form-select" id="carteirinha_id" name="carteirinha_id" required>
                    <option value="" disabled selected>Selecione uma carteirinha</option>
                    @foreach($carteirinhas as $carteirinha)
                        <option value="{{ $carteirinha->id }}">{{ $carteirinha->aluno->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="data_pagamento" class="form-label">Data de Pagamento</label>
                <input type="date" class="form-control" id="data_pagamento" name="data_pagamento"
                       value="{{ old('data_pagamento') }}" required>
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor</label>
                <input type="text" class="form-control" id="valor" name="valor" value="{{ old('valor') }}" required>
            </div>
            <div class="mb-3">
                <label for="recebedor" class="form-label">Recebedor</label>
                <input type="text" name="recebedor" id="recebedor" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tipo_pagamento" class="form-label">Tipo de Pagamento</label>
                <input type="text" class="form-control" id="tipo_pagamento" name="tipo_pagamento"
                       value="{{ old('tipo_pagamento') }}" required>
            </div>
            <div class="mb-3">
                <label for="observacoes" class="form-label">Observações</label>
                <textarea class="form-control" id="observacoes" name="observacoes">{{ old('observacoes') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</x-app-layout>
