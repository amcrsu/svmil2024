<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificacao extends Model
{
    protected $table = "certificacoes";

    public function tipoTitulo(){
        return $this->belongsTo('App\TipoTitulo', 'tipoTituloId');
    }
}
