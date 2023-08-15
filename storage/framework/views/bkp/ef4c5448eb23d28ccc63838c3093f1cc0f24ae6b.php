<?php $__env->startSection('content'); ?>
<section class="services">
    <h2 class="section-title">PROCESSO DE SELEÇÃO 2018/2019</h2>
    <h4 class="section-title">Comando da 10ª Região Militar</h4>
    <p class="desc">Região Martim Soares Moreno</p>
    <hr />
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="media">
                    <div class="media-left media-top">
                        <i class="fa fa-cogs icon"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">INFORMAÇÕES</h4>
                        <p>Processo visando à seleção de candidatos voluntáriios para a prestação do Serviço Técnico Temporário (como Oficial Técnico Temporário ou Sargento Técnico Temporário 
                        ) e do Serviço Militar Especialista Temporário (como Cabo Especialista Temporário) na área da 10ª Região Militar para o ano de 2019.</p>
                        <p>Para mais informações referentes ao processo, acesse o Aviso de Seleção abaixo:</p>
                        <p>
                            <a href="<?php echo e(asset('docs/Aviso_Selecao_002.pdf')); ?>" target="_blank" title="Aviso de Seleção nº 001 - SSMR/10">
                                <i class="fa fa-file-pdf-o pequeno" aria-hidden="true"></i> Aviso de Seleção nº 001 - SSMR/10, de 23 de julho de 2018
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="media">
                    <div class="media-left media-top">
                        <i class="fa fa-user-md icon"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">ACESSO AO CANDIDATO</h4>
                        <p>Ainda não fez sua inscrição ? Clique no botão abaixo para fazê-la.</p>
                        <a href="<?php echo e(route('candidato.novo')); ?>" class="btn btn-primary">Fazer Minha Inscrição</a>
                        <hr />
                        <p>Se já fez sua inscrição, realize informe seus dados abaixo e acesse a Área do Candidato, onde você poderá realizar a impressão da Ficha de Inscrição.</p>
                        <form  method="POST" role="form" action="<?php echo e(route('login')); ?>">
			    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group<?php echo e($errors->has('cpf') ? ' has-error' : ''); ?>">
                                <label class="sr-only" for="cpf">CPF</label>
                                <div class="input-group col-sm-4">
                                    <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" data-mask="000.000.000-00" required autofocus value="<?php echo e(old('cpf')); ?>">
                                </div>
                                <?php if($errors->has('cpf')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('cpf')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group<?php echo e($errors->has('senha') ? ' has-error' : ''); ?>">
                                <label class="sr-only" for="senha">Senha</label>
                                <div class="input-group col-sm-4">
                                    <div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
                                    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required>
                                </div>
                                <?php if($errors->has('senha')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('senha')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-default"><i class="fa fa-sign-in" aria-hidden="true"></i> Acessar Área do Candidato</button>
                        </form>
                    </div>
                </div>
            </div>                  
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>