<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
        <i class="fa fa-phone" aria-hidden="true"></i> Dados de Contato
        </h3>
    </div>
    <div class="panel-body">
        <div class="form-group<?php echo e($errors->has('telFixo') ? ' has-error' : ''); ?>">
            <label for="telFixo" class="col-sm-2 control-label">Tel. Fixo:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="telFixo" name="telFixo" value="<?php echo e(old('telFixo')); ?>" data-mask="(00) 0000-0000">    
            </div>
            <?php if($errors->has('telFixo')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('telFixo')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('telCelular') ? ' has-error' : ''); ?>">
            <label for="telCelular" class="col-sm-2 control-label">Tel. Celular:<span class="required">*</span></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="telCelular" name="telCelular" value="<?php echo e(old('telCelular')); ?>" data-mask="(00) 00000-0000" required>
            </div>
            <?php if($errors->has('telCelular')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('telCelular')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
</div>