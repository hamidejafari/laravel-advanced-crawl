<!DOCTYPE html>
<html>
@include('layouts.admin.blocks.head')
<style>
.login {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.login .row {
    width: 100%;
    margin: 0px
}
</style>

<body class="hold-transition sidebar-mini">
    <div class="login bg-light">
        <div class="row">
            <div class="col-md-3 p-0 mx-auto">
                <div class="card p-3 border-0 shadow rounded-0">
                    <form method="POST" action="{{URL::action('Auth\LoginController@postLogin')}}" class="m-0">
                    @csrf
                        <div class="form-group m-2">
                            <h3 class="text-center my-0 pb-3">
                                ورود
                            </h3>
                        </div>
                        <div class="form-group m-2">
                            <input type="text" name="email" class="form-control rounded-0 shadow-sm p-3"
                                placeholder="نام کاربری بنویسید ...">
                        </div>
                        <div class="form-group m-2">
                            <input type="password" name="password" class="form-control rounded-0 shadow-sm p-3"
                                placeholder="رمز عبور ...">
                        </div>

                        {!! app('captcha')->display($attributes = [], $options = ['lang'=> 'fa']) !!}


                        <div class="form-group m-2">
                            <button type="submit" class="btn btn-lg btn-success btn-block shadow-sm rounded-0">
                                ورود
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.site.blocks.message')

    @include('layouts.admin.blocks.script')
</body>

</html>
