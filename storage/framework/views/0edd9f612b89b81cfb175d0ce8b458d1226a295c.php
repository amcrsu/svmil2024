<script src="<?php echo e(asset('lib/jquery/dist/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/jquery-mask-plugin/dist/jquery.mask.min.js')); ?>"></script>
<script type="text/javascript">
    $('.carousel[data-type="multi"] .item').each(function(){
        var next = $(this).next();
        if (!next.length) {
        next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i=0;i<4;i++) {
        next=next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
        }
    });  
</script>

<script src="<?php echo e(asset('lib/air-datepicker/dist/js/datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('lib/air-datepicker/dist/js/i18n/datepicker.pt-BR.js')); ?>"></script>

<?php echo $__env->yieldContent('javaScript'); ?>