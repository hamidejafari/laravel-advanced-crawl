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
                    <form method="POST" action="{{ route('register') }}" class="m-0">
                    @csrf
                        <div class="form-group m-2">
                            <h3 class="text-center my-0 pb-3">
                                ثبت نام
                            </h3>
                        </div>
                        <div class="form-group m-2">
                            <input type="text" name="name" class="form-control rounded-0 shadow-sm p-3"
                                placeholder="نام کاربری را بنویسید">
                        </div>
                        <div class="form-group m-2">
                            <input type="text" name="email" class="form-control rounded-0 shadow-sm p-3"
                                placeholder="ایمیل کاربری بنویسید">
                        </div>
                        <div class="form-group m-2">
                            <input type="password" id="password" name="password" class="form-control rounded-0 shadow-sm p-3"
                                placeholder="رمز عبور ...">
                        </div>
                        <div class="form-group m-2">
                            <input type="password" id="password-confirm" name="password_confirmation" class="form-control rounded-0 shadow-sm p-3" required autocomplete="new-password"
                                placeholder="تایید رمز عبور ...">
                        </div>

                        <div class="form-group m-2">
                            <button type="submit" class="btn btn-lg btn-success btn-block shadow-sm rounded-0">
                                ثبت نام
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.blocks.script')
</body>

</html>