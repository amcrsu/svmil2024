<?php $__env->startSection('content'); ?>
<h2 class="section-title">Minhas Inscrições</h2>
<p class="desc" align="center">Comando da 10ª Região Militar - Região Martim Soares Moreno</p>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
        <?php if($novaInscricao == 'true'): ?> <!-- habilitar botão nova inscrição -->
        <a href="<?php echo e(route('candidato.novaInscricao')); ?>" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Nova Inscrição</a><br /><br /><hr />
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
                                    <th>SubÁrea</th>
                                    <th>Ficha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $listaInscricoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inscricao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($inscricao->codInscricao); ?></td>
                                    <td><?php echo e($inscricao->categoria->categoria); ?></td>
                                    <td><?php echo e($inscricao->area->area); ?></td>
                                    <td><?php echo e(isset($inscricao->subarea->subarea) ? $inscricao->subarea->subarea : ''); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('candidato.gerarFicha', ['id'=>Crypt::encrypt($inscricao->id)])); ?>" target="_blank" tooltip="Ficha de Inscrição"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php else: ?>
        <p align="center">Nenhuma Inscrição Encontrada</p>
        <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>