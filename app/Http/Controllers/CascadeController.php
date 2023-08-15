<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubArea;
use App\Area;
use App\Guarnicao;
use App\Cidade;

class CascadeController extends Controller
{
    public function carregarSubAreas($id){
        $listaSubareas = SubArea::where('areaId', $id)->orderBy('subarea', 'asc')->get();
        return json_encode($listaSubareas);
    }

    public function carregarAreas($id, $sexo){
        //2
        //52
        if($id == 2 && $sexo == 'M'){
            $listaAreas = Area::where('categoriaId', $id)->where('id', '!=', 52)->orderBy('area', 'asc')->get();    
        } else { 
            $listaAreas = Area::where('categoriaId', $id)->orderBy('area', 'asc')->get();
        }
        return json_encode($listaAreas);
    }

    public function carregarCidades($id){
        $listaCidades = Cidade::where('estadoId', $id)->get();
        return json_encode($listaCidades);
    }
    /*
        1 = FORTALEZA-CE
        2 = TERESINA-PI
        3 = PICOS-PI
    */

    public function carregarGuarnicao($id){
        switch((int)$id) {
            case 1: $idGuarnicao = [1,2,3]; break; //Motorista 
            case 2: $idGuarnicao = [1,3]; break; //Aux Mec Eletr
            case 3: $idGuarnicao = [1]; break;  //Aux Mec Diesel
            case 4: $idGuarnicao = [1]; break;  //Aux Refri
            case 5: $idGuarnicao = [1,2]; break;  //Mus Tuba Sib
            case 6: $idGuarnicao = [2]; break;  //Mus Clarinet
            case 7: $idGuarnicao = [1]; break;  //Mus Trombone Tenor em Sib
            case 8: $idGuarnicao = [1]; break;  //Mus Tímp Bumbo
            case 9: $idGuarnicao = [2]; break;  //Mus Horn e, Sib, Fa e Mib
            case 10: $idGuarnicao = [2]; break; //Mus Caixa Surda
            case 11: $idGuarnicao = [2]; break; //Mus Tuba Mib
            case 12: $idGuarnicao = [1,2]; break; //Mus Pratos
            case 13: $idGuarnicao = [1,2]; break; //Mus Tarol
            case 14: $idGuarnicao = [2,3]; break; //Aux Mec Vtr
            case 15: $idGuarnicao = [2]; break; //Mec Equip Eng
        }

        $guarnicoes = Guarnicao::whereIn('id', $idGuarnicao)->get();

        return json_encode($guarnicoes);
    }

    // public function carregarGuarnicao($id){
    //     $listaGuarnicao = Guarnicao::where('guarnicao', $id)->get();
    //     return json_encode($listaGuarnicao);
    // }
    
}
