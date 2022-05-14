<h4 class="text-custom-danger my-1 fw-bolder">
	راه های ارتباط با لندیپر :
</h4>
<hr class="my-2">
<br>
<ul class="px-0 m-0">
	<li class="list-unstyled">
		<a href="tel:<?php echo e($setting_header->phone); ?>" class="text-decoration-none d-flex align-items-center text-secondary">
			<i class="fas fa-phone"></i>
			<span class="me-2 fw-bolder">
				شماره تماس :
			</span>
			<span class="">
			<?php echo e($setting_header->phone); ?>

			</span>
		</a>
	</li>
	<br>
	<li class="list-unstyled">
		<a href="tel:<?php echo e($setting_header->phone2); ?>" class="text-decoration-none d-flex align-items-center text-secondary">
			<i class="fas fa-phone"></i>
			<span class="me-2 fw-bolder">
				شماره تماس :
			</span>
			<span class="">
			<?php echo e($setting_header->phone2); ?>

			</span>
		</a>
	</li>

    <?php if($setting_header->email): ?>
	<br>
	<li class="list-unstyled">
		<a href="mailto:info@gmail.com " class="text-decoration-none d-flex align-items-center text-secondary">
			<i class="fas fa-envelope"></i>
			<span class="me-2 fw-bolder">
				ایمیل :
			</span>
			<span class="">
			<?php echo e($setting_header->email); ?>

			</span>
		</a>
	</li>
    <?php endif; ?>

    <?php if($setting_header->address): ?>


    <br>
	<li class="list-unstyled">
		<a class="text-decoration-none d-flex align-items-center text-secondary">
			<i class="fas fa-map-marker-alt"></i>
			<span class="me-2 fw-bolder">
				آدرس :
			</span>
			<span class="">
			<?php echo e($setting_header->address); ?>

			</span>
		</a>
	</li>
    <?php endif; ?>

    <br>
</ul>
<ul class="px-0 m-0">
<?php $__currentLoopData = $social_so; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<li class="float-start list-unstyled">
		<a href="<?php echo e($row->address); ?>" target="_blank" class="text-decoration-none text-custom-danger">
			<i class="fab <?php echo e($row->image); ?>"></i>
		</a>
	</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ul>
<?php /**PATH /Users/saeed/Documents/project-cm/landiper/resources/views/site/contents/info-contact.blade.php ENDPATH**/ ?>