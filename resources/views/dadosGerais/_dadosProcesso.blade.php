<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
        <i class="fa fa-bars" aria-hidden="true"></i> Dados do Processo Seletivo
        </h3>
    </div>
    <div class="panel-body">
   <!-- <div class="alert alert-info" role="alert">
            <h3>Leia atentamente a informação abaixo:</h3>
                <ul>
                    <li>Preencha os campos abaixo conforme o <b>Anexo "C"</b> ao Aviso de Convocação nº 004 - SSMR/10RM.</li>
                </ul>
                        
        </div> -->
        <div class="form-group{{ $errors->has('categoriaId') ? ' has-error' : '' }}">
            <label for="categoriaId" class="col-sm-2 control-label">Nível:<span class="required">*</span></label>
            <div class="col-sm-4">
                <select name="categoriaId" id="categoriaId" class="form-control" required>
                    <option value="" disabled selected>Selecione</option>
                    @foreach($categoriaList as $categoria)
                        @if(old('categoriaId') == $categoria->id)
                        <option value="{{$categoria->id}}" selected>{{ (isset($categoria->sigla)) ? $categoria->sigla . ' - ' . $categoria->categoria : $categoria->categoria}}</option>
                        @else
                        <option value="{{$categoria->id}}">{{ (isset($categoria->sigla)) ? $categoria->sigla . ' - ' . $categoria->categoria : $categoria->categoria}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @if ($errors->has('categoriaId'))
                <span class="help-block">
                    <strong>{{ $errors->first('categoriaId') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('areaId') ? ' has-error' : '' }}">
            <label for="areaId" class="col-sm-2 control-label">Área:<span class="required">*</span></label>
            <div class="col-sm-4">
                <input type="hidden" name="areaId" value="{{old('areaId')}}" />
                <select name="areaId" class="form-control" required id="areaId">
                    <option value="" disabled selected>Selecione</option>
                </select>
            </div>
            @if ($errors->has('areaId'))
                <span class="help-block">
                    <strong>{{ $errors->first('areaId') }}</strong>
                </span>
            @endif
        </div>
        
        <div class="form-group{{ $errors->has('subAreaId') ? ' has-error' : '' }}" id="divSubarea">
            <label for="subAreaId" class="col-sm-2 control-label">Subárea:<span class="required">*</span></label>
            <div class="col-sm-4">
                <input type="hidden" name="subAreaId" value="{{old('subAreaId')}}" />
                <select name="subAreaId" id="subAreaId" class="form-control">
                    <option value="" disabled selected>Selecione</option>
                </select>
            </div>
            @if ($errors->has('subAreaId'))
                <span class="help-block">
                    <strong>{{ $errors->first('subAreaId') }}</strong>
                </span>
            @endif
        </div>
        
        <!--- Novo campo Guarnicao --->
        
        <div class="form-group{{ $errors->has('guaId') ? ' has-error' : '' }}">
            <label for="guaId" class="col-sm-2 control-label">Guarni&ccedil;&atilde;o:<span class="required">*</span></label>
            <div class="col-sm-4">
                <select name="guarnicao" id="guarnicao" class="form-control" required>
                    <option value="" disabled selected>Selecione</option>
                    @foreach($guarnicaoList as $guarnicao)
                        
                        <option value="{{$guarnicao->guarnicao}}">{{ (isset($guarnicao->guarnicao)) ? $guarnicao->guarnicao : $guarnicao->guarnicao}}</option>
                        
                    @endforeach
                </select>

            </div>
            
            @if ($errors->has('guarnicao'))
                <span class="help-block">
                    <strong>{{ $errors->first('guarnicao') }}</strong>
                </span>
            @endif
            </div>
            
        </div>
        
        <!--- Fim campo Guarnicao --->
        
        
</div>