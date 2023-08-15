@extends('layouts.app')
@section('content')
<h2 class="section-title">Cadastro dos Dados Gerais</h2>
<p class="desc" align="center">Comando da 10ª Região Militar - Região Martim Soares Moreno</p>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    <i class="fa fa-universal-access" aria-hidden="true"></i> Dados Gerais
                    </h3>
                </div>
                <div class="panel-body form-horizontal">
                    <div class="form-group">
                        <label for="nome" class="col-sm-2 control-label">Nome Completo:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{$usuario->nome}}" disabled>
                        </div>
                    </div>
		    <div class="form-group">
			<label for="cpf" class="col-sm-2 control-label">CPF:</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" value="{{$usuario->cpf}}" disabled>
			</div>
		    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">E-mail:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" value="{{$usuario->email}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomePai" class="col-sm-2 control-label">Nome do Pai:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{$usuario->nomePai}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nomeMae" class="col-sm-2 control-label">Nome da Mãe:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{$usuario->nomeMae}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="numDependentes" class="col-sm-2 control-label">Nº de Dependentes:</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="{{$usuario->numDependentes}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sexo" class="col-sm-2 control-label">Sexo:</label>
                        <div class="col-sm-2">
                            @if($usuario->sexo == 'F')
                            <input type="text" class="form-control" value="Feminino" disabled>
                            @else
                            <input type="text" class="form-control" value="Masculino" disabled>
                            @endif
                        </div>
                        <label for="altura" class="col-sm-2 control-label">Altura:</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="{{$usuario->altura}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rg" class="col-sm-2 control-label">RG:</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="{{$usuario->rg}}" disabled>
                        </div>
                        <label for="orgaoExpedidor" class="col-sm-2 control-label">Órgão Expedidor:</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="{{$usuario->orgaoExpedidor}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="estadoCivilId" class="col-sm-2 control-label">Estado Civil:</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="{{$usuario->estadoCivil->estadoCivil}}" disabled>
                        </div>
                        <label for="situacaoId" class="col-sm-2 control-label">Situação:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{$usuario->situacao->situacao}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dtNascimento" class="col-sm-2 control-label">Data de Nascimento:</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="{{$usuario->dtNascimento}}" disabled>
                        </div>
                        <label for="ufNascimentoId" class="col-sm-2 control-label">UF Nascimento/Cidade Nascimento:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{$usuario->cidadeNascimento->estado->sigla}} / {{$usuario->cidadeNascimento->cidade}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="svPub" class="col-sm-2 control-label">Tempo de Serviço Público Anterior:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{$usuario->anosSvPub}} ano(s), {{$usuario->mesesSvPub}} mês(es), {{$usuario->diasSvPub}} dia(s)" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipoDocMilitarId" class="col-sm-2 control-label">Possui Documento Militar ?:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{$usuario->tipoDocMilitar->tipoDocumento}}" disabled>
                        </div>
                    </div>
                    @if($usuario->forcaId != null)
                    <div class="form-group">
                        <label for="idtMil" class="col-sm-2 control-label">Nº Identidade Militar/Força:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="{{$usuario->idtMil}} / {{$usuario->forcaExpedidora->sigla}}-{{$usuario->forcaExpedidora->forca}}" disabled>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    <i class="fa fa-address-book" aria-hidden="true"></i> Dados de Endereço
                    </h3>
                </div>
                <div class="panel-body form-horizontal">
                    <div class="form-group">
                        <label for="endereco" class="col-sm-2 control-label">Endereço:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{$usuario->endereco}}, nº {{$usuario->numero}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ufEndId" class="col-sm-2 control-label">UF/Cidade:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{$usuario->cidadeEndereco->estado->sigla}} / {{$usuario->cidadeEndereco->cidade}}" disabled>
                        </div>
                        <label for="cep" class="col-sm-2 control-label">CEP:</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="{{$usuario->cep}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="bairro" class="col-sm-2 control-label">Bairro:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="{{$usuario->bairro}}" disabled>
                        </div>
                        <label for="complemento" class="col-sm-2 control-label">Complemento:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="{{$usuario->complemento}}" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                    <i class="fa fa-phone" aria-hidden="true"></i> Dados de Contato
                    </h3>
                </div>
                <div class="panel-body form-horizontal">
                    <div class="form-group">
                        <label for="telFixo" class="col-sm-2 control-label">Tel. Fixo:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="{{$usuario->telFixo}}" disabled>    
                        </div>
                        <label for="telCelular" class="col-sm-2 control-label">Tel. Celular:</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="{{$usuario->telCelular}}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
