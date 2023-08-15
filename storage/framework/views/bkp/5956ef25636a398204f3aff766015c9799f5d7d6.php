<div class="panel panel-default">
    <div class="panel-body">
        <p>Verifique a áre pretendida e se o curso realmente o habilita;</p>
        <p>Informe a data de conclusão do curso corretamente.</p>
    </div>
</div>
    <div class="form-group<?php echo e($errors->has('tipoTituloHabilitacaoId') ? ' has-error' : ''); ?>">
        <label for="tipoTituloHabilitacaoId" class="col-sm-2 control-label">Título:</label>
        <div class="col-sm-4">
            <select name="tipoTituloHabilitacaoId" id="tipoTituloHabilitacaoId" class="form-control" required autofocus>
                <option value="" disabled selected>Selecione</option>
                <?php $__currentLoopData = $listaTiposHabilitacao; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoTitulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(old('tipoTituloHabilitacaoId') == $tipoTitulo->id): ?>
                <option value="<?php echo e($tipoTitulo->id); ?>" selected><?php echo e($tipoTitulo->tipoTitulo); ?></option>
                <?php else: ?>
                <option value="<?php echo e($tipoTitulo->id); ?>"><?php echo e($tipoTitulo->tipoTitulo); ?></option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('tipoTituloHabilitacaoId')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('tipoTituloHabilitacaoId')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('nomeCursoHabilitacao') ? ' has-error' : ''); ?>">
        <label for="nomeCursoHabilitacao" class="col-sm-2 control-label">Nome do Curso:<span class="required">*</span></label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="nomeCursoHabilitacao" value="<?php echo e(old('nomeCursoHabilitacao')); ?>" name="nomeCursoHabilitacao" placeholder="Nome do Curso" maxlength="100" required>
            <?php if($errors->has('nomeCursoHabilitacao')): ?>
                <span class="help-block">
                <strong><?php echo e($errors->first('nomeCursoHabilitacao')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('instituicaoHabilitacao') ? ' has-error' : ''); ?>">
        <label for="instituicaoHabilitacao" class="col-sm-2 control-label">Instituição de Ensino:<span class="required">*</span></label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="instituicaoHabilitacao" value="<?php echo e(old('instituicaoHabilitacao')); ?>" name="instituicaoHabilitacao" placeholder="Nome da Instituição de Ensino" maxlength="100" required>
            <?php if($errors->has('instituicaoHabilitacao')): ?>
                <span class="help-block">
                <strong><?php echo e($errors->first('instituicaoHabilitacao')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <div class="form-group<?php echo e($errors->has('dtFormacaoHabilitacao') ? ' has-error' : ''); ?>">
        <label for="dtFormacaoHabilitacao" class="col-sm-2 control-label">Data de Formação:<span class="required">*</span></label>
        <div class="col-sm-2">
            <input type="text" class="form-control readonly" id="dtFormacaoHabilitacao" name="dtFormacaoHabilitacao" data-mask="00/00/0000" required readonly>
        </div>
        <?php if($errors->has('dtFormacaoHabilitacao')): ?>
            <span class="help-block">
            <strong><?php echo e($errors->first('dtFormacaoHabilitacao')); ?></strong>
            </span>
        <?php endif; ?>
    </div>
    <?php if(isset($listaHabilitacoes) and $listaHabilitacoes->count()): ?>
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
                                    <th>Data Formação</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $listaHabilitacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habilitacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($habilitacao->tipoTitulo->tipoTitulo); ?></td>
                                <td><?php echo e($habilitacao->nomeCurso); ?></td>
                                <td><?php echo e($habilitacao->instituicao); ?></td>
                                <td><?php echo e(date('d/m/Y', strtotime($habilitacao->dtFormacao))); ?></td>
                                <td>
                                    <a href="<?php echo e(route('candidato.excluirHabilitacao', ['id'=>Crypt::encrypt($habilitacao->id), 'idInscricao'=>Crypt::encrypt($habilitacao->inscricaoId)])); ?>" tooltip="Excluir"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
    <?php if($incluirHabilitacao == "1" OR $inscricao->categoria->id == 3): ?>
        <button class="btn btn-default pull-right" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Incluir Habilitação</button>
    <?php endif; ?>