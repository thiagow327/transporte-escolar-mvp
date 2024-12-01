<x-app-layout>
    <div class="container mt-4">
        <h2>Detalhes do Pagamento</h2>
        <div class="mb-3">
            <label for="carteirinha_id" class="form-label">Carteirinha</label>
            <input type="text" class="form-control" id="carteirinha_id" name="carteirinha_id"
                   value="{{ $pagamento->carteirinha->aluno->nome }}" readonly>
        </div>
        <div class="mb-3">
            <label for="data_pagamento" class="form-label
            ">Data de Pagamento</label>
            <input type="text" class="form-control" id="data_pagamento" name="data_pagamento"
                   value="{{ $pagamento->data_pagamento }}" readonly>
        </div>
        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="text" class="form-control" id="valor" name="valor" value="{{ $pagamento->valor }}" readonly>
        </div>
        <div class="mb-3">
            <label for="recebedor" class="form-label
            ">Recebedor</label>
            <input type="text" class="form-control" id="recebedor" name="recebedor" value="{{ $pagamento->recebedor }}"
                   readonly>
        </div>
        <div class="mb-3">
            <label for="tipo_pagamento" class="form-label
            ">Tipo de Pagamento</label>
            <input type="text" class="form-control" id="tipo_pagamento" name="tipo_pagamento"
                   value="{{ $pagamento->tipo_pagamento }}" readonly>
        </div>
        <div class="mb-3">
            <label for="observacoes" class="form-label">Observações</label>
            <textarea class="form-control" id="observacoes" name="observacoes"
                      readonly>{{ $pagamento->observacoes }}</textarea>
        </div>
        <a href="{{ route('pagamentos.edit', $pagamento->id) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('pagamentos.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</x-app-layout>

