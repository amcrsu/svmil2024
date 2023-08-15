<?php $__env->startSection('content'); ?>
<section class="services">
    <h2 class="section-title">Cabo Especialista Temporário (CET) - Músico</h2>
    <h4 class="section-title">PROCESSO DE SELEÇÃO 2020</h4>
    <p class="desc">Nível Fundamental</p>
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
                        <p>Processo visando à seleção de candidatos voluntários para a prestação do Serviço Militar Especialista Temporário como Cabo Especialista Temporário, na área da 10ª Região Militar, para o ano de 2020.</p>
                        
                        <p class="alert alert-success" role="alert">O Sistema de inscrição para Cabo Especialista Temporário na área de MÚSICA estará disponível a partir das <strong>09:00h do dia 04 de maio de 2020 até às 12:00h do dia 14 de maio de 2020, conforme o Aviso de Seleção nº 001 - SSMR/10, de 29 de abril de 2020.</strong>
                        </p>
                        
                        <p>Para mais informações referentes ao processo seletivo, acesse o Aviso de Seleção clicando no link abaixo:</p>
                        
                        <p class="alert alert-info" role="alert">
                            <!-- <a href="<?php echo e(asset('docs/Aviso_Selecao_002.pdf')); ?>" target="_blank" title="Aviso de Seleção nº 001 - SSMR/10">-->
                            <a href="http://www.10rm.eb.mil.br/index.php/component/content/article?id=668" target="_blank" title="Aviso de Seleção para Cabo Especialista Temporário - Músico">
                                <i class="fa fa-file-pdf-o pequeno" aria-hidden="true"></i> Aviso de Seleção nº 001-SSMR/10RM, de 29 de abril de 2020.
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
                        <p class="alert alert-danger" role="alert">Caso tenha iniciado sua inscrição, mas não concluiu todo o processo, informe seus dados abaixo e acesse a <strong>Área do Candidato</strong> para dar continuidade na inscrição, gerar o <b>BOLETO de pagamento da GRU</b> e/ou realizar a <strong> impressão da Ficha de Inscrição</strong>.</p>
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