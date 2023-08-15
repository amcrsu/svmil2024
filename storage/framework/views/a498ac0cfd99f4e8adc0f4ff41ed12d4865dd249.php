<div class="alert alert-info" role="alert">
        <h4>Leia atentamente as informações abaixo!</h4>
        <ul>
            <li>Para os cursos <b>Técnico e/ou Profissionalizante</b>, informe apenas <b>01 Certificado</b>, desde que seja na área pretendida;</li>
            <li>Informe o <b>Certificado de Conclusão de Ensino Médio</b>, se possuir;</li>
            <li>Para os candidatos a <b>Motorista</b> informe a categoria da CNH (D ou E), máximo de 1 habilitação.</li>
            
        </ul>
    </div>
<div class="form-group<?php echo e($errors->has('tituloDiplomaId') ? ' has-error' : ''); ?>">
    <label for="tituloDiplomaId" class="col-sm-2 control-label">Título:</label>
    <div class="col-sm-4">
        <select name="tituloDiplomaId" id="tituloDiplomaId" class="form-control" required>
            <option value="" disabled selected>Selecione</option>
            <?php $__currentLoopData = $listaTiposTitulosGraus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoTitulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(old('tituloDiplomaId') == $tipoTitulo->id): ?>
            <option value="<?php echo e($tipoTitulo->id); ?>" selected><?php echo e($tipoTitulo->tipoTitulo); ?></option>
            <?php else: ?>
            <option value="<?php echo e($tipoTitulo->id); ?>"><?php echo e($tipoTitulo->tipoTitulo); ?></option>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('tituloDiplomaId')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('tituloDiplomaId')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group<?php echo e($errors->has('nomeCursoDiploma') ? ' has-error' : ''); ?>">
    <label for="nomeCursoDiploma" class="col-sm-2 control-label">Curso:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="nomeCursoDiploma" name="nomeCursoDiploma" value="<?php echo e(old('nomeCursoDiploma')); ?>" placeholder="Nome do Curso" maxlength="100" required>
        <?php if($errors->has('nomeCursoDiploma')): ?>
            <span class="help-block">
            <strong><?php echo e($errors->first('nomeCursoDiploma')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group<?php echo e($errors->has('instituicaoDiploma') ? ' has-error' : ''); ?>">
    <label for="instituicaoDiploma" class="col-sm-2 control-label">Instituição onde realizou o curso:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="instituicaoDiploma" name="instituicaoDiploma" value="<?php echo e(old('instituicaoDiploma')); ?>" placeholder="Nome da Instituição" maxlength="100" required>
        <?php if($errors->has('instituicaoDiploma')): ?>
            <span class="help-block">
            <strong><?php echo e($errors->first('instituicaoDiploma')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group<?php echo e($errors->has('dtConclusaoDiploma') ? ' has-error' : ''); ?>">
    <label for="dtConclusaoDiploma" class="col-sm-2 control-label">Data da Conclusão:<span class="required">*</span></label>
    <div class="col-sm-2">
        <input type="text" class="form-control readonly" id="dtConclusaoDiploma" name="dtConclusaoDiploma" data-mask="00/00/0000" placeholder="00/00/0000" required>
    </div>
    <?php if($errors->has('dtConclusaoDiploma')): ?>
        <span class="help-block">
        <strong><?php echo e($errors->first('dtConclusaoDiploma')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<button class="btn btn-default pull-right" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Incluir Título/Diploma</button>
<?php if(isset($listaTitulos) and $listaTitulos->count()): ?>
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
                                    <th>Curso</th>
                                    <th>Instituição</th>
                                    <th>Data Conclusão</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $listaTitulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $titulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($titulo->tipoTitulo->tipoTitulo); ?></td>
                                <td><?php echo e($titulo->curso); ?></td>
                                <td><?php echo e($titulo->instituicao); ?></td>
                                <td><?php echo e(date('d/m/Y', strtotime($titulo->dtConclusao))); ?></td>
                                <td>
                                    <a href="<?php echo e(route('candidato.excluirTitulo', ['id'=>Crypt::encrypt($titulo->id), 'idInscricao'=>Crypt::encrypt($titulo->inscricaoId)])); ?>" tooltip="Excluir"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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