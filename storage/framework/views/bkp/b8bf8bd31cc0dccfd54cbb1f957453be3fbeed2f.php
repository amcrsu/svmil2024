<?php $__env->startSection('content'); ?>


<h2 class="section-title">Nova Inscrição</h2>
<p class="desc" align="center">Comando da 10ª Região Militar - Região Martim Soares Moreno</p>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">

            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">
                    <i class="fa fa-bars" aria-hidden="true"></i> Dados do Processo Seletivo
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('candidato.salvarNovaInscricao')); ?>">
                   
                        <input type="hidden" id="hdnSexo" name="hdnSexo" value="<?php echo e($sexo); ?>">
                        <?php echo e(csrf_field()); ?>

                    
                        <div class="form-group<?php echo e($errors->has('categoriaId') ? ' has-error' : ''); ?>">
                            <label for="categoriaId" class="col-sm-2 control-label">Nível:<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <select name="categoriaId" class="form-control" required autofocus>
                                    <option value="" disabled selected>Selecione</option>
                                    <?php $__currentLoopData = $categoriaList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(old('categoriaId') == $categoria->id): ?>
                                        <option value="<?php echo e($categoria->id); ?>" selected><?php echo e((isset($categoria->sigla)) ? $categoria->sigla . ' - ' . $categoria->categoria : $categoria->categoria); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($categoria->id); ?>"><?php echo e((isset($categoria->sigla)) ? $categoria->sigla . ' - ' . $categoria->categoria : $categoria->categoria); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('categoriaId')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('categoriaId')); ?></strong>
                                    </span>
                                <?php endif; ?>                                
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('areaId') ? ' has-error' : ''); ?>">
                            <label for="areaId" class="col-sm-2 control-label">Área:<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="hidden" name="areaId" value="<?php echo e(old('areaId')); ?>" />
                                <select name="areaId" class="form-control" required id="areaId">
                                    <option value="" disabled selected>Selecione</option>
                                </select>
                                <?php if($errors->has('areaId')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('areaId')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
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
                        
                        <div class="form-group<?php echo e($errors->has('categoriaId') ? ' has-error' : ''); ?>">
                            <label for="categoriaId" class="col-sm-2 control-label">Nível:<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <select name="categoriaId" class="form-control" required autofocus>
                                    <option value="" disabled selected>Selecione</option>
                                    <?php $__currentLoopData = $categoriaList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guarnicao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(old('guarnicao') == $guarnicao->guarnicao): ?>
                                        <option value="<?php echo e($categoria->id); ?>" ><?php echo e((isset($guarnicao->guarnicao)) ? $guarnicao->guarnicao : $guarnicao->guarnicao); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo e($categoria->id); ?>"><?php echo e((isset($guarnicao->guarnicao)) ? $guarnicao->guarnicao : $guarnicao->guarnicao); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('categoriaId')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('categoriaId')); ?></strong>
                                    </span>
                                <?php endif; ?>                                
                            </div>
                        </div>

                        <hr />
                        <button id="btnSalvar" class="btn btn-primary pull-right" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Continuar</button>
                    </form>
                </div>

    </div>
</div>
                             
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javaScript'); ?>
    <script src="<?php echo e(asset('js/novaInscricaoScripts.js')); ?>"></script> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>