<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.site.blocks.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        .navbar-expand-lg .navbar-nav .nav-link {
            padding-left: .8rem !important;
            padding-right: .8rem !important;
        }
    </style>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.site.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/saeed/Documents/project-cm/landiper/resources/views/site/index.blade.php ENDPATH**/ ?>