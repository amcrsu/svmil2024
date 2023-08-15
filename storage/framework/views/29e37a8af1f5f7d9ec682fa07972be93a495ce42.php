 <div class="alert alert-info" role="alert">
        <h4>Leia atentamente as informações abaixo!</h4>
        <ul>
            <li>Serão aceitos apenas 3 de cada tipo de publicação.</b> </li>
        </ul>
</div>
<div class="form-group<?php echo e($errors->has('tipoPublicacaoId') ? ' has-error' : ''); ?>">
    <label for="tipoPublicacaoId" class="col-sm-2 control-label">Tipo da Publicação:</label>
    <div class="col-sm-4">
        <select name="tipoPublicacaoId" id="tipoPublicacaoId" class="form-control" required>
            <option value="" disabled selected>Selecione</option>
            <?php $__currentLoopData = $listaTiposPublicacao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoTitulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(old('tipoPublicacaoId') == $tipoTitulo->id): ?>
            <option value="<?php echo e($tipoTitulo->id); ?>" selected><?php echo e($tipoTitulo->tipoTitulo); ?></option>
            <?php else: ?>
            <option value="<?php echo e($tipoTitulo->id); ?>"><?php echo e($tipoTitulo->tipoTitulo); ?></option>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('tipoPublicacaoId')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('tipoPublicacaoId')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group<?php echo e($errors->has('tituloPublicacao') ? ' has-error' : ''); ?>">
    <label for="tituloPublicacao" class="col-sm-2 control-label">Título Publicado:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="tituloPublicacao" name="tituloPublicacao" value="<?php echo e(old('tituloPublicacao')); ?>" placeholder="Título Publicado" maxlength="100" required>
        <?php if($errors->has('tituloPublicacao')): ?>
            <span class="help-block">
            <strong><?php echo e($errors->first('tituloPublicacao')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group<?php echo e($errors->has('veiculoPublicacao') ? ' has-error' : ''); ?>">
    <label for="veiculoPublicacao" class="col-sm-2 control-label">Veículo da Publicação:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="veiculoPublicacao" name="veiculoPublicacao" value="<?php echo e(old('veiculoPublicacao')); ?>" placeholder="Veículo de Publicação" maxlength="100" required>
        <?php if($errors->has('veiculoPublicacao')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('veiculoPublicacao')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group<?php echo e($errors->has('dtPublicacao') ? ' has-error' : ''); ?>">
    <label for="dtPublicacao" class="col-sm-2 control-label">Data da Publicação:<span class="required">*</span></label>
    <div class="col-sm-2">
        <input type="text" class="form-control readonly"  id="dtPublicacao" name="dtPublicacao" data-mask="00/00/0000" placeholder="00/00/0000" required>
    </div>
    <?php if($errors->has('dtPublicacao')): ?>
        <span class="help-block">
        <strong><?php echo e($errors->first('dtPublicacao')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<button class="btn btn-success pull-right" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Incluir Publicação</button>
<?php if(isset($listaPublicacoes) and $listaPublicacoes->count()): ?>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Título</th>
                                    <th>Veículo</th>
                                    <th>Data Publicação</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $listaPublicacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publicacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($publicacao->tipoTitulo->tipoTitulo); ?></td>
                                <td><?php echo e($publicacao->titulo); ?></td>
                                <td><?php echo e($publicacao->veiculo); ?></td>
                                <td><?php echo e(date('d/m/Y', strtotime($publicacao->dtPublicacao))); ?></td>
                                <td>
                                    <a href="<?php echo e(route('candidato.excluirPublicacao', ['id'=>Crypt::encrypt($publicacao->id), 'idInscricao'=>Crypt::encrypt($publicacao->inscricaoId)])); ?>" tooltip="Excluir"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>   
            <!-- END SAMPLE TABLE PORTLET-->
         </div>
    </div>
<?php endif; ?> 