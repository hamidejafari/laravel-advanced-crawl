@extends("layouts.site.master")
@section('content')
<div class="sign d-flex align-items-center justify-content-center">
	<div class="col-xl-4 col-lg-5 col-md-6 col-sm-7 p-1 m-auto">
		<div class="card bg-light shadow p-4">
			<form action="{{route('site.post-register')}}" method="POST" class="">
				{{ csrf_field() }}

				<div class="row w-100 m-0">
					<div class="col-sm-12 p-1">
						<div class="form-floating text-center">
							<img src="{{asset('assets/site/images/logo.png')}}" alt="" class="w-50 mx-auto my-2">
						</div>
					</div>
					<div class="col-sm-6 p-1">
						<div class="form-floating">
							<input type="text" class="form-control text-start" id="floatingName" name="name"
								placeholder="....." value="{{old('name')}}">
							<label for="floatingName" class="text-secondary">
								نام :
							</label>
						</div>
					</div>
					<div class="col-sm-6 p-1">
						<div class="form-floating">
							<input type="text" class="form-control text-start" id="floatingName" name="family"
								placeholder="....." value="{{old('family')}}">
							<label for="floatingName" class="text-secondary">
								نام خانوادگی :
							</label>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<input type="tel" class="form-control text-start" id="floatingTel" name="mobile"
								placeholder="....." value="{{old('mobile')}}">
							<label for="floatingTel" class="text-secondary">
								شماره موبایل ( برای مثال : 09120000000 ) :
							</label>
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<input type="email" class="form-control text-start" id="floatingInput" name="email"
								placeholder="....." value="{{old('email')}}">
							<label for="floatingInput" class="text-secondary">
								پست الکترونیک :
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

					<div class="col-sm-12 text-center p-1">
						<div class="form-floating d-grid gap-2">
							<button type="submit" class="btn fw-bolder btn-custom-danger w-75 mx-auto">
								ثبت نام
							</button>
							<small>
								اگر قبلا ثبت نام کرده اید
								<a href="{{route('site.login')}}"
									class="text-custom-danger text-decoration-none fw-bolder">وارد</a>
								شوید
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
