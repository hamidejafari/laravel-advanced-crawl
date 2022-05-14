@extends("layouts.admin.master")
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">کاربران سایت</h3>
                    <div class="card-tools">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr>
                            <th>شماره</th>
                            <th>نام و نام خانوادگی</th>
                            <th>شماره همراه</th>
{{--                            <th>ایمیل</th>--}}
                            <th>کد فعال سازی</th>
                            <th>وضعیت  </th>
                            <th>اعتبار</th>
                            <th>فعالیت</th>
                        </tr>
                        @foreach($data as $row)

                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name . ' ' . $row->family}}</td>
                                <td>{{$row->mobile}}</td>
{{--                                <td>{{$row->email}}</td>--}}
                                <td>{{$row->mobile_confirm_code}}</td>
                                <td>{{$row->mobile_confirm ? 'فعال' : 'غیرفعال'}}</td>
                                <td>{{number_format($row->wallet) . 'تومان'}}</td>
                                <td>

                                    @php
                                        $param = \App\Library\Help::randomString(40);
                                        $param .= 'p'.$row->id.'p';
                                        $param .= \App\Library\Help::randomString(40);
                                    @endphp
                                    <a href="{{url('/reset-pass/'.$param)}}" type="button" class="btn btn-primary" >  ویرایش رمز</a>
                                    <a href="{{URL::action('Admin\UserController@getEdit' , $row->id)}}" type="button" class="btn btn-primary" >ویرایش</a>
                                    <a href="{{URL::action('Admin\UserController@loginAs' , $row->id)}}" type="button" class="btn btn-success" >لاگین به پنل</a>
                                    <a type="button" data-toggle="modal" data-target="#walletUser{{$row->id}}" class="btn btn-primary text-white">ویرایش اعتبار</a>

                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="pagii">
                        @if(count($data))
                            {!! $data->appends(Request::except('page'))->render() !!}
                        @endif
                    </div>
                </div>

                @foreach($data as $row)
                    <div class="modal fade" id="walletUser{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document" style="width: 53%;max-width: none !important;margin-top: 1%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"> ویرایش اعتبار کاربر </h5>
                            </div>
                            <div class="modal-body">

                                <form action="{{URL::action('Admin\UserController@wallet')}}" method="POST">
                                    @csrf
                                    <input name="user_id" value="{{$row->id}}" type="hidden" />

                                    <div class="card-body">
                                        <div class="row col-md-12">
                                            <div class="form-group col-md-12">
                                                <label> مبلغ اعتبار کاربر  :</label>
                                                <input name="wallet" type="text"  disabled class="form-control" value="{{$row->wallet}}"/>
                                            </div>
                                        </div>
                                        <div class="row col-md-12">
                                            <div class="form-group col-md-6">
                                                <label> مبلغ شارژ/کسر اعتبار  :</label>
                                                <input name="wallet_price" type="text"  class="form-control" />
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label> نوع عملیات :</label>
                                                <select class="form-control" id="select-state" name="type">
                                                    <option value="" disabled selected>انتخاب کنید</option>
                                                    <option value="1">شارژ</option>
                                                    <option value="2">کسر</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left: 1%;">بستن</button>
                                        <button type="submit" class="btn btn-primary">ویرایش</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
