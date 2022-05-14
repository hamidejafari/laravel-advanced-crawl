@extends("layouts.admin.master")

@section('content')
    <form method="post"  action="{{URL::action('Admin\UserController@postEdit')}}" enctype="multipart/form-data"  >
        {{csrf_field()}}

        <input name="user_id" value="{{$data->id}}" type="hidden" />
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-10 mx-auto">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"> ویرایش کاربر </h3>
                            </div>


                            <div class="card-body">
                                <div class="row col-md-12">
                                    <div class="form-group col-md-6">
                                        <label>نام :</label>
                                        <input name="name" type="text" class="form-control"
                                               value="@if(isset($data->name)){{$data->name}}@endif">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>نام خانوادگی :</label>
                                        <input name="family" type="text" class="form-control"
                                               value="@if(isset($data->family)){{$data->family}}@endif">
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="form-group col-md-6">
                                        <label>شماره همراه :</label>
                                        <input name="mobile" type="text" class="form-control"
                                               value="@if(isset($data->mobile)){{$data->mobile}}@endif">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label> ایمیل :</label>
                                        <input name="email" type="text" class="form-control"
                                               value="@if(isset($data->email)){{$data->email}}@endif">
                                    </div>
                                </div>

                                <div class="row col-md-12">
                                    <div class="form-group col-md-6">
                                        <label>کد فعال سازی :</label>
                                        <input name="mobile_confirm_code" type="text" class="form-control"
                                               value="@if(isset($data->mobile_confirm_code)){{$data->mobile_confirm_code}}@endif">
                                    </div>
                                    <div class="form-group col-md-2" style="margin-right: 4%;margin-top: 4%;">
                                        <input class="form-check-input" type="checkbox" name="mobile_confirm" value="1" @if(isset($data->mobile_confirm) && $data->mobile_confirm == 1) checked="checked"  @endif>
                                        <label class="form-check-label"> فعال بودن کاربر</label>
                                    </div>
                                    <div class="form-group col-md-2" style="margin-right: 4%;margin-top: 4%;">
                                        <input class="form-check-input" type="checkbox" name="admin" value="1" @if(isset($data->admin) && $data->admin == 1) checked="checked"  @endif>
                                        <label class="form-check-label"> ادمین کردن کاربر</label>
                                    </div>
                                </div>


                                <div class="row col-md-12">
                                    <div class="form-group col-md-12">
                                        <label>رمز عبور :</label>
                                        <input name="password" type="text" class="form-control" />
                                    </div>
                                </div>




                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
