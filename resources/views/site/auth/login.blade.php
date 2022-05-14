@extends("layouts.site.master")
@section('content')
<div class="sign d-flex align-items-center justify-content-center">
	<div class="col-xl-4 col-lg-5 col-md-6 col-sm-7 p-1 m-auto">
		<div class="card bg-light shadow p-4">
			<form action="{{route('site.post-login')}}" method="POST" class="">
				{{ csrf_field() }}

				<div class="row w-100 m-0">
					<div class="col-sm-12 p-1">
						<div class="form-floating text-center">
							<img src="{{asset('assets/site/images/logo.png')}}" alt="" class="w-50 mx-auto my-2">
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
						{!! app('captcha')->display($attributes = [], $options = ['lang'=> 'fa']) !!}
					</div>

					<div class="col-sm-12 p-1 text-center">
						<div class="form-floating d-grid gap-2">
							<button type="submit" class="btn fw-bolder btn-custom-danger w-75 mx-auto">
								ورود
							</button>
							<small>
								اگر از قبل ثبت نام نکرده اید
								<a href="{{route('site.register')}}"
									class="text-custom-danger text-decoration-none fw-bolder">ثبت نام</a>
								کنید
							</small>
							<small>
								برای دریافت رمز عبور جدید
								<a href="{{route('site.forget-password')}}"
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
@endsection