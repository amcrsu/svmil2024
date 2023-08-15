@extends('layouts.app')
@section('content')
<div class="alert alert-warning" role="alert" >
    <div class="container">
        <h2 align="center">Leia atentamente as informações abaixo!</h2>
        <h5># Perceba que esta página está divida em seções;</h5>
        <h5># Em cada seção existem campos a preencher, conforme suas informações;</h5>
        <h5># Após o preenchimento dos dados da seção, clique no botão [INCLUIR...] para salvar, TEMPORARIAMENTE, os dados preenchidos;</h5>
        <h5># Após o preenchimento de todos os seus dados, finalize a inscrição clicando no botão [FINALIZAR INSCRIÇÃO] localizado no final desta página;</h5>
        <h5># Somente [CONCLUA a INSCRIÇÃO] se tiver a certeza que incluiu todos os seus dados corretamente;</h5>
        <h5># Uma vez FINALIZADO a inscrição, o candidato NÃO poderá mais incluir, editar e/ou remover qualquer informação de suas Habilitações e Dados Profissionais.</h5>

    </div>
</div>
<h2 class="section-title">Cadastro de Habilitações e Dados Profissionais</h2>
<p class="desc" align="center">Comando da 10ª Região Militar - Região Martim Soares Moreno</p>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Habilitação Mínima Exigida (na Área de Interesse pretendida)</h4>
                </div>
                <div class="panel-body">
                    <p>
                    <?php $disabled = "1"; $incluirHabilitacao = "0"; ?>
                    @if($inscricao->categoria->id == 3 AND $listaHabilitacoes->count() == 1) 
                        <?php $disabled = "0"; $incluirHabilitacao = "1"; ?>
                        @if(isset($listaHabilitacoes))
                            @if(($inscricao->area->id >= 54) and ($inscricao->area->id <= 58) and ($listaHabilitacoes->count() == 1))
                        <!-- regra para habilitar o botão "Finalizar Inscrição" -->
                            @elseif(($inscricao->area->id >= 54) AND ($inscricao->area->id <= 58 and $listaHabilitacoes->count() == 1))
                            <?php $disabled = "0"; $incluirHabilitacao = "1"; ?>
                            @endif
                        @endif
                    @endif
                    <form class="form-horizontal" method="post" action="{{route('candidato.addHabilitacao')}}">
                    {{csrf_field()}}
                        <input type="hidden" name="idInscricao" value="{{$id}}">
                        @include('habilitacoes._habilitacoes')
                    </form>
                    </p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Certificados / Títulos / Diplomas / Habilitações (na Área de Interesse pretendida)</h4>
                </div>
                <div class="panel-body">
                    <p>
                    <form class="form-horizontal" method="post" action="{{route('candidato.addTitulo')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="idInscricao" value="{{$id}}">
                    @include('habilitacoes._titulos')
                    </form>
                    </p>
                </div>
            </div>  

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Cursos/Outras habilitações (na Área de Interesse pretendida)</h4>
                </div>
                <div class="panel-body">
                    <p>
                    <form class="form-horizontal" method="post" action="{{route('candidato.addCurso')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="idInscricao" value="{{$id}}">
                    @include('habilitacoes._cursos')
                    </form>
                    </p>
                </div>
            </div>
            <!-- INICIO DA AREA DE CERTIFICAÇÃO, APENAS PARA OTT/STT -->
            @if($inscricao->categoria->id != 3)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Certificações (na Área de Interesse pretendida)</h4>
                </div>
                <div class="panel-body">
                    <p>
                    <form class="form-horizontal" method="post" action="{{route('candidato.addCertificado')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="idInscricao" value="{{$id}}">
                    @include('habilitacoes._certificacoes')
                    </form>
                    </p>
                </div>
            </div>
            @endif
        <!-- FIM DA AREA DE CERTIFICAÇÃO, APENAS PARA OTT/STT -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Publicações Técnicas (na Área de Interesse pretendida)</h4>
                </div>
                <div class="panel-body">
                    <p>
                    <form class="form-horizontal" method="post" action="{{route('candidato.addPublicacao')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="idInscricao" value="{{$id}}">
                    @include('habilitacoes._publicacoes')
                    </form>
                    </p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Exercício de Atividade Profissional (na Área de Interesse pretendida)</h4>
                </div>
                <div class="panel-body">
                   <p>
                   <form class="form-horizontal" method="post" action="{{route('candidato.addExperiencia')}}">
                    {{csrf_field()}}
                   <input type="hidden" name="idInscricao" value="{{$id}}">
                    @include('habilitacoes._experiencia')
                    </form>
                    </p>
                </div>
            </div>
            <hr />
            
            <button class="btn btn-primary pull-right" {{$disabled == "1" ? "disabled" : ""}} type="button" data-toggle="modal" data-target="#modalConfirmacao"><i class="fa fa-floppy-o" aria-hidden="true"></i> Finalizar Inscrição</button>
            <br /><br /><br />
            <!-- Modal -->
            <div class="modal fade" id="modalConfirmacao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Finalizar Inscrição</h4>
                    </div>
                    <div class="modal-body">
                        Todos os seus dados estão corretos? Após finalizar a inscrição, os mesmos não poderão mais ser alterados.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Alterar Dados</button>
                        <a href="{{route('candidato.finalizar', ['id'=>Crypt::encrypt($id)])}}" class="btn btn-primary">Concluir Inscrição</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection
@section('javaScript')
<script src="{{asset('js/habilitacoes.js')}}"></script>
@endsection