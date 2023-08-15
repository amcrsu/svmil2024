<div class="alert alert-info" role="alert">
        <h4>Leia atentamente as informações abaixo!</h4>
        <ul>
            <li>Somente será aceita a experiência na área pretendida;</li>
            <li>A experiência profissional será considerada após a conclusão do curso que o habilita;</li>
            <li>Deverá cadastrar somente a experiência profissional que possa ser comprovada formalmente.</li>
        </ul>
</div>

<div class="form-group<?php echo e($errors->has('tipoExperienciaId') ? ' has-error' : ''); ?>">
    <label for="tipoExperienciaId" class="col-sm-2 control-label">Tipo de Experiência:<span class="required">*</span></label>
    <div class="col-sm-4">
        <select name="tipoExperienciaId" id="tipoExperienciaId" class="form-control" required>
            <option value="" disabled selected>Selecione</option>
            <?php $__currentLoopData = $listaTiposExperiencia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoTitulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(old('tipoExperienciaId') == $tipoTitulo->id): ?>
            <option value="<?php echo e($tipoTitulo->id); ?>" selected><?php echo e($tipoTitulo->tipoTitulo); ?></option>
            <?php else: ?>
            <option value="<?php echo e($tipoTitulo->id); ?>"><?php echo e($tipoTitulo->tipoTitulo); ?></option>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('tipoExperienciaId')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('tipoExperienciaId')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group<?php echo e($errors->has('nomeEmpresa') ? ' has-error' : ''); ?>">
    <label for="nomeEmpresa" class="col-sm-2 control-label">Nome do Local/Empresa:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="nomeEmpresa" name="nomeEmpresa" value="<?php echo e(old('nomeEmpresa')); ?>" placeholder="Nome do Local/empresa" maxlength="100" required>
        <?php if($errors->has('nomeEmpresa')): ?>
            <span class="help-block">
            <strong><?php echo e($errors->first('nomeEmpresa')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group<?php echo e($errors->has('dtInicial') || Session::has('erro') ? ' has-error' : ''); ?>">
    <label for="dtInicial" class="col-sm-2 control-label">Período Inicial e Final:<span class="required">*</span></label>
    <div class="col-sm-4">
        <input type="text" class="form-control readonly" readonly id="dtInicial" class="datepicker-here" name="dtInicial" data-mask="00/00/0000" maxlength="10" required>
    </div>
    <?php if($errors->has('dtInicial')): ?>
        <span class="help-block">
            <strong><?php echo e($errors->first('dtInicial')); ?></strong>
        </span>
    <?php endif; ?>
    <?php if(Session::has('erro')): ?>
        <span class="help-block">
            <strong><?php echo e(Session::get('erro')['msg']); ?></strong>
        </span>
    <?php endif; ?>
</div>
<div class="form-group<?php echo e($errors->has('cargo') ? ' has-error' : ''); ?>">
    <label for="cargo" class="col-sm-2 control-label">Cargo/Função:<span class="required">*</span></label>
    <div class="col-sm-2">
        <input type="text" class="form-control" id="cargo" name="cargo" value="<?php echo e(old('cargo')); ?>" maxlength="100" required>
        <?php if($errors->has('cargo')): ?>
            <span class="help-block">
            <strong><?php echo e($errors->first('cargo')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<div class="form-group<?php echo e($errors->has('atividades') ? ' has-error' : ''); ?>">
    <label for="atividades" class="col-sm-2 control-label">Principais atividades desempenhadas:<span class="required">*</span></label>
    <div class="col-sm-4">
        <textarea class="form-control" id="atividades" name="atividades" required><?php echo e(old('atividades')); ?></textarea>
        <?php if($errors->has('atividades')): ?>
            <span class="help-block">
            <strong><?php echo e($errors->first('atividades')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
</div>
<button class="btn btn-default pull-right" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Incluir Experiência</button>
<?php if(isset($listaExperiencias) and $listaExperiencias->count()): ?>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                <div class="portlet-body">
                    <div class="table-scrollable">
                    (<?php echo e($totalAnos); ?> ano(s), <?php echo e($totalMeses); ?> mês(es), <?php echo e($totalDias); ?> dia(s))
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Local</th>
                                    <th>Período</th>
                                    <th>Cargo</th>
                                    <th>Atividades</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $index = 0; ?>
                            <?php $__currentLoopData = $listaExperiencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experiencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($experiencia->tipoTitulo->tipoTitulo); ?></td>
                                <td><?php echo e($experiencia->nomeLocal); ?></td>
                                <td><?php echo e(date('d/m/Y', strtotime($experiencia->dtInicio))); ?> até <?php echo e(date('d/m/Y', strtotime($experiencia->dtFim))); ?></td>
                                <td><?php echo e($experiencia->cargo); ?></td>
                                <td><?php echo e($experiencia->atividades); ?></td>
                                <td>
                                    <a href="<?php echo e(route('candidato.excluirExperiencia', ['id'=>Crypt::encrypt($experiencia->id), 'idInscricao'=>Crypt::encrypt($experiencia->inscricaoId)])); ?>" tooltip="Excluir"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            <?php $index++; ?>
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