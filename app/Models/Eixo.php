<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Eixo extends Model
{
    protected $fillable = ['nome'];
    use SoftDeletes;
    use HasFactory;

    public function curso() {
        return $this->hasMany('App\Models\Curso');
    }

    public function professor() {
        return $this->hasMany('App\Models\Prof');
    }
}
