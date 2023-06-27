<?php

use App\Http\Middleware\Mid;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('templates.main')->with('titulo', "");
})->name('index');

Route::get('denied', function () {
    return view('permissoes.denied');
})->name('denied');

Route::resource('cursos', 'CursoController')
    ->middleware('mid: 3');

Route::resource('eixos', 'EixoController')
    ->middleware('mid: 3');

Route::resource('disciplinas', 'DisciplinaController')
    ->middleware('mid: 3');

Route::resource('profs', 'ProfController')
    ->middleware('mid: 3');

Route::resource('alunos', 'AlunoController')
    ->middleware('mid: 3');

Route::resource('matriculas', 'MatriculaController')
    ->middleware('mid: 3');  