<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Docencia;
use App\Models\Eixo;
use App\Models\Prof;
use Illuminate\Http\Request;

class ProfController extends Controller {
    
   
    public function index()
    {
        $profs = Prof::with(['eixo'])->get();

        return view('profs.index', compact(['profs']));
    }

    public function create(Request $request)
    {
        $dados = Eixo::all();
        return view('profs.create', (['eixos' => $dados])); 
    }

    public function store(Request $request)
    {
        $obj_eixo = new Eixo();
        $obj_eixo = $request->eixo;

        $obj_prof = new Prof();
        $obj_prof->nome = mb_strtoupper($request->nome, 'UTF-8'); 
        $obj_prof->ativo = $request->ativo;  
        $obj_prof->email = $request->email;   
        $obj_prof->siape = $request->siape;  
        $obj_prof->eixo()->associate($obj_eixo);
        $obj_prof->save();

        return redirect()->route('profs.index');
    }


    public function show($id)
    {
        $dados = Prof::find($id);
        return view('profs.show', compact('dados'));
    }


    public function edit($id)
    {
        $eixos = Eixo::all();
        $dados = Prof::find($id);
        return view('profs.edit', compact(['dados','eixos']));
    }


    public function update(Request $request, $id)
    {
        $obj_eixo = new Eixo();
        $obj_eixo = $request->eixo;
        $obj_prof = Prof::find($id);

        $obj_prof->nome = mb_strtoupper($request->nome, 'UTF-8'); 
        $obj_prof->ativo = $request->ativo;  
        $obj_prof->email = $request->email;   
        $obj_prof->siape = $request->siape;  
        $obj_prof->eixo()->associate($obj_eixo);
        $obj_prof->save();

        return redirect()->route('profs.index');
    }

    public function destroy($id)
    {
        /* $obj = Prof::find($id);
        $obj->delete(); */
        
        return view('profs.destroy');
    }
}
