<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use App\Models\Carteirinha;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function index(Request $request)
    {
        $query = Pagamento::with('carteirinha.aluno');

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->whereHas('carteirinha.aluno', function ($q) use ($search) {
                $q->where('nome', 'LIKE', "%{$search}%");
            });
        }

        $pagamentos = $query->paginate(10);

        return view('pagamentos.index', compact('pagamentos'));
    }

    public function create()
    {
        $carteirinhas = Carteirinha::all();
        return view('pagamentos.create', compact('carteirinhas'));
    }

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
        return redirect()->route('pagamentos.index')->with('success', 'Pagamento criado com sucesso.');
    }

    public function show(Pagamento $pagamento)
    {
        return view('pagamentos.show', compact('pagamento'));
    }

    public function edit(Pagamento $pagamento)
    {
        $carteirinhas = Carteirinha::all();
        return view('pagamentos.edit', compact('pagamento', 'carteirinhas'));
    }

    public function update(Request $request, Pagamento $pagamento)
    {
        $request->validate([
            'carteirinha_id' => 'required|exists:carteirinhas,id',
            'valor' => 'required|numeric|min:0',
            'data_pagamento' => 'required|date',
        ]);

        $pagamento->update($request->all());
        return redirect()->route('pagamentos.index')->with('success', 'Pagamento atualizado com sucesso!');
    }

    public function destroy(Pagamento $pagamento)
    {
        $pagamento->delete();
        return redirect()->route('pagamentos.index')->with('success', 'Pagamento excluído com sucesso!');
    }
}
