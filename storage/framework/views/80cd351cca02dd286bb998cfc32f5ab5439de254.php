<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
        <i class="fa fa-lock" aria-hidden="true"></i> Dados de Acesso
        </h3>
    </div>
    <div class="panel-body">
        <div id="divCPF" class="form-group<?php echo e($errors->has('cpf') ? ' has-error' : ''); ?>">
            <label for="cpf" class="col-sm-2 control-label">CPF:<span class="required">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo e(old('cpf')); ?>" data-mask="000.000.000-00" autofocus required>
            </div>
            <?php if($errors->has('cpf')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->all('cpf')); ?></strong>
                </span>
            <?php endif; ?>
            <span class="help-block" id="erroValidacao">
                <strong><label id="erro"></label></strong>
            </span>
        </div>
        <div class="form-group<?php echo e($errors->has('senha') ? ' has-error' : ''); ?>">
            <label for="senha" class="col-sm-2 control-label">Senha:<span class="required">*</span></label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" maxlength="15" required>
                <span class="control-label"><span class="required">*</span>mínimo de 8 caracteres</span>
            </div>
            <?php if($errors->has('senha')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('senha')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('senha_confirmation') ? ' has-error' : ''); ?>">
            <label for="confirm_senha" class="col-sm-2 control-label">Confirmar Senha:<span class="required">*</span></label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="senha_confirmation" name="senha_confirmation" placeholder="Confirmar Senha" maxlength="15" required>
            </div>
            <?php if($errors->has('senha_confirmation')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('senha_confirmation')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
</div>