<?php

namespace App\Http\Controllers;

use App\Models\Carteirinha;
use App\Models\Aluno;
use Illuminate\Http\Request;

class CarteirinhaController extends Controller
{
    public function index(Request $request)
    {
        $query = Carteirinha::query();

        if ($request->filled('escola')) {
            $query->where('escola', 'LIKE', '%' . $request->escola . '%');
        }

        if ($request->filled('horario')) {
            $query->where('horario', $request->horario);
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
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'idade' => 'required|integer',
            'vencimento_dia' => 'required|integer|min:1|max:31',
            'escola' => 'required|string|max:255',
            'horario' => 'required|in:manha,tarde',
        ]);

        Carteirinha::create($validated);

        return redirect()->route('carteirinhas.index')->with('success', 'Carteirinha criada com sucesso!');
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
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'idade' => 'required|integer',
            'vencimento_dia' => 'required|integer|min:1|max:31',
            'escola' => 'required|string|max:255',
            'horario' => 'required|in:manha,tarde',
        ]);

        $carteirinha->update($validated);

        return redirect()->route('carteirinhas.index')->with('success', 'Carteirinha atualizada com sucesso!');
    }

    public function destroy(Carteirinha $carteirinha)
    {
        $carteirinha->delete();
        return redirect()->route('carteirinhas.index')->with('success', 'Carteirinha excluída com sucesso!');
    }
}
