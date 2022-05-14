<!doctype html>
<html lang="fa">
<?php echo $__env->make('layouts.site.blocks.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body dir="rtl">

	

	<div class="d-xs-none d-sm-none d-md-block">
		<div class="menu newmenu bg-white shadow-sm">
			<div class="container container-sm container-md container-lg container-xl container-xxl h-100">
				<div class="h-100">
					<nav class="navbar navbar-expand-lg navbar-light h-100">
						<div class="container-fluid">
							<a class="navbar-brand" href="/">
								<img src="<?php echo e(asset('assets/site/images/logo.png')); ?>" alt="" class="w-100">
							</a>
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
								data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
								aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarNav">
								<!-- <ul class="navbar-nav me-auto ul-meg">
									<li class="nav-item">
										<a class="nav-link text-custom fw-bold a-dr" aria-current="page"
											href="/">
											خانه
										</a>
									</li>

								</ul> -->

								<ul class="navbar-nav auth-nav ms-auto">
									<?php
									$user = \Illuminate\Support\Facades\Auth::user();
									?>
									<?php if(!$user): ?>
									<li class="nav-item">
										<a class="nav-link text-custom fw-bold d-grid text-center"
											href="<?php echo e(url('/load')); ?>">
											<i class="fas fa-unlock text-custom-danger"></i>
											<!-- <i class="bi bi-unlock text-custom-danger"></i> -->
											ورود
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-custom fw-bold d-grid text-center"
											href="<?php echo e(url('/load')); ?>">
											<i class="fas fa-user text-custom-danger"></i>
											<!-- <i class="bi bi-person text-custom-danger"></i> -->
											ثبت نام
										</a>
									</li>
									<?php else: ?>
									<?php
									$currentOrder =
									\App\Models\Order::where('user_id',@$user->id)->currentOrder()->first();
									$cartItems =
									\App\Models\OrderItem::whereOrderId(@$currentOrder->id)->count();
									?>
                                    <li class="nav-item">
										<a href="<?php echo e(route('site.panel.logout')); ?>"
											class="nav-link text-custom fw-bold d-grid text-center">
											<i class="fas fa-power-off text-custom-danger"></i>
											<span class="text-custom fw-bolder">
												خروج
											</span>
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-custom fw-bold d-grid text-center"
											href="<?php echo e(route('site.panel.dashboard')); ?>">
											<i class="fas fa-user text-custom-danger"></i>
											پنل کاربری
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-custom fw-bold d-grid text-center"
											href="<?php echo e(route('site.panel.order.cart')); ?>">
											<i class="fas fa-shopping-cart text-custom-danger"></i>
											سبد خرید
											(<?php echo e($cartItems); ?>)
										</a>
									</li>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="d-xs-block d-sm-block d-md-none">
		<div class="menu bg-white h-auto shadow-sm">
			<div id="mySidenav" class="sidenav bg-custom">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
					<i class="fas fa-times"></i>
				</a>
				<div class="dd">
					<?php
					$user = \Illuminate\Support\Facades\Auth::user();
					?>
					<?php if(!$user): ?>
					<a href="<?php echo e(route('site.login')); ?>" class="px-3 py-2">
						<i class="fas fa-unlock text-custom-danger me-1"></i>
						ورود
					</a>
					<a href="<?php echo e(route('site.register')); ?>" class="px-3 py-2">
						<i class="fas fa-user text-custom-danger me-1"></i>
						ثبت نام
					</a>
					<?php else: ?>
					<?php
					$currentOrder = \App\Models\Order::where('user_id',@$user->id)->currentOrder()->first();
					$cartItems = \App\Models\OrderItem::whereOrderId(@$currentOrder->id)->count();
					?>
					<a href="<?php echo e(route('site.register')); ?>" class="px-3 py-2">
						<i class="fas fa-user text-custom-danger me-1"></i>
						پنل کاربری
					</a>
					<a href="<?php echo e(route('site.register')); ?>" class="px-3 py-2">
						<i class="fas fa-shopping-cart text-custom-danger me-1"></i>
						سبد خرید
					</a>
					<?php endif; ?>
					<a href="/" class="px-3 py-2">
						<i class="fas fa-home me-1"></i>
						خانه
					</a>
					<!--<a href="/" class="px-3 py-2">-->
					<!--	<i class="fas fa-th-large me-1"></i>-->
					<!--	خدمات-->
					<!--</a>-->


				</div>
			</div>
			<div class="row w-100 m-0 p-1">
				<div class="col-sm-4 col-xs-4 align-self-center p-1">
					<span class="openbtn" onclick="openNav()">
						<i class="fas fa-bars text-custom"></i>
					</span>
				</div>
				<div class="col-sm-8 col-xs-8 align-self-center text-end p-1">
					<a class="navbar-brand m-0" href="/">
						<img src="<?php echo e(asset('assets/site/images/logo.png')); ?>" alt="" class="w-75">
					</a>
				</div>
			</div>
		</div>
	</div>


	<?php
	$user2 = \Illuminate\Support\Facades\Auth::user();
	$ordersNew = \App\Models\Order::where('user_id',@$user->id)->notifOrder()->count();
	?>
	<div class="header-in bg-custom d-flex align-items-center">
		<div class="container-sm container-md container-lg container-xl container-xxl">
			<div class="px-3">
				<nav aria-label="breadcrumb" class="max-content float-start me-auto">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item">
							<a href="/" class="text-white fw-bolder text-decoration-none">
								خانه
							</a>
						</li>
						<li class="breadcrumb-item text-white fw-bolder active" aria-current="page">
							پنل کاربری
						</li>
					</ol>
				</nav>
				<ul class="max-content float-end d-flex px-0 my-0 ms-auto">
					<li class="list-unstyled float-end ms-sm-5">
						<p class="m-0 text-white fw-bolder">
							اعتبار : <span class="text-custom-danger"><?php echo e(number_format($user2->wallet)); ?></span>
							تومان
						</p>
					</li>
					<li class="list-unstyled float-end ms-sm-5">
						<p class="m-0 text-white fw-bolder">
							<?php echo e($user2->name . ' ' . $user2->family); ?>

						</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="container-sm container-md container-lg container-xl container-xxl">
			<div class="row">
				<div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-6 p-2">
					<div class="sidebar position-sticky sticky">
						<ul class="px-0 m-0">
							<li class="list-unstyled pb-2">
								<a href="<?php echo e(route('site.panel.dashboard')); ?>"
									class="d-flex text-decoration-none d-flex align-items-center">
									<i class="fas fa-wallet text-custom-danger me-3"></i>
									<span class="text-custom fw-bolder">
										خرید رپورتاژ
									</span>
								</a>
							</li>

							<li class="list-unstyled pb-2">
								<a href="<?php echo e(route('site.panel.orders')); ?>"
									class="d-flex text-decoration-none d-flex align-items-center">
									<i class="fas fa-shopping-bag text-custom-danger me-3"></i>
									<span class="text-custom fw-bolder">
										سفارشات
									</span>
									<sapn class="badge bg-custom-danger ms-auto rounded-pill">
										<?php echo e($ordersNew); ?>

									</sapn>
								</a>
							</li>
							<li class="list-unstyled pb-2">
								<a href="<?php echo e(route('site.panel.transactions')); ?>"
									class="d-flex text-decoration-none d-flex align-items-center">
									<i class="fas fa-credit-card text-custom-danger me-3"></i>
									<span class="text-custom fw-bolder">
										تراکنش ها
									</span>
								</a>
							</li>
							<li class="list-unstyled pb-2">
								<a href="<?php echo e(route('site.panel.charge')); ?>"
									class="d-flex text-decoration-none d-flex align-items-center">
									<i class="fas fa-plus-circle text-custom-danger me-3"></i>
									<span class="text-custom fw-bolder">
										افزایش اعتبار
									</span>
								</a>
							</li>
							<li class="list-unstyled pb-2">
								<a href="<?php echo e(route('site.panel.profile')); ?>"
									class="d-flex text-decoration-none d-flex align-items-center">
									<i class="fas fa-info-circle text-custom-danger me-3"></i>
									<span class="text-custom fw-bolder">
										اطلاعات کاربری
									</span>
								</a>
							</li>
							<li class="list-unstyled pb-2">
								<a href="<?php echo e(route('site.panel.tickets')); ?>"
									class="d-flex text-decoration-none d-flex align-items-center">
									<i class="fas fa-user text-custom-danger me-3"></i>
									<span class="text-custom fw-bolder">
										تیکت ها
									</span>
								</a>
							</li>


							
							
							
							
							
							
							
							
							
							
							
							<!-- <li class="list-unstyled pb-2">
								<a href="<?php echo e(route('site.panel.logout')); ?>"
									class="d-flex text-decoration-none d-flex align-items-center">
									<i class="fas fa-power-off text-custom-danger me-3"></i>
									<span class="text-custom fw-bolder">
										خروج
									</span>
								</a>
							</li> -->
						</ul>
					</div>
				</div>
				<div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-12 p-2">
					<?php echo $__env->make('layouts.site.blocks.message-new', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<?php echo $__env->yieldContent('content'); ?>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<div class="bar-footer">
			<img src="<?php echo e(asset('assets/site/images/barfooter.png')); ?>" alt="" class="w-100">
		</div>
		<div class="footer bg-custom py-3">
			<div class="container-sm container-md container-lg container-xl container-xxl  px-5">
				<div class="row">
					<div class="col-lg-12 col-sm-12 text-center p-3">

						<p style="color: white;margin-top: -3%;font-size: 18px;">کلیه حقوق متعلق به لندیپر است</p>
						<li class="list-unstyled">
							<a href="tel:<?php echo e($setting_header->phone); ?>" class=""
								style="color:white;text-decoration: none;">
								<i class="fas fa-phone-alt text-custom-danger me-2"></i>
								تلفن : <?php echo e($setting_header->phone); ?>

							</a>
						</li>
						<li class="list-unstyled">
							<a href="tel:<?php echo e($setting_header->phone2); ?>" class=""
								style="color:white;text-decoration: none;">
								<i class="fas fa-phone-alt text-custom-danger me-2"></i>
								تلفن : <?php echo e($setting_header->phone2); ?>

							</a>
							<a href="mailto:"></a>
						</li>
					</div>
				</div>
			</div>
		</div>
		<div class="f-footer bg-custom-dark py-4">
			<p class="text-custom-danger fw-bolder text-end px-5 m-0">
				طراحی و توسعه :
				<a href="https://www.rahweb.ir" target="_blank" rel="noopener noreferrer"
					class="text-custom-danger text-decoration-none fw-bolder">
					ره وب
				</a>
			</p>
		</div>
	</footer>

	<?php echo $__env->make('layouts.site.blocks.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH /Users/saeed/Documents/project-cm/landiper/resources/views/site/panel/master.blade.php ENDPATH**/ ?>