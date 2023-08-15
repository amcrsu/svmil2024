<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Estado;
use App\EstadoCivil;
use App\Cidade;
use App\TipoDocMilitar;
use App\Forca;
use App\Categoria;
use App\Area;
use App\Guarnicao;
use App\SubArea;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function showFormDadosGerais(Request $request) {
        if(!$this->validarCPF($request['cpf'])) {
            \Session::flash('mensagem', ['msg'=>'O CPF informado não é válido!', 'class'=>'danger']);
            return redirect()->back()->withInput();
        } else {
            $cpf = str_replace([".","-"], "", $request['cpf']);
            if(User::where('cpf', $cpf)->count() > 0) {
                \Session::flash('mensagem', ['msg'=>'O CPF informado já está cadastrado! Volte para a tela inicial e efetue seu login.', 'class'=>'danger']);
                return redirect()->back()->withInput();
            } else {
                $ufList = Estado::all();
                $estadosCivisList = EstadoCivil::all();
                $cidadesList = Cidade::all();
                $tiposDocMilList = TipoDocMilitar::all();
                $forcaList = Forca::all();
                $categoriaList = Categoria::all();
                

                return view('dadosGerais', compact('cpf', 'ufList', 'estadosCivisList', 'cidadesList', 'tiposDocMilList', 'forcaList', 'categoriaList'));
            }
        }
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

    public function carregarCidades($id){
        $listaCidades = Cidade::where('estadoId', $id)->get();
        return json_encode($listaCidades);
    }

    public function carregarAreas($id){
        $listaAreas = Area::where('categoriaId', $id)->get();
        return json_encode($listaAreas);
    }
    
    public function carregarGuarnicoes($id){
        $guarnicaoList = Guarnicao::where('guarnicao', $id)->get();
        return json_encode($guarnicaoList);
    }

    public function carregarSubareas($id){
        $listaSubAreas = SubArea::where('areaId', $id)->get();
        return json_encode($listaSubAreas);
    }

    public function verificarCPFCadastrado($cpf) {

    }
}
