<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
        <i class="fa fa-universal-access" aria-hidden="true"></i> Dados Gerais
        </h3>
    </div>
    <div class="panel-body">
        <div class="form-group<?php echo e($errors->has('nome') ? ' has-error' : ''); ?>">
            <label for="nome" class="col-sm-2 control-label">Nome Completo:<span class="required">*</span></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo e(old('nome')); ?>" required maxlength="100">
            </div>
            <?php if($errors->has('nome')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('nome')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div id="divEmail" class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <label for="email" class="col-sm-2 control-label">E-mail:<span class="required">*</span></label>
            <div class="col-sm-6">
                <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required maxlength="100">
                <span class="help-block" id="erroValidacaoEmail">
                    <strong><label id="erroEmail"></label></strong>
                </span>
                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group<?php echo e($errors->has('nomePai') ? ' has-error' : ''); ?>">
            <label for="nomePai" class="col-sm-2 control-label">Nome do Pai:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="nomePai" name="nomePai" value="<?php echo e(old('nomePai')); ?>" maxlength="100">
            </div>
            <?php if($errors->has('nomePai')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('nomePai')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('nomeMae') ? ' has-error' : ''); ?>">
            <label for="nomeMae" class="col-sm-2 control-label">Nome da Mãe:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="nomeMae" name="nomeMae" value="<?php echo e(old('nomeMae')); ?>" maxlength="100">
            </div>
            <?php if($errors->has('nomeMae')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('nomeMae')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
         <div class="form-group<?php echo e($errors->has('numDependentes') ? ' has-error' : ''); ?>">
            <label for="numDependentes" class="col-sm-2 control-label">Nº de Dependentes:<span class="required">*</span></label>
            <div class="col-sm-2">
                <input type="number" min="0" data-mask="00" required class="form-control" id="numDependentes" name="numDependentes" value="<?php echo e(old('numDependentes')); ?>" maxlength="100">
            </div>
            <?php if($errors->has('numDependentes')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('numDependentes')); ?></strong>
                </span>
            <?php endif; ?>
        </div> 
        <div class="form-group<?php echo e($errors->has('sexo') ? ' has-error' : ''); ?>">
            <label for="sexo" class="col-sm-2 control-label">Sexo:<span class="required">*</span></label>
            <div class="col-sm-2">
                <div class="radio">
                    <label>
                        <?php if(old('sexo') == 'M'): ?>
                        <input checked type="radio" name="sexo" value="M" required /> Masculino
                        <?php else: ?>
                        <input type="radio" name="sexo" value="M" required /> Masculino
                        <?php endif; ?>
                    </label>
                </div>
               - <div class="radio">
                    <label>
                        <?php if(old('sexo') == 'F'): ?>
                        <input checked type="radio" name="sexo" value="F" required /> Feminino
                        <?php else: ?>
                        <input type="radio" name="sexo" value="F" required /> Feminino
                        <?php endif; ?>
                    </label>
                </div> 
            </div>
            <?php if($errors->has('sexo')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('sexo')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div id="divAltura" class="form-group<?php echo e($errors->has('altura') ? ' has-error' : ''); ?>">
            <label for="altura" class="col-sm-2 control-label">Altura:<span class="required">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="altura" name="altura" value="<?php echo e(old('altura')); ?>" data-mask="0.00" required>
            </div>
            <?php if($errors->has('altura')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('altura')); ?></strong>
                </span>
            <?php endif; ?>
            <span class="help-block" id="validaAltura">
                <strong>Altura inválida</strong>
            </span>
        </div>
        <div class="form-group<?php echo e($errors->has('rg') ? ' has-error' : ''); ?>">
            <label for="rg" class="col-sm-2 control-label">RG:<span class="required">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="rg" name="rg" value="<?php echo e(old('rg')); ?>" required maxlength="20">
            </div>
            <?php if($errors->has('rg')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('rg')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('orgaoExpedidor') || $errors->has('ufOrgaoExpedId') ? ' has-error' : ''); ?>">
            <label for="orgaoExpedidor" class="col-sm-2 control-label">Órgão Expedidor:<span class="required">*</span></label>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="orgaoExpedidor" name="orgaoExpedidor" value="<?php echo e(old('orgaoExpedidor')); ?>" required maxlength="15">
            </div>
            <?php if($errors->has('orgaoExpedidor')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('orgaoExpedidor')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('estadoCivilId') ? ' has-error' : ''); ?>">
            <label for="estadoCivilId" class="col-sm-2 control-label">Estado Civil:<span class="required">*</span></label>
            <div class="col-sm-2">
                <select name="estadoCivilId" id="estadoCivilId" required class="form-control">
                    <option value="" disabled selected>Selecione</option>
                    <?php $__currentLoopData = $estadosCivisList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estadoCivil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(old('estadoCivilId') == $estadoCivil->id): ?>
                        <option value="<?php echo e($estadoCivil->id); ?>" selected><?php echo e($estadoCivil->estadoCivil); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($estadoCivil->id); ?>"><?php echo e($estadoCivil->estadoCivil); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php if($errors->has('estadoCivilId')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('estadoCivilId')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('dtNascimento') ? ' has-error' : ''); ?>">
            <label for="dtNascimento" class="col-sm-2 control-label">Data de Nascimento:<span class="required">*</span></label>
            <div class="col-sm-2">
                <input type="hidden" id="dtNascimentoSelecionado" value="<?php echo e(old('dtNascimento')); ?>">
                <input type="text" class="form-control readonly" id="dtNascimento" name="dtNascimento" value="<?php echo e(old('dtNascimento')); ?>" data-mask="00/00/0000" required data-language='pt-BR' >
            </div>
            <?php if($errors->has('dtNascimento')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('dtNascimento')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('ufNascimentoId') || $errors->has('cidadeNascId') ? ' has-error' : ''); ?>">
            <label for="ufNascimentoId" class="col-sm-2 control-label">UF Nascimento/Cidade Nascimento:<span class="required">*</span></label>
            <div class="col-sm-2">
                <select name="ufNascimentoId" id="ufNascimentoId" required class="form-control">
                    <option value="" disabled selected>Selecione</option>
                    <?php $__currentLoopData = $ufList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(old('ufNascimentoId') == $uf->id): ?>
                        <option value="<?php echo e($uf->id); ?>" selected><?php echo e((isset($uf->sigla)) ? $uf->sigla . ' - ' . $uf->estado : $uf->estado); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($uf->id); ?>"><?php echo e((isset($uf->sigla)) ? $uf->sigla . ' - ' . $uf->estado : $uf->estado); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php if($errors->has('ufNascimentoId')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('ufNascimentoId')); ?></strong>
                </span>
            <?php endif; ?>
            <div class="col-sm-4">
                <input type="hidden" name="cidadeNascId" id="cidadeNascId" value="<?php echo e(old('cidadeNascId')); ?>">
                <select name="cidadeNascId" id="cidadeNascId" required class="form-control">
                    <option value="" disabled selected>Selecione</option>
                </select>
            </div>
            <?php if($errors->has('cidadeNascId')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('cidadeNascId')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('anosSvPub') || $errors->has('mesesSvPub') || $errors->has('diasSvPub') ? ' has-error' : ''); ?>">
            <label for="svPub" class="col-sm-2 control-label">Tempo de Serviço Anterior nas Forças Armadas:<span class="required">*</span></label></label>
            <div class="col-sm-2">
                <select name="anosSvPub" id="anosSvPub" class="form-control">
                    <?php for($i = 0; $i < 5; $i++): ?>
                        <?php if(old('anosSvPub') == $i): ?>
                            <option value="<?php echo e($i); ?>" selected><?php echo e($i); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                        <?php endif; ?>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="col-sm-2">
                <select name="mesesSvPub" id="mesesSvPub" class="form-control">
                    <option value="0" disabled selected>Meses</option>
                    <?php for($i = 0; $i < 13; $i++): ?>
                        <?php if(old('mesesSvPub') == $i): ?>
                            <option value="<?php echo e($i); ?>" selected><?php echo e($i); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                        <?php endif; ?>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="col-sm-2">
                <select name="diasSvPub" id="diasSvPub" class="form-control">
                    <option value="0" disabled selected>Dias</option>
                    <?php for($i = 0; $i < 32; $i++): ?>
                        <?php if(old('diasSvPub') == $i): ?>
                            <option value="<?php echo e($i); ?>" selected><?php echo e($i); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                        <?php endif; ?>
                    <?php endfor; ?>
                </select>
            </div>
        </div>
        <div class="form-group<?php echo e($errors->has('situacaoId') ? ' has-error' : ''); ?>">
            <label for="situacaoId" class="col-sm-2 control-label">Situação:<span class="required">*</span></label>
            <div class="col-sm-4">
                <select name="situacaoId" id="situacaoId" required class="form-control">
                    <option value="" disabled selected>Selecione</option>
                    <?php $__currentLoopData = $situacaoList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $situacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(old('situacaoId') == $situacao->id): ?>
                        <option value="<?php echo e($situacao->id); ?>" selected><?php echo e($situacao->situacao); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($situacao->id); ?>"><?php echo e($situacao->situacao); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php if($errors->has('situacaoId')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('situacaoId')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('tipoDocMilitarId') ? ' has-error' : ''); ?>">
            <label for="tipoDocMilitarId" class="col-sm-2 control-label">Possui Documento Militar ?:<span class="required">*</span></label>
            <div class="col-sm-6">
                <select name="tipoDocMilitarId" id="tipoDocMilitarId" required class="form-control">
                    <option value="" disabled selected>Selecione</option>
                    <?php $__currentLoopData = $tiposDocMilList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoDoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(old('tipoDocMilitarId') == $tipoDoc->id): ?>
                        <option value="<?php echo e($tipoDoc->id); ?>" selected><?php echo e((isset($tipoDoc->sigla)) ? $tipoDoc->sigla . ' - ' . $tipoDoc->tipoDocumento : $tipoDoc->tipoDocumento); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($tipoDoc->id); ?>"><?php echo e((isset($tipoDoc->sigla)) ? $tipoDoc->sigla . ' - ' . $tipoDoc->tipoDocumento : $tipoDoc->tipoDocumento); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php if($errors->has('tipoDocMilitarId')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('tipoDocMilitarId')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo e($errors->has('idtMil') || $errors->has('forcaId') ? ' has-error' : ''); ?>" id="divDocMilitar">
            <label for="idtMil" class="col-sm-2 control-label">Nº Identidade Militar/Força:<span class="required">*</span></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="idtMil" name="idtMil" value="<?php echo e(old('idtMil')); ?>" data-mask="000000000-0" required>
                <?php if($errors->has('idtMil')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('idtMil')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
            <div class="col-sm-3">
                <select name="forcaId" id="forcaId" required class="form-control">
                    <option value="" disabled selected>Selecione</option>
                    <?php $__currentLoopData = $forcaList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(old('forcaId') == $forca->id): ?>
                        <option value="<?php echo e($forca->id); ?>" selected><?php echo e((isset($forca->sigla)) ? $forca->sigla . ' - ' . $forca->forca : $forca->forca); ?></option>
                        <?php else: ?>
                        <option value="<?php echo e($forca->id); ?>"><?php echo e((isset($forca->sigla)) ? $forca->sigla . ' - ' . $forca->forca : $forca->forca); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php if($errors->has('forcaId')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('forcaId')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->startSection('javaScript'); ?>

##parent-placeholder-3a6762a693786af632bcafff8ce4dc70a708bc16##

<script>

    // minDate: Incorp Março - nascimento 14/03/1983 
    //maxDate: 19 anos 06/03/2005

    function minMaxDateNiver(dia, mes, ano) {
        return ( new Date(1983, 07, 14) > new Date(ano, mes, dia) ) || ( new Date(2005, 03, 06) < new Date(ano, mes, dia) );
    }

    $('#dtNascimento').change(function(d) {
        var dataPessoa = $(this).val();
        var dataArray = dataPessoa.split('/');
 
        if ( dataArray.length !== 3 ) {
            $('#dtNascimento').val('');
            $('#dtNascimento').focus();
        } else {
            if ( minMaxDateNiver(dataArray[0], dataArray[1], dataArray[2]) )
            {
                $('#dtNascimento').val('');
                alert('Data de Nascimento fora dos limites aceitos.');
                $('#dtNascimento').focus();
            }
        }
    });
</script>

<?php $__env->stopSection(); ?>