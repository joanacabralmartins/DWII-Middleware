<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disciplina extends Model
{
    protected $fillable = ['nome','carga','curso'];
    use SoftDeletes;
    use HasFactory;

    public function aluno() {
        return $this->hasMany('\App\Models\Aluno');
    }

    public function curso() {
        return $this->belongsTo('App\Models\Curso');
    }

    public function professor() {
        return $this->belongsTo('App\Models\Prof');
    }
}
