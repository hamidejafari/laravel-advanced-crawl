<!doctype html>
<html lang="fa">
<?php echo $__env->make('layouts.site.blocks.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body dir="rtl">

	<?php echo $__env->make('layouts.site.blocks.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php if(isset($data)): ?>
        <div class="header-in bg-custom d-flex align-items-center">
            <div class="container-sm container-md container-lg container-xl container-xxl">

            </div>
        </div>
    <?php endif; ?>
	<div class="content">
		 <?php echo $__env->yieldContent('content'); ?>
	</div>
	 <?php echo $__env->make('layouts.site.blocks.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	 <?php echo $__env->make('layouts.site.blocks.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	 <?php echo $__env->make('layouts.site.blocks.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /Users/saeed/Documents/project-cm/landiper/resources/views/layouts/site/master.blade.php ENDPATH**/ ?>