@extends("layouts.admin.master")
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-10 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> جزییات فاکتور </h3>
                    </div>
                    <!-- Button trigger modal -->

                    <div class="card-body">
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label>مبلغ کل :</label>
                                <p>{{number_format($data->total_prices) . ' تومان '}}</p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>مبلغ پرداختی :</label>
                                <p>{{number_format($data->payment) . ' تومان '}}</p>
                            </div>
                            <form method="post" action="{{url('/admin/order/change/')}}" enctype="multipart/form-data" >
                                {{csrf_field()}}
                                <input type="hidden" name="type" value="1"/>
                                <input type="hidden" name="order_id" value="{{$data->id}}"/>

                                <div class="form-group col-md-6">
                                    <label>وضعیت :</label>
                                    <div class="col-sm-12">
                                        <select name="order_item_status_id">
                                            @foreach($status_order as $item)
                                                <option value="{{$item->id}}" @if($item->id == $data->order_status_id) selected @endif>{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn  btn-custom-danger rounded-3">ویرایش</button>

                            </form>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tr>
                                <th>
                                    شماره ایتم
                                </th>
                                <th>
                                    DA
                                </th>
                                <th>
                                    عنوان
                                </th>
                                <th>
                                    قیمت
                                </th>
                                <th>
                                    وضعیت
                                </th>
                                <th>
                                    عملیات
                                </th>
                            </tr>
                            @foreach($data->orderItems as $row)
                                <tr>
                                    <th scope="row">
                                        {{$row->id}}
                                    </th>
                                    <td>
                                        {{$row->product->da}}
                                    </td>
                                    <td>
                                        {{$row->title}}
                                    </td>
                                    <td>
                                        {{number_format($row->product->price) . ' تومان '}}
                                    </td>
                                    <td>
                                        {{$row->orderStatus->title}}
                                    </td>
                                    <td>
                                        <button
                                            data-bs-toggle="modal" data-bs-target="#orderDetailModal{{$row->id}}"
                                            type="button" class="btn btn-primary">تغیر وضعیت و توضیحات</button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach($data->orderItems as $row)
        <!-- Modal -->
        <div class="modal fade" id="orderDetailModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post" action="{{url('/admin/order/change/')}}" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="2"/>
                    <input type="hidden" name="order_item_id" value="{{$row->id}}"/>
                    <input type="hidden" name="order_id" value="{{$data->id}}"/>

                    <div class="modal-content" style="width: 650px;margin-right: -12%;margin-top: 22%;">

                        <div class="modal-body">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>نام کمپین :</label>
                                    <p>{{$row->name}}</p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>عنوان  :</label>
                                    <p>{{$row->title}}</p>
                                </div>


                                <div class="form-group col-md-6 " >
                                    <label>توضیحات :</label>
                                    <p>{{$row->description}}</p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>فایل :</label>
                                    <a href="{{asset('/assets/uploads/product/'.$row->file)}}">دانلود فایل</a>
                                </div>


                                @php $p  = \App\Models\Product::find($row->product_id); @endphp
                                <div class="form-group col-md-12">
                                    <label>دامنه رپورتاژ  :</label>
                                    <p>{{$p->domain}}</p>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>قیمت دلار  :</label>
                                    <p>{{$p->price_dollar}}</p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>قیمت تومان  :</label>
                                    <p>{{number_format($p->price)}}</p>
                                </div>


                                <div class="form-group col-md-6 " >
                                    <label>DA :</label>
                                    <p>{{$p->da}}</p>
                                </div>

                                <div class="form-group col-md-6 " >
                                    <label>DR :</label>
                                    <p>{{$p->dr}}</p>
                                </div>

                                <div class="form-group col-md-6 " >
                                    <label>زبان :</label>
                                    <p>{{@$p->language->title}}</p>
                                </div>

                                <div class="form-group col-md-6 " >
                                    <label>کشور :</label>
                                    <p>{{@$p->country->title}}</p>
                                </div>


                                <hr>


                            </div>

                            <div class="form-group col-md-12">
                                <label>وضعیت</label>
                                <div class="col-sm-12">
                                    <select name="order_item_status_id">
                                        @foreach($status_item as $item)
                                            <option value="{{$item->id}}" @if($item->id == $row->order_item_status_id) selected @endif>{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>لینک رپورتاژ</label>
                                <div class="col-sm-12">
                                    <input type="text" name="link" class="form-control"  placeholder=" لینک را وارد کنید...">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label>توضیحات لازم یا مشکلات</label>
                                <div class="col-sm-12">
                                     <textarea name="problems" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                            <button type="submit" class="btn  btn-custom-danger rounded-3">ویرایش</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

@endsection
