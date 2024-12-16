<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'responsavel' => 'required|string|max:255',
            'contato_responsavel' => 'required|string|max:255',
        ]);

        $aluno = Aluno::create($request->all());
        return redirect()->route('alunos.index')->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function update(Request $request, Aluno $aluno)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'responsavel' => 'required|string|max:255',
            'contato_responsavel' => 'required|string|max:255',
        ]);

        $aluno->update($request->all());
        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso!');
    }
}
