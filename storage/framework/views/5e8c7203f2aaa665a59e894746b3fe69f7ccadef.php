<?php if($setting_header->req == 1 && $setting_header->faq == 1 ): ?>
<div class="faq-home position-relative">
	<img src="assets/site/images/bac.png" alt="" class="w-100 bg">
	<div class="overlay position-absolute top-0 bottom-0 end-0 start-0 d-flex align-items-center py-3">
		<div class="container-sm container-md container-lg container-xl container-xxl">
			<div class="row">
			    <?php if($setting_header->req == 1): ?>
				<div class="col-md-5 col-sm-12 text-center p-xl-4 p-lg-3 p-md-2 p-sm-1">
					<h4 class="text-custom fw-bolder my-5">
						فرم ارسال سوال و درخواست
					</h4>
					<?php echo $__env->make('layouts.site.blocks.content.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				</div>
				<?php endif; ?>
				 <?php if($setting_header->faq == 1): ?>
				<div class="col-md-6 col-sm-12 text-center ms-auto p-xl-4 p-lg-3 p-md-2 p-sm-1">
					<h4 class="text-custom fw-bolder my-5">
						سوالات متداول
					</h4>
					<div class="accordion" id="accordionExample">
					<?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="accordion-item">
							<h2 class="accordion-header" id="heading<?php echo e($row->id); ?>">
								<button class="accordion-button collapsed position-relative text-custom"
									type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($row->id); ?>"
									aria-expanded="true" aria-controls="collapse<?php echo e($row->id); ?>">
									<?php echo e($row->question); ?>

								</button>
							</h2>
							<div id="collapse<?php echo e($row->id); ?>" class="accordion-collapse collapse"
								aria-labelledby="heading<?php echo e($row->id); ?>" data-bs-parent="#accordionExample">
								<div class="accordion-body text-start">
								<?php echo e($row->response); ?>

								</div>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?><?php /**PATH /Users/saeed/Documents/project-cm/landiper/resources/views/layouts/site/blocks/content/faq-home.blade.php ENDPATH**/ ?>