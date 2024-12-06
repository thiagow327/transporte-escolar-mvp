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
            'aluno_nome' => 'required|string|max:255',
            'aluno_idade' => 'required|integer',
            'responsavel' => 'required|string|max:255',
            'contato_responsavel' => 'required|string|max:255',
            'vencimento_dia' => 'required|integer|min:1|max:31',
            'escola' => 'required|string|max:255',
            'horario' => 'required|in:manha,tarde',
        ]);

        $aluno = Aluno::create([
            'nome' => $validated['aluno_nome'],
            'idade' => $validated['aluno_idade'],
            'responsavel' => $validated['responsavel'],
            'contato_responsavel' => $validated['contato_responsavel'],
        ]);

        Carteirinha::create([
            'aluno_id' => $aluno->id,
            'vencimento_dia' => $validated['vencimento_dia'],
            'escola' => $validated['escola'],
            'horario' => $validated['horario'],
        ]);

        return redirect()->route('carteirinhas.index')->with('success', 'Carteirinha e aluno criados com sucesso!');
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
        $aluno = $carteirinha->aluno;
        $carteirinha->delete();
        $aluno->delete();

        return redirect()->route('carteirinhas.index')->with('success', 'Carteirinha e aluno excluídos com sucesso!');
    }
}
