<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ValidacaoController extends Controller
{
    public function validacoesCPF($cpf){
        $resultado = array(
            'error' => false,
            'error_msg' => ''
        );

        if (!$this->validarCPF($cpf)) {
            $resultado = array(
                'error' => true,
                'error_msg' => 'CPF inválido.'
            );
        } else {
            if($this->verificarCadastro($cpf)) {
                $resultado = array(
                    'error' => true,
                    'error_msg' => 'Este CPF já está cadastrado. Por favor, retorne para a tela anterior e efetue o login.'
                );  
            }
        }

        return json_encode($resultado);
    }

    public function validacoesEmail($email) {
        $resultado = array(
            'error' => false,
            'error_msg' => ''
        );

        $count = User::where('email', '=', $email)->count();
        if($count > 0) {
            $resultado = array(
                'error' => true,
                'error_msg' => 'Este E-mail já está cadastrado. Por favor, retorne para a tela anterior e efetue o login.'
            );  
        }

        return json_encode($resultado);
    }

    public function validarCPF($value){
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

    public function verificarCadastro($cpf){
        $count = User::where('cpf', $cpf)->count();
        if($count > 0)
            return true;
        else
            return false;
    }
}
