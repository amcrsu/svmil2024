<?php $__env->startSection('content'); ?>
<h2 class="section-title">Cadastro dos Dados Gerais</h2>
<p class="desc" align="center">Comando da 10ª Região Militar - Região Martim Soares Moreno</p>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>" name="formNovoCandidato" id="formNovoCandidato">
		<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <?php echo e(csrf_field()); ?>

                
                <div class="panel panel-default hide">
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
                                        <input type="checkbox" id="leuAviso" name="leuAviso"> Declaro que <b>LI e CONCORDO</b> com todos os termos previstos no <b>Aviso de Convocação nº 006/2023 - SSMR/10RM</b>, de 27 de julho de 2023.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <hr />
                <button id="btnSalvar" class="btn btn-primary pull-right hide" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar e Prosseguir</button>
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