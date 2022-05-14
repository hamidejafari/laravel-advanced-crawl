<?php $__env->startSection('content'); ?>
<div class="sign d-flex align-items-center justify-content-center">
	<div class="col-xl-4 col-lg-5 col-md-6 col-sm-7 p-1 m-auto">
		<div class="card bg-light shadow p-4">
			<form action="<?php echo e(route('site.post-login')); ?>" method="POST" class="">
				<?php echo e(csrf_field()); ?>


				<div class="row w-100 m-0">
					<div class="col-sm-12 p-1">
						<div class="form-floating text-center">
							<img src="<?php echo e(asset('assets/site/images/logo.png')); ?>" alt="" class="w-50 mx-auto my-2">
						</div>
					</div>

					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<input type="tel" class="form-control text-start" id="floatingTel" name="mobile"
								placeholder=".....">
							<label for="floatingTel" class="text-secondary">
								شماره موبایل :
							</label>
						</div>
					</div>

					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<input type="password" class="form-control text-start" name="password"
								id="floatingPassword" placeholder=".....">
							<label for="floatingPassword" class="text-secondary">
								رمز عبور :
							</label>
						</div>
					</div>

					<div class="max-content mx-auto my-1">
						<?php echo app('captcha')->display($attributes = [], $options = ['lang'=> 'fa']); ?>

					</div>

					<div class="col-sm-12 p-1 text-center">
						<div class="form-floating d-grid gap-2">
							<button type="submit" class="btn fw-bolder btn-custom-danger w-75 mx-auto">
								ورود
							</button>
							<small>
								اگر از قبل ثبت نام نکرده اید
								<a href="<?php echo e(route('site.register')); ?>"
									class="text-custom-danger text-decoration-none fw-bolder">ثبت نام</a>
								کنید
							</small>
							<small>
								برای دریافت رمز عبور جدید
								<a href="<?php echo e(route('site.forget-password')); ?>"
									class="text-custom-danger text-decoration-none fw-bolder">
									کلیک
								</a>
								کنید
							</small>
						</div>
					</div>
				</div>
			</form>
			<hr class="my-2">
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.site.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/saeed/Documents/project-cm/landiper/resources/views/site/auth/login.blade.php ENDPATH**/ ?>