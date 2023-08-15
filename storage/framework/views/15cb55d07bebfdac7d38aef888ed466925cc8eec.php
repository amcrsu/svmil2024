<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
        <i class="fa fa-address-book" aria-hidden="true"></i> Dados de Endereço
        </h3>
    </div>
    <div class="panel-body">
        <div class="form-group<?php echo e($errors->has('endereco') ? ' has-error' : ''); ?>">
            <label for="endereco" class="col-sm-2 control-label">Endereço:<span class="required">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo e(old('endereco')); ?>" required maxlength="100">
            </div>
            <?php if($errors->has('endereco')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('endereco')); ?></strong>
                </span>
            <?php endif; ?>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="numero" name="numero" value="<?php echo e(old('numero')); ?>" placeholder="Nº" required maxlength="10">
            </div>
            <?php if($errors->has('numero')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('numero')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('ufEndId') || $errors->has('cidadeEndId') ? ' has-error' : ''); ?>">
            <label for="ufEndId" class="col-sm-2 control-label">UF/Cidade:<span class="required">*</span></label>
            <div class="col-sm-2">
                <select name="ufEndId" id="ufEndId" class="form-control" required>
                    <option value="" disabled selected>Selecione</option>
                    <?php $__currentLoopData = $ufList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(old('ufEndId') == $uf->id): ?>
                        <option value="<?php echo e($uf->id); ?>" selected><?php echo e((isset($uf->sigla)) ? $uf->sigla . ' - ' . $uf->estado : $uf->estado); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($uf->id); ?>"><?php echo e((isset($uf->sigla)) ? $uf->sigla . ' - ' . $uf->estado : $uf->estado); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php if($errors->has('ufEndId')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('ufEndId')); ?></strong>
                </span>
            <?php endif; ?>
            <div class="col-sm-4">
                <input type="hidden" name="cidadeEndId" id="cidadeEndId" value="<?php echo e(old('cidadeEndId')); ?>">
                <select name="cidadeEndId" id="cidadeEndId" class="form-control" required>
                    <option value="" disabled selected>Selecione</option>
                </select>
            </div>
            <?php if($errors->has('cidadeEndId')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('cidadeEndId')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('bairro') ? ' has-error' : ''); ?>">
            <label for="bairro" class="col-sm-2 control-label">Bairro:<span class="required">*</span></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo e(old('bairro')); ?>" required maxlength="50">
            </div>
            <?php if($errors->has('bairro')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('bairro')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('cep') ? ' has-error' : ''); ?>">
            <label for="cep" class="col-sm-2 control-label">CEP:<span class="required">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="cep" name="cep" value="<?php echo e(old('cep')); ?>" required data-mask="00000-000">
            </div>
            <?php if($errors->has('cep')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('cep')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('complemento') ? ' has-error' : ''); ?>">
            <label for="complemento" class="col-sm-2 control-label">Complemento:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo e(old('complemento')); ?>" maxlength="100">
            </div>
            <?php if($errors->has('complemento')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('complemento')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
</div>