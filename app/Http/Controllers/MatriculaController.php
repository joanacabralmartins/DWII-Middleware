<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Disciplina;
use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        
    }

    public function create($id)
    {
        //
    }

    public function store(Request $request)
    {
        $aluno = Aluno::find($request->aluno); 

        $disciplinas = $request->disciplinas;
        
        if(isset($disciplinas)) {
            foreach($disciplinas as $item) {
                $obj_disciplina = Disciplina::find($item);
                if(isset($obj_disciplina)) {
                    $obj_matricula = new Matricula();
                    $obj_matricula->aluno()->associate($aluno);
                    $obj_matricula->disciplina()->associate($obj_disciplina);
                    $obj_matricula->save();
                }
            } 
        }
        
        return redirect()->route('alunos.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $aluno = Aluno::find($id);
        $disciplinas = Disciplina::all();
        return view('matriculas.index', compact(['aluno', 'disciplinas'])); 
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
