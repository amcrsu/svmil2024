<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = "cursos";

    public function inscricoes(){
        return $this->hasMany('App\Inscricao', 'inscricaoId');
    }

    public function tipoTitulo(){
        return $this->belongsTo('App\TipoTitulo', 'tipoTituloId');
    }
}
