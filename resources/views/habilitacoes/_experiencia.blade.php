 <div class="alert alert-info" role="alert">
        <h4>Leia atentamente as informações abaixo!</h4>
        <ul>
            <li>Somente será aceita a experiência na área pretendida;</li>
            <li>A experiência profissional será considerada após a conclusão do curso que o habilita;</li>
            <li>Deverá cadastrar somente a experiência profissional que possa ser comprovada formalmente.</li>
        </ul>
</div>

<div class="form-group{{ $errors->has('tipoExperienciaId') ? ' has-error' : '' }}">
    <label for="tipoExperienciaId" class="col-sm-2 control-label">Tipo de Experiência:<span class="required">*</span></label>
    <div class="col-sm-4">
        <select name="tipoExperienciaId" id="tipoExperienciaId" class="form-control" required>
            <option value="" disabled selected>Selecione</option>
            @foreach($listaTiposExperiencia as $tipoTitulo)
            @if(old('tipoExperienciaId') == $tipoTitulo->id)
            <option value="{{$tipoTitulo->id}}" selected>{{$tipoTitulo->tipoTitulo}}</option>
            @else
            <option value="{{$tipoTitulo->id}}">{{$tipoTitulo->tipoTitulo}}</option>
            @endif
            @endforeach
        </select>
        @if ($errors->has('tipoExperienciaId'))
            <span class="help-block">
                <strong>{{ $errors->first('tipoExperienciaId') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('nomeEmpresa') ? ' has-error' : '' }}">
    <label for="nomeEmpresa" class="col-sm-2 control-label">Nome do Local/Empresa:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa" value="{{old('nomeEmpresa')}}" placeholder="Nome do Local/empresa" maxlength="100" required>
        @if ($errors->has('nomeEmpresa'))
            <span class="help-block">
            <strong>{{ $errors->first('nomeEmpresa') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('dtInicial') || Session::has('erro') ? ' has-error' : '' }}">
    <label for="dtInicial" class="col-sm-2 control-label">Período Inicial e Final:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control readonly" id="dtInicial" class="datepicker-here" name="dtInicial" data-mask="00/00/0000 - 00/00/0000" placeholder="00/00/0000 - 00/00/0000" maxlength="10" required>
        <small>00/00/0000 - 00/00/0000</small>
    </div>
    <p><b>Se for seu <span style="color: red">EMPREGO ATUAL</span>, preencha a Data de Início normalmente e na Data Final, insira a DATA em que está <span style="color: red">REALIZANDO ESTA INSCRIÇÃO</span>.</b></p>
    @if ($errors->has('dtInicial'))
        <span class="help-block">
            <strong>{{ $errors->first('dtInicial') }}</strong>
        </span>
    @endif
    @if(Session::has('erro'))
        <span class="help-block">
            <strong>{{Session::get('erro')['msg']}}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
    <label for="cargo" class="col-sm-2 control-label">Cargo/Função:<span class="required">*</span></label>
    <div class="col-sm-2">
        <input type="text" class="form-control" id="cargo" name="cargo" value="{{old('cargo')}}" maxlength="100" required>
        @if ($errors->has('cargo'))
            <span class="help-block">
            <strong>{{ $errors->first('cargo') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('atividades') ? ' has-error' : '' }}">
    <label for="atividades" class="col-sm-2 control-label">Principais atividades desempenhadas:<span class="required">*</span></label>
    <div class="col-sm-4">
        <textarea class="form-control" id="atividades" name="atividades" required>{{old('atividades')}}</textarea>
        @if ($errors->has('atividades'))
            <span class="help-block">
            <strong>{{ $errors->first('atividades') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="alert alert-warning" role="alert">
        <h4>Atenção!</h4>
        <ul>
            <li>Antes de incluir esta experiência profissional, verifique se as datas foram inseridas corretamente. Caso tenha cometido algum erro e incluído a experiência, clique no ícone da lixeira abaixo para excluir a experiência e reinseri-la.</li>            
        </ul>
</div>
<p></p>
<button class="btn btn-success pull-right" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Incluir Experiência</button>
@if(isset($listaExperiencias) and $listaExperiencias->count())
    <div class="row">
        <div class="col-md-12">   
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                <div class="portlet-body">
                    <div class="table-scrollable">
                    ({{$totalAnos}} ano(s), {{$totalMeses}} mês(es), {{$totalDias}} dia(s))
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Local</th>
                                    <th>Período</th>
                                    <th>Cargo</th>
                                    <th>Atividades</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                           <?php $index = 0; ?>
                            @foreach($listaExperiencias as $experiencia)
                            <tr>
                                <td>{{$experiencia->tipoTitulo->tipoTitulo}}</td>
                                <td>{{$experiencia->nomeLocal}}</td>
                                <td>{{date('d/m/Y', strtotime($experiencia->dtInicio))}} até {{date('d/m/Y', strtotime($experiencia->dtFim))}}</td>
                                <td>{{$experiencia->cargo}}</td>
                                <td>{{$experiencia->atividades}}</td>
                                <td>
                                    <a href="{{route('candidato.excluirExperiencia', ['id'=>Crypt::encrypt($experiencia->id), 'idInscricao'=>Crypt::encrypt($experiencia->inscricaoId)])}}" tooltip="Excluir"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php $index++; ?>
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