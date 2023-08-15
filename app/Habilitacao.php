<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilitacao extends Model
{
    protected $table = "habilitacoes";

    public function inscricoes(){
        return $this->hasMany('App\Inscricao', 'inscricaoId');
    }

    public function tipoTitulo(){
        return $this->belongsTo('App\TipoTitulo', 'tipoTituloId');
    }
}
