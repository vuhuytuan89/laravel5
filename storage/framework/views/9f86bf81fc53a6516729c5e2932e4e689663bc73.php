<!--/header-->
<?php echo $__env->make("layouts.elements.top", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--/slider-->
<?php echo $__env->make("layouts.elements.slide", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<?php echo $__env->make("layouts.elements.sidebar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			</div>
			<div class="col-sm-9 padding-right">
				<?php echo $__env->yieldContent('content'); ?>
			</div>
		</div>
	</div>
</section>
<?php echo $__env->make("layouts.elements.footer", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>