<?php

namespace App\Http\Controllers;

use App\Models\Carteirinha;
use App\Models\Aluno;
use Illuminate\Http\Request;

class CarteirinhaController extends Controller
{
    public function index(Request $request)
    {
        $query = Carteirinha::with('aluno');

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->whereHas('aluno', function ($q) use ($search) {
                $q->where('nome', 'LIKE', "%{$search}%");
            });
        }

        $carteirinhas = $query->paginate(10);

        return view('carteirinhas.index', compact('carteirinhas'));
    }

    public function create()
    {
        $alunos = Aluno::all();
        return view('carteirinhas.create', compact('alunos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'vencimento_dia' => 'required|date',
        ]);

        Carteirinha::create($request->all());
        return redirect()->route('carteirinhas.index')->with('success', 'Carteirinha cadastrada com sucesso!');
    }

    public function show(Carteirinha $carteirinha)
    {
        $carteirinha = Carteirinha::with(['aluno', 'pagamentos'])->findOrFail($carteirinha->id);
        return view('carteirinhas.show', compact('carteirinha'));
    }

    public function edit(Carteirinha $carteirinha)
    {
        $alunos = Aluno::all();
        return view('carteirinhas.edit', compact('carteirinha', 'alunos'));
    }

    public function update(Request $request, Carteirinha $carteirinha)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'vencimento_dia' => 'required|date'
        ]);

        $carteirinha->update($request->all());
        return redirect()->route('carteirinhas.index')->with('success', 'Carteirinha atualizada com sucesso!');
    }

    public function destroy(Carteirinha $carteirinha)
    {
        $carteirinha->delete();
        return redirect()->route('carteirinhas.index')->with('success', 'Carteirinha excluída com sucesso!');
    }
}
