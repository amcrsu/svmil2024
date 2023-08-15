<?php $__env->startSection('content'); ?>
<section class="services">
<div class=" head-title-cover">
<div class=" head-title">
    <h2 class="section-title">Cabo Especialista Temporário - CET</h2>
    <h4 class="section-title">PROCESSO DE SELEÇÃO 2021 PARA 2022</h4>
    <p class="desc">- Nível Fundamental -</p>
    <div class="arrow">
                <span></span>
                <span></span>
                <span></span>
    </div>
</div>
</div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="media">
                    <div class="media-left media-top">
                        <i class="fa fa-cogs icon"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">INFORMAÇÕES</h4>
                        <p>Processo visando à seleção de candidatos voluntários para a prestação do Serviço Militar Especialista Temporário como Cabo Especialista Temporário, na área da 10ª Região Militar, para o ano de 2021.</p>
                        
                        <p class="alert alert-success" role="alert">O Sistema de inscrição para Cabo Especialista Temporário estará disponível a partir das <strong>09:00h do dia 31 de agosto de 2020 até às 12:00h do dia 17 de setembro de 2020, conforme o Aviso de Seleção nº 006 - SSMR/10, de 14 de agosto de 2020.</strong>
                        </p>
                        
                        <p>Para mais informações referentes ao processo seletivo, acesse o Aviso de Seleção clicando no link abaixo:</p>
                        
                        <p class="alert alert-info" role="alert">
                            <!-- <a href="<?php echo e(asset('docs/Aviso_Selecao_002.pdf')); ?>" target="_blank" title="Aviso de Seleção nº 001 - SSMR/10">-->
                            <a href="http://www.10rm.eb.mil.br/index.php/component/content/article?id=717" target="_blank" title="Aviso de Seleção para Cabo Especialista Temporário - CET">
                                <i style="float:left; margin-right:7px;display:block;" class="fa fa-file-pdf-o fa-3x" aria-hidden="true"></i>Aviso de Convocação nº 006 - SSMR / 10RM, de 14 de agosto de 2020.
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
                        <p class="alert alert-danger hide" role="alert" style="text-align:center;">INSCRIÇÕES ENCERRADAS!!!</p>
                        <!-- BOTAO FAZER INSCRIÇAO -->
                        <a href="<?php echo e(route('candidato.novo')); ?>" class="btn btn-primary ">Fazer Minha Inscrição</a>
                    </div>
                        <hr />
                    
                        <div class="media-left media-top">
                            <i class="fa fa-sign-in icon"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">ACESSO A ÁREA DO CANDIDATO</h4>

                            <p>Caso tenha iniciado sua inscrição, mas não concluiu todo o processo, informe seu <b>CPF e SENHA</b> abaixo para acessar a <strong>Área do Candidato</strong> e dar continuidade à sua inscrição ou realizar a <strong> impressão da Ficha de Inscrição</strong>.</p>

                            <!-- OCULTAR E EXIBIR A DIV COM A CLASS HIDE/TRUE -->
                            <div class="hide" class="alert alert-danger" role="alert">
                            <p>Caso tenha finalizado sua inscrição, informe seus dados abaixo e acesse a <strong>Área do Candidato</strong> para gerar o <b>BOLETO de pagamento da GRU</b> e/ou realizar a <strong> impressão da Ficha de Inscrição</strong>.</p>
                            </div>
                        
                        <form  method="POST" role="form" action="<?php echo e(route('login')); ?>">
			    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group<?php echo e($errors->has('cpf') ? ' has-error' : ''); ?>">
                                <label class="sr-only" for="cpf">CPF</label>
                                <div class="input-group col-sm-4">
                                    <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" data-mask="000.000.000-00" required  value="<?php echo e(old('cpf')); ?>">
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