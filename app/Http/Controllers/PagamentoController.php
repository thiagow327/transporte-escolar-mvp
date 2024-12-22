<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'carteirinha_id' => 'required|exists:carteirinhas,id',
            'data_pagamento' => 'required|date',
            'valor' => 'required|numeric',
            'recebedor' => 'required|string',
            'tipo_pagamento' => 'required|string',
            'observacoes' => 'nullable|string',
        ]);

        Pagamento::create($request->all());

        return redirect()
            ->route('carteirinhas.show', $request->carteirinha_id)
            ->with('success', 'Pagamento criado com sucesso!');
    }

    public function update(Request $request, Pagamento $pagamento)
    {
        $request->validate([
            'carteirinha_id' => 'required|exists:carteirinhas,id',
            'data_pagamento' => 'required|date',
            'valor' => 'required|numeric',
            'recebedor' => 'required|string',
            'tipo_pagamento' => 'required|string',
            'observacoes' => 'nullable|string',
        ]);

        $pagamento->update($request->all());

        return redirect()
            ->route('carteirinhas.show', $request->carteirinha_id)
            ->with('success', 'Pagamento atualizado com sucesso!');
    }

    public function destroy(Pagamento $pagamento)
    {
        $carteirinhaId = $pagamento->carteirinha_id;
        $pagamento->delete();

        return redirect()
            ->route('carteirinhas.show', $carteirinhaId)
            ->with('success', 'Pagamento excluído com sucesso!');
    }
}
