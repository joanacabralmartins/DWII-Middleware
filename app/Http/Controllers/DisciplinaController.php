<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index()
    {
        $disciplinas = Disciplina::with(['curso'])->get();
        return view('disciplinas.index', compact(['disciplinas']));
    }

    public function create(Request $request)
    {
        $dados = Curso::all();
        return view('disciplinas.create',(['cursos'=>$dados]));
    }

    public function store(Request $request)
    {
        $obj_curso = new Curso();
        $obj_curso = $request->curso;

        $obj_disciplina = new Disciplina();
        $obj_disciplina->nome = mb_strtoupper($request->nome, 'UTF-8'); 
        $obj_disciplina->carga = $request->carga;       
        $obj_disciplina->curso()->associate($obj_curso);
        $obj_disciplina->save();
        
        return redirect()->route('disciplinas.index');
    }

    public function show($id)
    {
        $dados = Disciplina::find($id);
        return view('disciplinas.show', compact('dados'));
    }

    public function edit($id)
    {
        $cursos = Curso::all();
        $dados = Disciplina::find($id);
        return view('disciplinas.edit', compact(['dados','cursos']));

    }

    public function update(Request $request, $id)
    {
        $obj_curso = new Curso();
        $obj_curso = $request->curso;
        $obj_disciplina = Disciplina::find($id);
        
        $obj_disciplina->nome = mb_strtoupper($request->nome, 'UTF-8'); 
        $obj_disciplina->carga = $request->carga;       
        $obj_disciplina->curso()->associate($obj_curso);
        $obj_disciplina->save();

        return redirect()->route('disciplinas.index');
    }

    public function destroy($id)
    {
        /* $obj = Disciplina::find($id);
        $obj->delete(); */
        
        return view('disciplinas.destroy');
    }
}