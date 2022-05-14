@extends("layouts.site.master")
@section('content')
<div class="sign d-flex align-items-center justify-content-center">
	<div class="col-xl-4 col-lg-5 col-md-6 col-sm-7 p-1 m-auto">
		<div class="card bg-light shadow p-4">
			<form method="POST" action="{{route('site.panel.post-mobile-confirm')}}" class="">
				{{ csrf_field() }}
				<div class="row w-100 m-0">
					<div class="col-sm-12 p-1">
						<div class="form-floating text-center">
							<img src="{{asset('assets/site/images/logo.png')}}" alt="" class="w-50 mx-auto my-2">
						</div>
					</div>
					<div class="col-sm-12 p-1">
						<div class="form-floating">
							<input type="tel" class="form-control text-start" id="floatingTel" name="code"
								placeholder=".....">
							<label for="floatingTel" class="text-secondary">
								کد فعال سازی :
							</label>
						</div>
						<p class="text-center" style="font-size: 15px;">
							کد فعال سازی ارسال شده به ایمیل یا شماره تماس خود را وارد کنید.
						</p>
					</div>
					<div class="col-sm-12 p-1">
						<div class="form-floating d-grid gap-2">
							<button type="submit" class="btn fw-bolder btn-custom-danger w-50 ms-auto">
								فعال سازی
							</button>
						</div>
					</div>
				</div>
			</form>
			<hr class="my-2">
		</div>
	</div>
</div>
@endsection