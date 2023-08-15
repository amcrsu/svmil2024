<!--<div class="panel panel-default">
    <div class="panel-body">  
        <p>Verifique o limite máximo para cada carga horaria.</p>
    </div>
</div>-->
<div class="form-group{{ $errors->has('tipoTituloId') ? ' has-error' : '' }}">
    <label for="tipoTituloId" class="col-sm-2 control-label">Tipo da Certificação:<span class="required">*</span></label>
    <div class="col-sm-4">
        <select name="tipoTituloId" id="tipoTituloId" class="form-control" required>
            <option value="" disabled selected>Selecione</option>
            @foreach($listaTiposCertificacao as $tipoTitulo)
            @if(old('tipoTituloId') == $tipoTitulo->id)
            <option value="{{$tipoTitulo->id}}" selected>{{$tipoTitulo->tipoTitulo}}</option>
            @else
            <option value="{{$tipoTitulo->id}}">{{$tipoTitulo->tipoTitulo}}</option>
            @endif
            @endforeach
        </select>
        @if ($errors->has('tipoTituloId'))
            <span class="help-block">
                <strong>{{ $errors->first('tipoTituloId') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('nomeCertificacao') ? ' has-error' : '' }}">
    <label for="nomeCertificacao" class="col-sm-2 control-label">Nome:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="nomeCertificacao" value="{{old('nomeCertificacao')}}" name="nomeCertificacao" placeholder="Nome da Certificação" maxlength="100" required>
        @if ($errors->has('nomeCertificacao'))
            <span class="help-block">
            <strong>{{ $errors->first('nomeCertificacao') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('dtCertificacao') ? ' has-error' : '' }}">
    <label for="dtCertificacao" class="col-sm-2 control-label">Data da Prova da Certificação:<span class="required">*</span></label>
    <div class="col-sm-2">
        <input type="text" class="form-control readonly" readonly id="dtCertificacao" name="dtCertificacao" data-mask="00/00/0000" placeholder="00/00/0000" required> 
    </div>
    @if ($errors->has('dtCertificacao'))
        <span class="help-block">
        <strong>{{ $errors->first('dtCertificacao') }}</strong>
        </span>
    @endif
</div>
<button class="btn btn-success pull-right" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Incluir Curso</button>
@if(isset($listaCertificacoes) and $listaCertificacoes->count())
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Nome</th>
                                    <th>Data Certificação</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($listaCertificacoes as $certificado)
                            <tr>
                                <td>{{$certificado->tipoTitulo->tipoTitulo}}</td>
                                <td>{{$certificado->nome}}</td>
                                <td>{{date('d/m/Y', strtotime($certificado->dtCertificacao))}}</td>
                                <td>
                                    <a href="{{route('candidato.excluirCertificado', ['id'=>Crypt::encrypt($certificado->id), 'idInscricao'=>Crypt::encrypt($certificado->inscricaoId)])}}" tooltip="Excluir"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
    </div>
@endif