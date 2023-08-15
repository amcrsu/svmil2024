<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guarnicao extends Model
{
    protected $table = 'guarnicoes';

    public function guarnicao(){
        return $this->hasMany('App\Guarnicao', 'Id');
    }
}
