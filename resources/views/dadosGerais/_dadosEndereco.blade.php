<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
        <i class="fa fa-address-book" aria-hidden="true"></i> Dados de Endereço
        </h3>
    </div>
    <div class="panel-body">
        <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
            <label for="endereco" class="col-sm-2 control-label">Endereço:<span class="required">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="endereco" name="endereco" value="{{old('endereco')}}" required maxlength="100">
            </div>
            @if ($errors->has('endereco'))
                <span class="help-block">
                    <strong>{{ $errors->first('endereco') }}</strong>
                </span>
            @endif
            <div class="col-sm-2">
                <input type="text" class="form-control" id="numero" name="numero" value="{{old('numero')}}" placeholder="Nº" required maxlength="10">
            </div>
            @if ($errors->has('numero'))
                <span class="help-block">
                    <strong>{{ $errors->first('numero') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('ufEndId') || $errors->has('cidadeEndId') ? ' has-error' : '' }}">
            <label for="ufEndId" class="col-sm-2 control-label">UF/Cidade:<span class="required">*</span></label>
            <div class="col-sm-2">
                <select name="ufEndId" id="ufEndId" class="form-control" required>
                    <option value="" disabled selected>Selecione</option>
                    @foreach($ufList as $uf)
                        @if(old('ufEndId') == $uf->id)
                        <option value="{{$uf->id}}" selected>{{ (isset($uf->sigla)) ? $uf->sigla . ' - ' . $uf->estado : $uf->estado}}</option>
                        @else
                        <option value="{{$uf->id}}">{{ (isset($uf->sigla)) ? $uf->sigla . ' - ' . $uf->estado : $uf->estado}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @if ($errors->has('ufEndId'))
                <span class="help-block">
                    <strong>{{ $errors->first('ufEndId') }}</strong>
                </span>
            @endif
            <div class="col-sm-4">
                <input type="hidden" name="cidadeEndId" id="cidadeEndId" value="{{old('cidadeEndId')}}">
                <select name="cidadeEndId" id="cidadeEndId" class="form-control" required>
                    <option value="" disabled selected>Selecione</option>
                </select>
            </div>
            @if ($errors->has('cidadeEndId'))
                <span class="help-block">
                    <strong>{{ $errors->first('cidadeEndId') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
            <label for="bairro" class="col-sm-2 control-label">Bairro:<span class="required">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="bairro" name="bairro" value="{{old('bairro')}}" required maxlength="50">
            </div>
            @if ($errors->has('bairro'))
                <span class="help-block">
                    <strong>{{ $errors->first('bairro') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
            <label for="cep" class="col-sm-2 control-label">CEP:<span class="required">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="cep" name="cep" value="{{old('cep')}}" required data-mask="00000-000">
            </div>
            @if ($errors->has('cep'))
                <span class="help-block">
                    <strong>{{ $errors->first('cep') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('complemento') ? ' has-error' : '' }}">
            <label for="complemento" class="col-sm-2 control-label">Complemento:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="complemento" name="complemento" value="{{old('complemento')}}" maxlength="100">
            </div>
            @if ($errors->has('complemento'))
                <span class="help-block">
                    <strong>{{ $errors->first('complemento') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>