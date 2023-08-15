<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Estado;
use App\EstadoCivil;
use App\TipoDocMilitar;
use App\Forca;
use App\Categoria;
use App\Guarnicao;
use App\Situacao;
use App\User;

class InscricaoController extends Controller
{
    public function getIndexForm(){
        return view('index');
    }

    public function getNovoCandidatoForm(){
        $ufList = Estado::all();
        $estadosCivisList = EstadoCivil::all();
        $tiposDocMilList = TipoDocMilitar::all();
        $forcaList = Forca::all();
        $categoriaList = Categoria::where('id','=', 3)->get();
        //$categoriaList = Categoria::orderBy('categoria', 'asc')->get();
        $guarnicaoList = Guarnicao::all();
        $situacaoList = Situacao::all();

        return view('novoCandidato', compact('ufList', 'estadosCivisList', 'tiposDocMilList', 'forcaList', 'categoriaList', 'guarnicaoList', 'situacaoList'));
    }

    public function verificarCPFCadastrado($cpf){
        $count = User::where('cpf', $cpf)->count();
        if($count > 0)
            return true;
        else
            return false;
    }

    public function validarCPF($value) {
        $cpf = preg_replace('/\D/', '', $value);
        $num = array();

        for($i=0; $i<(strlen($cpf)); $i++) {
            $num[]=$cpf[$i];
        }

        if(count($num)!=11) {
            return false;
        }else {
            for($i=0; $i<10; $i++) {
                if ($num[0]==$i && $num[1]==$i && $num[2]==$i
                && $num[3]==$i && $num[4]==$i && $num[5]==$i
                && $num[6]==$i && $num[7]==$i && $num[8]==$i) {
                return false;
                break;
                }
            }
        }
         
        $j=10;
        for($i=0; $i<9; $i++) {
            $multiplica[$i] = $num[$i]*$j;
            $j--;
        }
        $soma = array_sum($multiplica);
        $resto = $soma%11;
        if($resto<2) {
            $dg=0;
        }
        else {
            $dg=11-$resto;
        }
        
        if($dg!=$num[9]){
            return false;
        }
        
        $j=11;
        for($i=0; $i<10; $i++) {
            $multiplica[$i]=$num[$i]*$j;
            $j--;
        }

        $soma = array_sum($multiplica);
        $resto = $soma%11;
        if($resto<2){
            $dg=0;
        }
        else {
            $dg=11-$resto;
        }
        if($dg!=$num[10]) {
            return false;
        }

        return true;
    }
}
