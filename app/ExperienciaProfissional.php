<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienciaProfissional extends Model
{
    protected $table = "experiencias";

    public function inscricoes(){
        return $this->hasMany('App\Inscricao', 'inscricaoId');
    }

    public function tipoTitulo(){
        return $this->belongsTo('App\TipoTitulo', 'tipoTituloId');
    }
}
