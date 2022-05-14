<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/site/images/favicon.jpg')); ?>" type="image/x-icon">

    <?php $setting_head = \App\Models\Setting::first(); ?>
    <title><?php echo $__env->yieldContent('title',$setting_head->title_seo); ?></title>

    <!-- Bootstrap, Style, Color CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/site/css/bootstrap.rtl.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/site/css/style.css?v0.07')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/site/css/responsive.css?v0.01')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/site/css/color.css?v0.02')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/site/css/rtl.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/site/css/bgimg.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('node_modules/bootstrap-icons/font/bootstrap-icons.css')); ?>">
    <script src="<?php echo e(asset('assets/site/js/jquery-3.5.1.slim.min.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/site/css/toastr.css')); ?>">
    <script src="<?php echo e(asset('assets/site/js/toastr.js')); ?>"></script>
    <!-- Fontawesome js -->
    <script src="<?php echo e(asset('assets/site/js/fontawesome.js')); ?>"></script>

    <?php echo $__env->yieldContent('schema',$setting_head->schema_code); ?>

    <?php echo $__env->yieldContent('css',''); ?>
</head>
<?php /**PATH /Users/saeed/Documents/project-cm/landiper/resources/views/layouts/site/blocks/head.blade.php ENDPATH**/ ?>