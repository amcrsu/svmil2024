<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
        <i class="fa fa-lock" aria-hidden="true"></i> Dados de Acesso
        </h3>
    </div>
    <div class="panel-body">
        <div id="divCPF" class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
            <label for="cpf" class="col-sm-2 control-label">CPF:<span class="required">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="cpf" name="cpf" value="{{old('cpf')}}" data-mask="000.000.000-00" autofocus required>
            </div>
            @if ($errors->has('cpf'))
                <span class="help-block">
                    <strong>{{ $errors->all('cpf') }}</strong>
                </span>
            @endif
            <span class="help-block" id="erroValidacao">
                <strong><label id="erro"></label></strong>
            </span>
        </div>
        <div class="form-group{{ $errors->has('senha') ? ' has-error' : '' }}">
            <label for="senha" class="col-sm-2 control-label">Senha:<span class="required">*</span></label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" maxlength="15" required>
                <span class="control-label"><span class="required">*</span>mínimo de 8 caracteres</span>
            </div>
            @if ($errors->has('senha'))
                <span class="help-block">
                    <strong>{{ $errors->first('senha') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('senha_confirmation') ? ' has-error' : '' }}">
            <label for="confirm_senha" class="col-sm-2 control-label">Confirmar Senha:<span class="required">*</span></label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="senha_confirmation" name="senha_confirmation" placeholder="Confirmar Senha" maxlength="15" required>
            </div>
            @if ($errors->has('senha_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('senha_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>