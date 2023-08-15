<?php $__env->startSection('content'); ?>
<h2 class="section-title">Cadastro dos Dados Gerais</h2>
<p class="desc" align="center">Comando da 10ª Região Militar - Região Martim Soares Moreno</p>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>" name="formNovoCandidato" id="formNovoCandidato">
		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <?php echo e(csrf_field()); ?>

                <?php echo $__env->make('dadosGerais._dadosAcesso', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('dadosGerais._dadosProcesso', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('dadosGerais._dadosGerais', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('dadosGerais._dadosEndereco', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('dadosGerais._dadosContato', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                        <i class="fa fa-book" aria-hidden="true"></i> Leitura do Aviso de Seleção
                        </h3>
                    </div>
                    <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="col-sm-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="leuAviso" name="leuAviso"> Declaro que li o Aviso de Seleção nº 001 - SSMR/10, de 19 de junho de 2019 e concordo com o mesmo.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <hr />
                <button id="btnSalvar" class="btn btn-primary pull-right" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar e Prosseguir</button>
                <br /><br /><br />
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javaScript'); ?>
<script src="<?php echo e(asset('js/novoCandidatoScripts.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>