<div class="alert alert-info" role="alert">
<h4>Leia atentamente as informações abaixo!</h4>
        <ul>
            <li>Para os cursos <b>Técnico e/ou Profissionalizante</b>, informe apenas <b>01 Certificado</b>, desde que seja na área pretendida;</li>
            <li>Informe o <b>Certificado de Conclusão de Ensino Médio</b>, se possuir;</li>
            <li>Para os candidatos a <b>Motorista</b> informe a categoria da CNH (D ou E), máximo de 1 habilitação.</li>         
        </ul>
    </div>
    <div class="form-group{{ $errors->has('tituloDiplomaId') ? ' has-error' : '' }}">
    <label for="tituloDiplomaId" class="col-sm-2 control-label">Título:</label>
    <div class="col-sm-4">
        <select name="tituloDiplomaId" id="tituloDiplomaId" class="form-control" required>
            <option value="" disabled selected>Selecione</option>
            @foreach($listaTiposTitulosGraus as $tipoTitulo)
            @if(old('tituloDiplomaId') == $tipoTitulo->id)
            <option value="{{$tipoTitulo->id}}" selected>{{$tipoTitulo->tipoTitulo}}</option>
            @else
            <option value="{{$tipoTitulo->id}}">{{$tipoTitulo->tipoTitulo}}</option>
            @endif
            @endforeach
        </select>
        @if ($errors->has('tituloDiplomaId'))
            <span class="help-block">
                <strong>{{ $errors->first('tituloDiplomaId') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('nomeCursoDiploma') ? ' has-error' : '' }}">
    <label for="nomeCursoDiploma" class="col-sm-2 control-label">Curso:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="nomeCursoDiploma" name="nomeCursoDiploma" value="{{old('nomeCursoDiploma')}}" placeholder="Nome do Curso" maxlength="100" required>
        @if ($errors->has('nomeCursoDiploma'))
            <span class="help-block">
            <strong>{{ $errors->first('nomeCursoDiploma') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('instituicaoDiploma') ? ' has-error' : '' }}">
    <label for="instituicaoDiploma" class="col-sm-2 control-label">Instituição onde realizou o curso:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="instituicaoDiploma" name="instituicaoDiploma" value="{{old('instituicaoDiploma')}}" placeholder="Nome da Instituição" maxlength="100" required>
        @if ($errors->has('instituicaoDiploma'))
            <span class="help-block">
            <strong>{{ $errors->first('instituicaoDiploma') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('dtConclusaoDiploma') ? ' has-error' : '' }}">
    <label for="dtConclusaoDiploma" class="col-sm-2 control-label">Data da Conclusão:<span class="required">*</span></label>
    <div class="col-sm-2">
        <input type="text" class="form-control readonly" id="dtConclusaoDiploma" name="dtConclusaoDiploma" data-mask="00/00/0000" placeholder="00/00/0000" required>
    </div>
    @if ($errors->has('dtConclusaoDiploma'))
        <span class="help-block">
        <strong>{{ $errors->first('dtConclusaoDiploma') }}</strong>
        </span>
    @endif
</div>
<button class="btn btn-success pull-right" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Incluir Título/Diploma</button>
@if(isset($listaTitulos) and $listaTitulos->count())
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
                                    <th>Curso</th>
                                    <th>Instituição</th>
                                    <th>Data Conclusão</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($listaTitulos as $titulo)
                            <tr>
                                <td>{{$titulo->tipoTitulo->tipoTitulo}}</td>
                                <td>{{$titulo->curso}}</td>
                                <td>{{$titulo->instituicao}}</td>
                                <td>{{date('d/m/Y', strtotime($titulo->dtConclusao))}}</td>
                                <td>
                                    <a href="{{route('candidato.excluirTitulo', ['id'=>Crypt::encrypt($titulo->id), 'idInscricao'=>Crypt::encrypt($titulo->inscricaoId)])}}" tooltip="Excluir"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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