<?php echo $__env->make("layouts.elements.top", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make("layouts.elements.footer", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>