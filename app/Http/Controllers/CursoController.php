<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Eixo;
use Illuminate\Http\Request;

class CursoController extends Controller {
    
    public function index()
    {
        $dados = Curso::all();
        return view('cursos.index', (['cursos' => $dados]));
    }

    public function create(Request $request)
    {
        $dados = Eixo::all();
        return view('cursos.create',(['eixos' => $dados]));
    }

    public function store(Request $request)
    {
        $obj_eixo = new Eixo();
        $obj_eixo = $request->eixo;

        $obj_curso = new Curso();
        $obj_curso->nome = mb_strtoupper($request->nome, 'UTF-8'); 
        $obj_curso->sigla = mb_strtoupper($request->sigla, 'UTF-8');  
        $obj_curso->ano = $request->ano;     
        $obj_curso->eixo()->associate($obj_eixo);
        $obj_curso->save();

        return redirect()->route('cursos.index');
    }

    public function show($id)
    {
        $dados = Curso::find($id);
        return view('cursos.show', compact(['dados']));

    }

    public function edit($id)
    {
        $eixos = Eixo::all();
        $dados = Curso::find($id);
        
        return view('cursos.edit', compact(['dados','eixos']));
    }

    public function update(Request $request, $id)
    {
        $obj_eixo = new Eixo();
        $obj_eixo = $request->eixo;
        $obj_curso = Curso::find($id);

        $obj_curso->nome = mb_strtoupper($request->nome, 'UTF-8'); 
        $obj_curso->sigla = mb_strtoupper($request->sigla, 'UTF-8'); 
        $obj_curso->ano = $request->ano;   
        $obj_curso->eixo()->associate($obj_eixo);
        $obj_curso->save();

        return redirect()->route('cursos.index');
    }

    public function destroy($id)
    {
       /*  $obj = Curso::find($id);
        $obj->delete(); */

        return view('cursos.destroy');
    }
}
