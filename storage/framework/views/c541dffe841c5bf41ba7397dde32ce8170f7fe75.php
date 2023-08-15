<?php $__env->startSection('content'); ?>
<h2 class="section-title">Minhas Inscrições</h2>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
        <?php if($novaInscricao == 'true'): ?>      <!-- HABILITAR BOTÃO NOVA INSCRIÇÃO (HIDE/SHOW)-->  
        <a href="<?php echo e(route('candidato.novaInscricao')); ?>" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="false"></i> Nova Inscrição</a><br /><br /><hr />
        <?php endif; ?>
        <?php if($listaInscricoes->count()): ?>
            <div class="portlet box primary">
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Cod Inscrição</th>
                                    <th>Nível</th>
                                    <th>Área</th>
                                    <th>Guarni&ccedil;&atilde;o</th>
                                    <th>Gerar GRU<br/>passo-a-passo</th>
                                    <th>Gerar GRU<br/>Acesso ao Sistema</th>
                                    <th>Imprimir<br/>Ficha de Inscrição</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $listaInscricoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscricao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($inscricao->codInscricao); ?></td>
                                    <td><?php echo e($inscricao->categoria->categoria); ?></td>
                                    <td><?php echo e($inscricao->area->area); ?></td>
                                    <td><?php echo e($inscricao->guarnicao); ?></td>
                                    

                                    <td><a href="https://svmil.10rm.eb.mil.br/docs/public/docs/TUTORIAL_EMISSAO_GRU_CET_2024.pdf" target="_blank" class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-file" aria-hidden="true"></span> VER PASSO-A-PASSO</a></td>
                                    <td><a href="https://www.10rm.eb.mil.br/pagtesouro/" class="btn btn-success btn-xs" target="_blank"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> GERAR GRU</a></td>
                                    <!-- <td><?php echo e(isset($inscricao->subarea->subarea) ? $inscricao->subarea->subarea : ''); ?>

                                    </td>                            
                                    <td> -->
                                        <td>
                                    <a href="<?php echo e(route('candidato.gerarFicha', ['id'=>Crypt::encrypt($inscricao->id)])); ?>" target="_blank" tooltip="Ficha de Inscrição" class="btn btn-info btn-xs"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> IMPRIMIR</a>
                                    </td> </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php else: ?>
        <p class="alert alert-info" align="center">Nenhuma Inscrição Encontrada</p>
        <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>