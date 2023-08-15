<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'senha', 'email', 'nomePai', 'nomeMae', 'cpf', 'altura', 'sexo', 'rg', 'numDependentes', 'dtNascimento', 'endereco', 'numero', 'bairro',
        'cep', 'complemento', 'telFixo', 'telCelular', 'anosSvPub', 'mesesSvPub', 'diasSvPub', 'idtMil', 'situacaoId',
        'orgaoExpedidor', 'estadoCivilId', 'tipoDocMilId', 'forcaDocMilitarId', 'cidadeEndId', 'cidadeNascId', 'forcaId',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'senha', 
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['senha'] = bcrypt($password);
    }

    public function getAuthPassword() {
        return $this->senha;
    }

    public function getRedirect()
    {
        /*if (Auth::user() && Auth->user()->isStudent()) {
            return redirect("/studentPanel");
        } else if(Auth::user() && Auth->user()->isTeacher()) {
            return redirect("/teacherPanel");
        } else {
            return redirect("/auth/login");
        }*/

        return redirect('/candidato/dashboard');
    }

    public function inscricoes(){
        return $this->hasMany('App\Inscricao', 'inscricaoId');
    }

    public function cidadeNascimento(){
        return $this->belongsTo('App\Cidade', 'cidadeNascId');
    }

    public function estadoCivil(){
        return $this->belongsTo('App\EstadoCivil', 'estadoCivilId');
    }

    public function cidadeEndereco(){
        return $this->belongsTo('App\Cidade', 'cidadeEndId');
    }

    public function tipoDocMilitar(){
        return $this->belongsTo('App\TipoDocMilitar', 'tipoDocMilId');
    }

    public function forcaExpedidora(){
        return $this->belongsTo('App\Forca', 'forcaId');
    }

    public function situacao(){
        return $this->belongsTo('App\Situacao', 'situacaoId');
    }
}
