<!--<div class="panel panel-default">
    <div class="panel-body">  
        <p>Verifique o limite máximo para cada carga horaria.</p>
    </div>
</div>-->
<div class="form-group<?php echo e($errors->has('tipoTituloId') ? ' has-error' : ''); ?>">
    <label for="tipoTituloId" class="col-sm-2 control-label">Tipo da Certificação:<span class="required">*</span></label>
    <div class="col-sm-4">
        <select name="tipoTituloId" id="tipoTituloId" class="form-control" required>
            <option value="" disabled selected>Selecione</option>
            <?php $__currentLoopData = $listaTiposCertificacao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoTitulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(old('tipoTituloId') == $tipoTitulo->id): ?>
            <option value="<?php echo e($tipoTitulo->id); ?>" selected><?php echo e($tipoTitulo->tipoTitulo); ?></option>
            <?php else: ?>
            <option value="<?php echo e($tipoTitulo->id); ?>"><?php echo e($tipoTitulo->tipoTitulo); ?></option>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('tipoTituloId')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('tipoTituloId')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group<?php echo e($errors->has('nomeCertificacao') ? ' has-error' : ''); ?>">
    <label for="nomeCertificacao" class="col-sm-2 control-label">Nome:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="nomeCertificacao" value="<?php echo e(old('nomeCertificacao')); ?>" name="nomeCertificacao" placeholder="Nome da Certificação" maxlength="100" required>
        <?php if($errors->has('nomeCertificacao')): ?>
            <span class="help-block">
            <strong><?php echo e($errors->first('nomeCertificacao')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group<?php echo e($errors->has('dtCertificacao') ? ' has-error' : ''); ?>">
    <label for="dtCertificacao" class="col-sm-2 control-label">Data da Prova da Certificação:<span class="required">*</span></label>
    <div class="col-sm-2">
        <input type="text" class="form-control readonly" readonly id="dtCertificacao" name="dtCertificacao" data-mask="00/00/0000" required> 
    </div>
    <?php if($errors->has('dtCertificacao')): ?>
        <span class="help-block">
        <strong><?php echo e($errors->first('dtCertificacao')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<button class="btn btn-default pull-right" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Incluir Curso</button>
<?php if(isset($listaCertificacoes) and $listaCertificacoes->count()): ?>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Nome</th>
                                    <th>Data Certificação</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $listaCertificacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($certificado->tipoTitulo->tipoTitulo); ?></td>
                                <td><?php echo e($certificado->nome); ?></td>
                                <td><?php echo e(date('d/m/Y', strtotime($certificado->dtCertificacao))); ?></td>
                                <td>
                                    <a href="<?php echo e(route('candidato.excluirCertificado', ['id'=>Crypt::encrypt($certificado->id), 'idInscricao'=>Crypt::encrypt($certificado->inscricaoId)])); ?>" tooltip="Excluir"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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