<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Sistema de Inscrição Online - SIOL | 10ª Região Militar</title>
    
    <link href="<?php echo e(asset('css/fonts.googleapis.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('lib/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('lib/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link  href="<?php echo e(asset('lib/air-datepicker/dist/css/datepicker.min.css')); ?>" rel="stylesheet">
    <link  href="<?php echo e(asset('lib/jquery-mobile-datepicker/jquery.mobile.datepicker.css')); ?>" rel="stylesheet">
    <link  href="<?php echo e(asset('lib/jquery-mobile-datepicker/jquery.mobile.datepicker.theme.css')); ?>" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   <script>
	window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
   </script>
</head>
<body>
    <?php echo $__env->make('layouts._header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <main class="site-main">
        <?php if(Session::has('mensagem')): ?>
        <div class="alert alert-<?php echo e(Session::get('mensagem')['class']); ?>" role="alert">
            <div align="center" class="card-content">
                <?php echo e(Session::get('mensagem')['msg']); ?>

            </div>
        </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <?php echo $__env->make('layouts._footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('layouts._scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </body>
</html>
