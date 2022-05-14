
<?php if(isset($errors)): ?>
    <?php if($errors->any() || Session::has('error')): ?>
        <?php if(Session::has('error')): ?>


            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo Session::get('error'); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php endif; ?>
        <?php if(isset($errors)): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $error; ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>

<?php if(Session::has('success')): ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo Session::get('success'); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php endif; ?>
<?php if(isset($success)): ?>


    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $success; ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>


<?php endif; ?>

<?php if(Session::has('info')): ?>


    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?php echo Session::get('info'); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>


<?php endif; ?>
<?php /**PATH /Users/saeed/Documents/project-cm/landiper/resources/views/layouts/site/blocks/message-new.blade.php ENDPATH**/ ?>