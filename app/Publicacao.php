<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    protected $table = "publicacoes";

    public function inscricoes(){
        return $this->hasMany('App\Inscricao', 'inscricaoId');
    }

    public function tipoTitulo(){
        return $this->belongsTo('App\TipoTitulo', 'tipoTituloId');
    }
}
