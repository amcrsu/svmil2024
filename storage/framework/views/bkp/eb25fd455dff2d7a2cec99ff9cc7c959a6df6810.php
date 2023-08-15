<?php $__env->startSection('content'); ?>
<h2 class="section-title">Cadastro de Habilitações e Dados Profissionais</h2>
<p class="desc" align="center">Comando da 10ª Região Militar - Região Martim Soares Moreno</p>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Habilitação Mínima Exigida (na Área de Interesse pretendida)</h4>
                </div>
                <div class="panel-body">
                    <p>
                    <?php $disabled = "1"; $incluirHabilitacao = "1"; ?>
                    <?php if($inscricao->categoria->id == 1 AND $listaHabilitacoes->count() == 1): ?> 
                        <?php $disabled = "0"; $incluirHabilitacao = "0"; ?>
                    <?php elseif($inscricao->categoria->id == 2 AND ($inscricao->area->id >=31 AND $inscricao->area->id <=41) AND $listaHabilitacoes->count() == 1): ?> 
                        <?php $disabled = "0"; $incluirHabilitacao = "1"; ?>
                    <?php elseif($inscricao->categoria->id == 2 AND ($inscricao->area->id >=31 AND $inscricao->area->id <=41) AND $listaHabilitacoes->count() == 1): ?> 
                        <?php $disabled = "0"; $incluirHabilitacao = "0"; ?>
                    <?php elseif($inscricao->categoria->id == 2 AND $listaHabilitacoes->count() == 2): ?> 
                        <?php $disabled = "0"; $incluirHabilitacao = "0"; ?>
                    <?php elseif($inscricao->categoria->id == 3): ?>
                        <?php if(isset($listaHabilitacoes)): ?>
                            <?php if($inscricao->area->id == 56 and $listaHabilitacoes->count() >= 3): ?>
                                <?php $qtde = 0; ?>
                                <?php $__currentLoopData = $listaHabilitacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $habCET): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($habCET->tipoTitulo->id == 44 || $habCET->tipoTitulo->id == 45): ?>
                                        <?php $qtde++; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if($qtde == 2): ?>
                                    <?php $disabled = "0"; $incluirHabilitacao = "0"; ?>
                                <?php endif; ?>
                        <!-- regra para habilitar o botão "Finalizar Inscrição" -->
                            <?php elseif($inscricao->area->id != 57 OR $inscricao->area->id !=56 and $listaHabilitacoes->count() == 1): ?>
                            <?php $disabled = "0"; $incluirHabilitacao = "0"; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <form class="form-horizontal" method="post" action="<?php echo e(route('candidato.addHabilitacao')); ?>">
                    <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="idInscricao" value="<?php echo e($id); ?>">
                        <?php echo $__env->make('habilitacoes._habilitacoes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </form>
                    </p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Títulos/Graus/Diplomas (na Área de Interesse pretendida)</h4>
                </div>
                <div class="panel-body">
                    <p>
                    <form class="form-horizontal" method="post" action="<?php echo e(route('candidato.addTitulo')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="idInscricao" value="<?php echo e($id); ?>">
                    <?php echo $__env->make('habilitacoes._titulos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </form>
                    </p>
                </div>
            </div>  

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Cursos (na Área de Interesse pretendida)</h4>
                </div>
                <div class="panel-body">
                    <p>
                    <form class="form-horizontal" method="post" action="<?php echo e(route('candidato.addCurso')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="idInscricao" value="<?php echo e($id); ?>">
                    <?php echo $__env->make('habilitacoes._cursos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </form>
                    </p>
                </div>
            </div>
            <?php if($inscricao->categoria->id != 3): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Certificações (na Área de Interesse pretendida)</h4>
                </div>
                <div class="panel-body">
                    <p>
                    <form class="form-horizontal" method="post" action="<?php echo e(route('candidato.addCertificado')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="idInscricao" value="<?php echo e($id); ?>">
                    <?php echo $__env->make('habilitacoes._certificacoes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </form>
                    </p>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Publicações Técnicas (na Área de Interesse pretendida)</h4>
                </div>
                <div class="panel-body">
                    <p>
                    <form class="form-horizontal" method="post" action="<?php echo e(route('candidato.addPublicacao')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="idInscricao" value="<?php echo e($id); ?>">
                    <?php echo $__env->make('habilitacoes._publicacoes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </form>
                    </p>
                </div>
            </div>
            <?php endif; ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">Exercício de Atividade Profissional (na Área de Interesse pretendida)</h4>
                </div>
                <div class="panel-body">
                   <p>
                   <form class="form-horizontal" method="post" action="<?php echo e(route('candidato.addExperiencia')); ?>">
                    <?php echo e(csrf_field()); ?>

                   <input type="hidden" name="idInscricao" value="<?php echo e($id); ?>">
                    <?php echo $__env->make('habilitacoes._experiencia', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </form>
                    </p>
                </div>
            </div>
            <hr />
            
            <button class="btn btn-primary pull-right" <?php echo e($disabled === "1" ? "disabled" : ""); ?> type="button" data-toggle="modal" data-target="#modalConfirmacao"><i class="fa fa-floppy-o" aria-hidden="true"></i> Finalizar Inscrição</button>
            <br /><br /><br />
            <!-- Modal -->
            <div class="modal fade" id="modalConfirmacao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Finalizar Inscrição</h4>
                    </div>
                    <div class="modal-body">
                        Todos os seus dados estão corretos? Após finalizar a inscrição, os mesmos não poderão mais ser alterados.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Alterar Dados</button>
                        <a href="<?php echo e(route('candidato.finalizar', ['id'=>Crypt::encrypt($id)])); ?>" class="btn btn-primary">Concluir Inscrição</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javaScript'); ?>
<script src="<?php echo e(asset('js/habilitacoes.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>