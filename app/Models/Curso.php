<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    protected $fillable = ['nome','sigla','ano','eixo'];
    use SoftDeletes;
    use HasFactory;

    public function eixo() {
        return $this->belongsTo('App\Models\Eixo');
    }

    public function disciplina() {
        return $this->hasMany('App\Models\Disciplina');
    }

    public function aluno() {
        return $this->hasMany('App\Models\Aluno');
    }
}
