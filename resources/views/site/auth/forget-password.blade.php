@extends("layouts.site.master")
@section('content')
    <div class="sign d-flex align-items-center justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-7 p-1 m-auto">
            <div class="card bg-light shadow p-4">
                <form  action="{{route('site.post-forgetpassword')}}" method="POST" class="">
                    {{ csrf_field() }}

                    <div class="row w-100 m-0">
                        <div class="col-sm-12 p-1">
                            <div class="form-floating text-center">
                                <img src="{{asset('assets/site/images/logo.png')}}" alt="" class="w-50 mx-auto my-2">
                            </div>
                        </div>
                        <div class="col-sm-12 p-1">
                            <div class="form-floating">
                                <input type="tel" class="form-control text-start" id="floatingTel"
                                       name="mobile_email" placeholder=".....">
                                <label for="floatingTel" class="text-secondary">
                                  شماره همراه یا ایمیل خود را وارد کنید
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 p-1">
                            <div class="form-floating d-grid gap-2">
                                <button type="submit" class="btn fw-bolder btn-custom-danger w-50 mx-auto">
                                    ارسال رمز عبور جدید
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
