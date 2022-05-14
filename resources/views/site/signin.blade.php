<!doctype html>
<html lang="fa">
@include('layouts.site.blocks.head')

<body dir="rtl">
	<div class="content">
		<div class="sign d-flex align-items-center justify-content-center">
			<div class="col-xl-4 col-lg-5 col-md-6 col-sm-7 p-1 m-auto">
				<div class="card bg-light shadow p-4">
					<form method="POST" action="" class="">
                    @csrf
						<div class="row w-100 m-0">
							<div class="col-sm-12 p-1">
								<div class="form-floating text-center">
									<img src="" alt="" class="w-50 mx-auto my-2">
								</div>
							</div>
							<div class="col-sm-12 p-1">
								<div class="form-floating">
									<input type="email" name="name" class="form-control text-start" id="floatingInput"
										placeholder="name@example.com">
									<label for="floatingInput" class="text-secondary">
										پست الکترونیک :
									</label>
								</div>
							</div>
							<div class="col-sm-12 p-1">
								<div class="form-floating">
									<input type="password" name="password" class="form-control text-start"
										id="floatingPassword" placeholder="Password">
									<label for="floatingPassword" class="text-secondary">
										رمز عبور :
									</label>
								</div>
							</div>
							<div class="col-sm-12 p-1">
								<div class="form-floating d-grid gap-2">
									<button type="submit" class="btn fw-bolder btn-custom-danger">
										ورود
									</button>
									<small>
										اگر قبلا ثبت نام نکرده اید
										<a href=""
											class="text-custom-danger text-decoration-none fw-bolder">ثبت نام</a>
										کنید
									</small>
								</div>
							</div>
						</div>
					</form>
					<hr class="my-2">
					<div class="">
						<ul class="px-0 m-0 text-end fasd">
							<li class="list-unstyled max-content">
								<a href=""
									class="text-decoration-none fw-bolder d-flex align-items-center justify-content-center text-dark bg-white shadow-sm btn gb">
									<i class="fab fa-google me-2"></i>
									ورود با حساب گوگل
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('layouts.site.blocks.script')
</body>

</html>