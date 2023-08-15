<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
        <i class="fa fa-bars" aria-hidden="true"></i> Dados do Processo Seletivo
        </h3>
    </div>
    <div class="panel-body">
        <div class="form-group<?php echo e($errors->has('categoriaId') ? ' has-error' : ''); ?>">
            <label for="categoriaId" class="col-sm-2 control-label">Nível:<span class="required">*</span></label>
            <div class="col-sm-4">
                <select name="categoriaId" id="categoriaId" class="form-control" required>
                    <option value="" disabled selected>Selecione</option>
                    <?php $__currentLoopData = $categoriaList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(old('categoriaId') == $categoria->id): ?>
                        <option value="<?php echo e($categoria->id); ?>" selected><?php echo e((isset($categoria->sigla)) ? $categoria->sigla . ' - ' . $categoria->categoria : $categoria->categoria); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($categoria->id); ?>"><?php echo e((isset($categoria->sigla)) ? $categoria->sigla . ' - ' . $categoria->categoria : $categoria->categoria); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php if($errors->has('categoriaId')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('categoriaId')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('areaId') ? ' has-error' : ''); ?>">
            <label for="areaId" class="col-sm-2 control-label">Área:<span class="required">*</span></label>
            <div class="col-sm-4">
                <input type="hidden" name="areaId" value="<?php echo e(old('areaId')); ?>" />
                <select name="areaId" class="form-control" required id="areaId">
                    <option value="" disabled selected>Selecione</option>
                </select>
            </div>
            <?php if($errors->has('areaId')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('areaId')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('subAreaId') ? ' has-error' : ''); ?>" id="divSubarea">
            <label for="subAreaId" class="col-sm-2 control-label">Subárea:<span class="required">*</span></label>
            <div class="col-sm-4">
                <input type="hidden" name="subAreaId" value="<?php echo e(old('subAreaId')); ?>" />
                <select name="subAreaId" id="subAreaId" class="form-control">
                    <option value="" disabled selected>Selecione</option>
                </select>
            </div>
            <?php if($errors->has('subAreaId')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('subAreaId')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
</div>