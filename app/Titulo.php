<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    protected $table = "titulos";

    public function inscricoes(){
        return $this->hasMany('App\Inscricao', 'inscricaoId');
    }

    public function tipoTitulo(){
        return $this->belongsTo('App\TipoTitulo', 'tipoTituloId');
    }
}
