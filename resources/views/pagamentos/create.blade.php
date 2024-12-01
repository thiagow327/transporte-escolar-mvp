<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Novo Pagamento') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mt-4">
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
                            <input type="text" class="form-control" id="valor" name="valor" value="{{ old('valor') }}"
                                   required>
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
                            <textarea class="form-control" id="observacoes"
                                      name="observacoes">{{ old('observacoes') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Salvar</button>
                            <a href="{{ route('pagamentos.index') }}" class="btn btn-secondary">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
