@extends('layouts.app')
@section('content')
<h2 class="section-title">Minhas Inscrições</h2>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
        @if($novaInscricao == 'true')      <!-- HABILITAR BOTÃO NOVA INSCRIÇÃO (HIDE/SHOW)-->  
        <a href="{{route('candidato.novaInscricao')}}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="false"></i> Nova Inscrição</a><br /><br /><hr />
        @endif
        @if($listaInscricoes->count())
            <div class="portlet box primary">
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Cod Inscrição</th>
                                    <th>Nível</th>
                                    <th>Área</th>
                                    <th>Guarni&ccedil;&atilde;o</th>
                                    <th>Gerar GRU<br/>passo-a-passo</th>
                                    <th>Gerar GRU<br/>Acesso ao Sistema</th>
                                    <th>Imprimir<br/>Ficha de Inscrição</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listaInscricoes as $inscricao)
                                <tr>
                                    <td>{{$inscricao->codInscricao}}</td>
                                    <td>{{$inscricao->categoria->categoria}}</td>
                                    <td>{{$inscricao->area->area}}</td>
                                    <td>{{$inscricao->guarnicao}}</td>
                                    

                                    <td><a href="{{asset('docs/TUTORIAL_EMISSAO_GRU_CET_2024.pdf')}}" target="_blank" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span> VER PASSO-A-PASSO</a></td>
                                    <td><a href="https://www.10rm.eb.mil.br/pagtesouro/" class="btn btn-success btn-xs" target="_blank"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> GERAR GRU</a></td>
                                    <!-- <td>{{isset($inscricao->subarea->subarea) ? $inscricao->subarea->subarea : ''}}
                                    </td>                            
                                    <td> -->
                                        <td>
                                    <a href="{{route('candidato.gerarFicha', ['id'=>Crypt::encrypt($inscricao->id)])}}" target="_blank" tooltip="Ficha de Inscrição" class="btn btn-info btn-xs"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> IMPRIMIR</a>
                                    </td> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
        <p class="alert alert-info" align="center">Nenhuma Inscrição Encontrada</p>
        @endif
        </div>
    </div>
</div>
@endsection