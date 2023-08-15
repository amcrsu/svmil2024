<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    public function inscricoes(){
        return $this->hasMany('App\Inscricao', 'inscricaoId');
    }
}
