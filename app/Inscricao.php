<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    protected $table = "inscricoes";
    public $pontuacaoTotal;

    public function categoria(){
        return $this->belongsTo('App\Categoria', 'categoriaId');
    }

    public function area(){
        return $this->belongsTo('App\Area', 'areaId');
    }
    
    public function guarnicao(){
        return $this->belongsTo('App\Guarnicao', 'guaId');
    }

    public function subarea(){
        return $this->belongsTo('App\SubArea', 'subareaId');
    }

    public function user(){
        return $this->belongsTo('App\User', 'userId');
    }
}
