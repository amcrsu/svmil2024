<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubArea extends Model
{
    protected $table = 'subareas';

    public function inscricoes(){
        return $this->hasMany('App\Inscricao', 'inscricaoId');
    }
}
