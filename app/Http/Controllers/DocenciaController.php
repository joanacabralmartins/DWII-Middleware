<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Docencia;
use App\Models\Prof;
use Illuminate\Http\Request;

class DocenciaController extends Controller {
    
    public function index()
    {
        $disciplinas = Disciplina::all();
        $professores = Prof::where('ativo','=', '1')-> get();
        return view('docencia.index', compact(['disciplinas','professores'])); 
    }

    public function create(Request $request)
    {
        //
    }

    public function store(Request $request)
    {
        $docencia = $request->professores;

        if (isset($docencia)) {
            foreach ($docencia as $item) {
                $dados = explode("_", $item);
                $disciplina = Disciplina::find($dados[0]);

                if (isset($dados[1])) {
                    $professor = Prof::find($dados[1]);

                    Docencia::firstOrCreate([
                        'professor' => $professor->id,
                        'disciplina' => $disciplina->id
                        ], [
                        'professor' => $professor->id,
                        'disciplina' => $disciplina->id
                    ]);
                }
            }
        }

        return redirect()->route('docencia.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}