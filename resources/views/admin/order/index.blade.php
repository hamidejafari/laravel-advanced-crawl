@extends("layouts.admin.master")
@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست سفارشات </h3>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        جستجو
                    </button>

                </div>
                <!-- /.card-header -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document" style="width: 53%;
max-width: none !important;
margin-top: 3%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"> جستجو </h5>
                            </div>
                            <div class="modal-body">

                                <form action="{{URL::current()}}" method="GET">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                    <button type="submit" class="btn btn-primary">جستجو کردن</button>
                                    <div class="card-body">
                                        <div class="row col-md-12">
                                            <div class="form-group col-md-6">
                                                <label> نام کاربر  :</label>
                                                <input name="user_name" type="text"  class="form-control" placeholder="تایپ کنید..."
                                                       value=""/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label> نام خانوادگی کاربر  :</label>
                                                <input name="user_family" type="text" class="form-control" placeholder="تایپ کنید..."
                                                       value=""/>
                                            </div>


                                            <div class="form-group col-md-12">
                                                <label> شماره کاربر  :</label>
                                                <input name="user_mobile" type="text" class="form-control" placeholder="تایپ کنید..."
                                                       value=""/>
                                            </div>



                                            <div class="form-group col-md-6">
                                                <label>مبلغ کل از:</label>
                                                <input name="price_from" type="text" class="form-control"
                                                       value=""/>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>مبلغ کل تا:</label>
                                                <input name="price_to" type="text" class="form-control"
                                                       value=""/>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>وضعیت</label>
                                                <select class="form-control" id="select-state" name="order_status_id">
                                                    <option value="" selected >هیچکدام</option>
                                                    @foreach($statuses as $item)
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                        <button type="submit" class="btn btn-primary">جستجو کردن</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>



                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr>
                            <th>شماره</th>
                            <th>کاربر</th>
                            <th>مبلغ کل</th>
                            <th>تعداد ایتم</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        @foreach($data as $row)
                            @if($row->order_status_id == 3)
                                <tr style="background-color: #00d80026;">
                            @else
                                <tr>
                            @endif
                                <td>{{$row->id}}</td>
                                <td>{{@$row->user->name .' '. @$row->user->family}}</td>
                                <td>{{number_format($row->total_prices) . ' تومان '}}</td>
                                <td>{{count($row->orderItems)}}</td>
                                <td>{{@$row->orderStatus->title}}</td>
                                <td>
                                    <a href="{{url('/admin/order/detail/'.$row->id)}}" type="button" class="btn btn-primary">مشاهده جزییات</a>
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
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
