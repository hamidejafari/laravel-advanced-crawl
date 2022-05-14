<?php $__env->startSection('content'); ?>

    <!-- <div class="header-in bg-custom d-flex align-items-center">
	<div class="container-sm container-md container-lg container-xl container-xxl">
	</div>
</div> -->

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0e2ea1" fill-opacity="1" d="M0,64L60,90.7C120,117,240,171,360,197.3C480,224,600,224,720,192C840,160,960,96,1080,74.7C1200,53,1320,75,1380,85.3L1440,96L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
    <div class="content">
        <div class="container-sm container-md container-lg container-xl container-xxl py-2">
            <div class="clearfix about-us px-3">

                <h1 class="text-custom fw-bolder h3 center" style="text-align: center;">
                    قوانین لندیپر
                </h1>
                <p>
                    <?php echo $setting_header->rules; ?>

                </p>
                <video controls style="margin-right: 3%;">
                  <source src="<?php echo e(asset('2021-04-25 15.55.56.mp4')); ?>" type="video/mp4">
                </video> 
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.site.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/saeed/Documents/project-cm/landiper/resources/views/site/rules.blade.php ENDPATH**/ ?>