<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use Illuminate\Http\Request;

class EixoController extends Controller
{
    public function index()
    {
        $data = Eixo::all();
        return view('eixos.index', (['eixos' => $data]));
    }

    public function create(Request $request)
    {
        return view('eixos.create');
    }

    public function store(Request $request)
    {
        Eixo::create([
            "nome" => $request->nome,
        ]);

        return redirect()->route('eixos.index');
    }

    public function show($id)
    {
        $dados = Eixo::find($id);
        return view('eixos.show', compact('dados'));
    }

    public function edit($id)
    {
        $dados = Eixo::find($id);
        return view('eixos.edit', compact('dados'));
    }

    public function update(Request $request, $id)
    {
        $reg = Eixo::find($id);
        $reg->fill([
            "nome" => $request->nome,
        ]);
        $reg->save();

        return redirect()->route('eixos.index');
    }

    public function destroy($id)
    {
        /* $obj = Eixo::find($id);
        $obj->delete(); */
        
        return view('eixos.destroy');
    }
}