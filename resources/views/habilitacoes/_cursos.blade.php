 <div class="alert alert-info" role="alert">
        <h4>Leia atentamente as informações abaixo!</h4>
        <ul>
            <li>Para: "Cursos com carga horária de duração mínima de 120, 80, 40 e 30 horas", cadastrar <b>no máximo de 03 cursos</b>, por carga horária. </li>
            <li>Para: "Carteira Nacional de Habilitação Categoria (B, C, D ou E)" <b>cadastrar a de maior categoria.</b> </li>
            
        </ul>
</div>
<div class="form-group{{ $errors->has('tipoTituloCursoId') ? ' has-error' : '' }}">
    <label for="tipoTituloCursoId" class="col-sm-2 control-label">Categoria:<span class="required">*</span></label>
    <div class="col-sm-4">
        <select name="tipoTituloCursoId" id="tipoTituloCursoId" class="form-control" required>
            <option value="" disabled selected>Selecione</option>
            @foreach($listaTiposCurso as $tipoTitulo)
            @if(old('tipoTituloCursoId') == $tipoTitulo->id)
            <option value="{{$tipoTitulo->id}}" selected>{{$tipoTitulo->tipoTitulo}}</option>
            @else
            <option value="{{$tipoTitulo->id}}">{{$tipoTitulo->tipoTitulo}}</option>
            @endif
            @endforeach
        </select>
        @if ($errors->has('tipoTituloCursoId'))
            <span class="help-block">
                <strong>{{ $errors->first('tipoTituloCursoId') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('cursoFormacao') ? ' has-error' : '' }}">
    <label for="cursoFormacao" class="col-sm-2 control-label">Curso:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="cursoFormacao" value="{{old('cursoFormacao')}}" name="cursoFormacao" placeholder="Nome do Curso/Formação" maxlength="100" required>
        @if ($errors->has('cursoFormacao'))
            <span class="help-block">
            <strong>{{ $errors->first('cursoFormacao') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('instituicaoOMCurso') ? ' has-error' : '' }}">
    <label for="instituicaoOMCurso" class="col-sm-2 control-label">Instituição:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="instituicaoOMCurso" value="{{old('instituicaoOMCurso')}}" name="instituicaoOMCurso" placeholder="Nome da Instituição/OM" maxlength="100" required>
        @if ($errors->has('instituicaoOMCurso'))
            <span class="help-block">
            <strong>{{ $errors->first('instituicaoOMCurso') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('dtConclusaoConvocacao') ? ' has-error' : '' }}">
    <label for="dtConclusaoConvocacao" class="col-sm-2 control-label">Data da Conclusão:<span class="required">*</span></label>
    <div class="col-sm-2">
        <input type="text" class="form-control readonly"  id="dtConclusaoConvocacao" name="dtConclusaoConvocacao" data-mask="00/00/0000" placeholder="00/00/0000" required>
    </div>
    @if ($errors->has('dtConclusaoConvocacao'))
        <span class="help-block">
        <strong>{{ $errors->first('dtConclusaoConvocacao') }}</strong>
        </span>
    @endif
</div>
<button class="btn btn-success pull-right" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Incluir Curso</button>
@if(isset($listaCursos) and $listaCursos->count())
    <div class="row">
        <div class="col-md-12">  
            <!-- BEGIN SAMPLE TABLE PORTLET--> 
            <div class="portlet box primary">
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Curso</th>
                                    <th>Instituição</th>
                                    <th>Data Conclusão</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($listaCursos as $curso)
                            <tr>
                                <td>{{$curso->tipoTitulo->tipoTitulo}}</td>
                                <td>{{$curso->curso}}</td>
                                <td>{{$curso->instituicao}}</td>
                                <td>{{date('d/m/Y', strtotime($curso->dtConclusao))}}</td>
                                <td>
                                    <a href="{{route('candidato.excluirCurso', ['id'=>Crypt::encrypt($curso->id), 'idInscricao'=>Crypt::encrypt($curso->inscricaoId)])}}" tooltip="Excluir"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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