<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        $dados = Aluno::all();
        return view('alunos.index', compact(['dados'])); 
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('alunos.create', compact(['cursos']));
    }

    public function store(Request $request)
    {
        $obj_curso = new Curso();
        $obj_curso = $request->curso;

        $obj_aluno = new Aluno();
        $obj_aluno->nome = mb_strtoupper($request->nome, 'UTF-8');   
        $obj_aluno->curso()->associate($obj_curso);
        $obj_aluno->save();

        return redirect()->route('alunos.index');
    }

    public function show(string $id)
    {
        return view('alunos.show');
    }

    public function edit(string $id)
    {
        $cursos = Curso::all();
        $aluno = Aluno::find($id);
        
        return view('alunos.edit', compact(['cursos','aluno']));
    }

    public function update(Request $request, string $id)
    {
        $obj_curso = new Curso();
        $obj_curso = $request->curso;
        $obj = Aluno::find($id);

        $obj->nome = mb_strtoupper($request->nome, 'UTF-8');   
        $obj->curso()->associate($obj_curso);
        $obj->save();

        return redirect()->route('alunos.index');
    }

    public function destroy(string $id)
    {
        /* $obj = Aluno::find($id);
        $obj->delete(); */
        
        return view('alunos.destroy');
    }
}
