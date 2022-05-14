@extends("layouts.site.master")
@section('content')
    <div class="sign d-flex align-items-center justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-7 p-1 m-auto">
            <div class="card bg-light shadow p-4">
                <form action="{{url('/post-reset-pass/')}}" method="POST" class="">
                    {{ csrf_field() }}
                    <input name="info" type="hidden" value="{{$id}}" />

                    <div class="row w-100 m-0">
                        <div class="col-sm-12 p-1">
                            <div class="form-floating text-center">
                                <img src="{{asset('assets/site/images/logo.png')}}" alt="" class="w-50 mx-auto my-2">
                            </div>
                        </div>

                        <div class="col-sm-12 p-1">
                            <div class="form-floating">
                                <input type="tel" class="form-control text-start" id="floatingTel" name="new_pass"
                                       placeholder=".....">
                                <label for="floatingTel" class="text-secondary">
                                    رمز عبور جدید :
                                </label>
                            </div>
                        </div>

                        <div class="max-content mx-auto my-1">
                            {!! app('captcha')->display($attributes = [], $options = ['lang'=> 'fa']) !!}
                        </div>

                        <div class="col-sm-12 p-1 text-center">
                            <div class="form-floating d-grid gap-2">
                                <button type="submit" class="btn fw-bolder btn-custom-danger w-75 mx-auto">
                                    تغییر رمز عبور
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
