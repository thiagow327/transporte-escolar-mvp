<x-app-layout>
    <div class="container mt-4">
        <h2>{{ isset($pagamento) ? 'Editar Pagamento' : 'Novo Pagamento' }}</h2>
        <form method="POST"
              action="{{ isset($pagamento) ? route('pagamentos.update', $pagamento->id) : route('pagamentos.store') }}">
            @csrf
            @if(isset($pagamento))
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="carteirinha_id" class="form-label">Carteirinha</label>
                <select class="form-select" id="carteirinha_id" name="carteirinha_id" required>
                    <option value="" disabled {{ isset($pagamento) ? '' : 'selected' }}>Selecione uma carteirinha
                    </option>
                    @foreach($carteirinhas as $carteirinha)
                        <option
                            value="{{ $carteirinha->id }}" {{ isset($pagamento) && $pagamento->carteirinha_id == $carteirinha->id ? 'selected' : '' }}>
                            {{ $carteirinha->aluno->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor</label>
                <input type="number" class="form-control" id="valor" name="valor"
                       value="{{ $pagamento->valor ?? old('valor') }}" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="data_pagamento" class="form-label">Data de Pagamento</label>
                <input type="date" class="form-control" id="data_pagamento" name="data_pagamento"
                       value="{{ $pagamento->data_pagamento ?? old('data_pagamento') }}" required>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</x-app-layout>
