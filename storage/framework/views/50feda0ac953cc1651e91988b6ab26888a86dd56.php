<div class="alert alert-info" role="alert">
        <h4>Leia atentamente as informações abaixo!</h4>
        <ul>
            <li>Para: "Cursos com carga horária de duração mínima de 120, 80, 40 e 30 horas", cadastrar <b>no máximo de 03 cursos</b>, por carga horária. </li>
            <li>Para: "Carteira Nacional de Habilitação Categoria (B, C, D ou E)" <b>cadastrar a de maior categoria.</b> </li>
            
        </ul>
</div>
<div class="form-group<?php echo e($errors->has('tipoTituloCursoId') ? ' has-error' : ''); ?>">
    <label for="tipoTituloCursoId" class="col-sm-2 control-label">Categoria:<span class="required">*</span></label>
    <div class="col-sm-4">
        <select name="tipoTituloCursoId" id="tipoTituloCursoId" class="form-control" required>
            <option value="" disabled selected>Selecione</option>
            <?php $__currentLoopData = $listaTiposCurso; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoTitulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(old('tipoTituloCursoId') == $tipoTitulo->id): ?>
            <option value="<?php echo e($tipoTitulo->id); ?>" selected><?php echo e($tipoTitulo->tipoTitulo); ?></option>
            <?php else: ?>
            <option value="<?php echo e($tipoTitulo->id); ?>"><?php echo e($tipoTitulo->tipoTitulo); ?></option>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('tipoTituloCursoId')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('tipoTituloCursoId')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group<?php echo e($errors->has('cursoFormacao') ? ' has-error' : ''); ?>">
    <label for="cursoFormacao" class="col-sm-2 control-label">Curso:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="cursoFormacao" value="<?php echo e(old('cursoFormacao')); ?>" name="cursoFormacao" placeholder="Nome do Curso/Formação" maxlength="100" required>
        <?php if($errors->has('cursoFormacao')): ?>
            <span class="help-block">
            <strong><?php echo e($errors->first('cursoFormacao')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group<?php echo e($errors->has('instituicaoOMCurso') ? ' has-error' : ''); ?>">
    <label for="instituicaoOMCurso" class="col-sm-2 control-label">Instituição:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="instituicaoOMCurso" value="<?php echo e(old('instituicaoOMCurso')); ?>" name="instituicaoOMCurso" placeholder="Nome da Instituição/OM" maxlength="100" required>
        <?php if($errors->has('instituicaoOMCurso')): ?>
            <span class="help-block">
            <strong><?php echo e($errors->first('instituicaoOMCurso')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group<?php echo e($errors->has('dtConclusaoConvocacao') ? ' has-error' : ''); ?>">
    <label for="dtConclusaoConvocacao" class="col-sm-2 control-label">Data da Conclusão:<span class="required">*</span></label>
    <div class="col-sm-2">
        <input type="text" class="form-control readonly"  id="dtConclusaoConvocacao" name="dtConclusaoConvocacao" data-mask="00/00/0000" placeholder="00/00/0000" required>
    </div>
    <?php if($errors->has('dtConclusaoConvocacao')): ?>
        <span class="help-block">
        <strong><?php echo e($errors->first('dtConclusaoConvocacao')); ?></strong>
        </span>
    <?php endif; ?>
</div>
<button class="btn btn-default pull-right" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Incluir Curso</button>
<?php if(isset($listaCursos) and $listaCursos->count()): ?>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Curso</th>
                                    <th>Instituição</th>
                                    <th>Data Conclusão</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $listaCursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($curso->tipoTitulo->tipoTitulo); ?></td>
                                <td><?php echo e($curso->curso); ?></td>
                                <td><?php echo e($curso->instituicao); ?></td>
                                <td><?php echo e(date('d/m/Y', strtotime($curso->dtConclusao))); ?></td>
                                <td>
                                    <a href="<?php echo e(route('candidato.excluirCurso', ['id'=>Crypt::encrypt($curso->id), 'idInscricao'=>Crypt::encrypt($curso->inscricaoId)])); ?>" tooltip="Excluir"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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