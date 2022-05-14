<div class="why pb-5">
	<div class="container-sm container-md container-lg container-xl container-xxl">
		<h3 class="fw-bolder text-custom text-center mb-3">
			چرا لندیپر ؟
		</h3>
		<div class="row">
	        <?php if(@$sloagens[0]): ?>
    			<div class="col-xxl-3 col-xl-4 col-sm-6 p-xl-4 p-lg-3 p-md-2 p-sm-1 mx-auto">
    				<div class="img text-center mx-auto">
    					<img src="<?php echo e(asset('assets/site/images/icon/personal-information.png')); ?>" alt="<?php echo e($sloagens[0]->title); ?>" class="w-50">
    				</div>
    				<div class="caption">
    					<h4 class="text-custom text-center my-3">
    						<?php echo e($sloagens[0]->title); ?>

    					</h4>
    					<p class="">
    					    <?php echo e($sloagens[0]->description); ?>

    					</p>
    				</div>
    			</div>
			<?php endif; ?>
			<?php if(@$sloagens[1]): ?>
            	<div class="col-xxl-3 col-xl-4 col-sm-6 p-xl-4 p-lg-3 p-md-2 p-sm-1 mx-auto">
    				<div class="img text-center mx-auto">
    					<img src="<?php echo e(asset('assets/site/images/icon/dont-touch.png')); ?>" alt="<?php echo e($sloagens[1]->title); ?>" class="w-50">
    				</div>
    				<div class="caption">
    					<h4 class="text-custom text-center my-3">
    						<?php echo e($sloagens[1]->title); ?>

    					</h4>
    					<p class="">
    					    <?php echo e($sloagens[1]->description); ?>

    					</p>
    				</div>
    			</div>
			<?php endif; ?>
			<?php if(@$sloagens[2]): ?>
    			<div class="col-xxl-3 col-xl-4 col-sm-6 p-xl-4 p-lg-3 p-md-2 p-sm-1 mx-auto">
    				<div class="img text-center mx-auto">
    					<img src="<?php echo e(asset('assets/site/images/icon/translating.png')); ?>" alt="<?php echo e($sloagens[2]->title); ?>" class="w-50">
    				</div>
    				<div class="caption">
    					<h4 class="text-custom text-center my-3">
    						<?php echo e($sloagens[2]->title); ?>

    					</h4>
    					<p class="">
    					    <?php echo e($sloagens[2]->description); ?>

    					</p>
    				</div>
			    </div>
			<?php endif; ?>
			<?php if(@$sloagens[3]): ?>
    			<div class="col-xxl-3 col-xl-4 col-sm-6 p-xl-4 p-lg-3 p-md-2 p-sm-1 mx-auto">
    				<div class="img text-center mx-auto">
    					<img src="<?php echo e(asset('assets/site/images/icon/advertising.png')); ?>" alt="<?php echo e($sloagens[3]->title); ?>" class="w-50">
    				</div>
    				<div class="caption">
    					<h4 class="text-custom text-center my-3">
    						<?php echo e($sloagens[3]->title); ?>

    					</h4>
    					<p class="">
    					    <?php echo e($sloagens[3]->description); ?>

    					</p>
    				</div>
    			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php /**PATH /Users/saeed/Documents/project-cm/landiper/resources/views/layouts/site/blocks/content/why.blade.php ENDPATH**/ ?>