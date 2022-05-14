@extends("site.panel.master")
@section('content')
    @if(@$current_order && @$current_order->orderItems && count(@$current_order->orderItems) > 0)
    <div class="border dashboard-search p-4 mb-0">
        <h4 class="text-custom text-center mb-4">
            سبد خرید
        </h4>
        <table class="table table-striped m-0">
            <thead>
                <tr>
                    <th scope="col" class="text-center text-custom fw-bolder">
                       شماره ایتم
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        DA
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        عنوان
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        دامنه
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        قیمت
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        عملیات
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($current_order->orderItems as $row)
                    <tr>
                        <th class="text-center" scope="row">
                            {{$row->id}}
                        </th>
                        <td class="text-center">
                            {{@$row->product->da}}
                        </td>
                        <td class="text-center">
                            {{$row->title}}
                        </td>
                         <td class="text-center">
                            {{@$row->product->domain}}
                        </td>
                        <td class="text-center">
                            {{number_format(@$row->product->price) . ' تومان '}}
                        </td>
                        <td class="text-center">
                            <a href="{{route('site.panel.order.delete',['id'=>$row->id])}}"
                               class="btn btn-custom-danger rounded-3">
                                <i class="fas fa-trash"></i>
                            </a>

                            <button type="button" class="btn btn-custom-danger rounded-3" data-bs-toggle="modal" data-bs-target="#orderModal{{$row->id}}">
                                <i class="fas fa-edit"></i>
                            </button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row w-100 m-0">
            <div style="margin-right: 32%;margin-top: 1%;" class="col-xxl-4 col-lg-6 col-sm-12 p-2">
                    <div class="card bg-light rounded-3 shadow-sm p-2">
                        <ul class="px-0 m-0">
                            <li class="list-unstyled p-1">
                                <p class="m-0 text-custom fw-bolder">
                                    مبلغ کل :
                                    <span class="text-custom-danger fw-lighter float-end">
									{{number_format($current_order->total_prices) . ' تومان '}}
								</span>
                                </p>
                            </li>
                            <li class="list-unstyled p-1">
                                <p class="m-0 text-custom fw-bolder">
                                    اعتبار  :
                                    <span class="text-custom-danger fw-lighter float-end">
                                      @php
                                          $user2 = \Illuminate\Support\Facades\Auth::user();
                                      @endphp
									{{number_format($user2->wallet) . ' تومان '}}
								</span>
                                </p>
                            </li>
                            @if($user2->wallet >= $current_order->total_prices)
                            <li class="list-unstyled p-1">
                                <a href="{{route('shop-bank',['type'=>1])}}" class="btn btn-custom-danger rounded-3 w-100">
                                   کسر از کیف پول
                                </a>
                            </li>
                            @else
                             <li class="list-unstyled p-1">
                                <p class="m-0 text-custom fw-bolder">
                                    مبلغ قابل پرداخت :
                                    <span class="text-custom-danger fw-lighter float-end">

									{{number_format($current_order->total_prices - $user2->wallet) . ' تومان '}}
								</span>
                                </p>
                            </li>
                            <li class="list-unstyled p-1">
                                <a href="{{route('shop-bank',['type'=>2])}}" class="btn btn-custom-danger rounded-3 w-100">
                                    پرداخت آنلاین
                                </a>
                            </li>
                            @endif

                        </ul>
                    </div>
            </div>
        </div>
    </div>


    @foreach($current_order->orderItems as $row)
        <!-- Modal -->
        <div class="modal fade" id="orderModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post" action="{{route('site.panel.order.post-edit')}}" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <input type="hidden" name="order_item_id" value="{{$row->id}}"/>

                    <div class="modal-content" style="width: 650px;margin-right: -12%;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">    ویرایش رپورتاژ در رسانه "{{@$row->product->domain}}"</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
{{--                        <div class="modal-body">--}}
{{--                            <table class="table table-hover" style="background: #dedede33;">--}}
{{--                                <tr>--}}
{{--                                    <th>زبان</th>--}}
{{--                                    <th>کشور</th>--}}
{{--                                    <th>موضوع</th>--}}
{{--                                    <th>اتوریتی</th>--}}
{{--                                    <th>قیمت</th>--}}
{{--                                    <th>Requirements</th>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>{{@$row->product->language->title}}</td>--}}
{{--                                    <td> {{@$row->product->country->title}}</td>--}}
{{--                                    <td>--}}
{{--                                        @if(@$row->product)--}}
{{--                                        @foreach(@$row->product->categories as $item)--}}
{{--                                            {{@$item->title}}--}}
{{--                                            <br>--}}
{{--                                        @endforeach--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td> {{@$row->product->da}}</td>--}}
{{--                                    <td>{{number_format(intval(@$row->product->price))}}</td>--}}
{{--                                    <td>{{@$row->product->requirements}}</td>--}}
{{--                                </tr>--}}

{{--                            </table>--}}
{{--                            <div class="form-group col-md-12">--}}
{{--                                <label>نام کمپین :</label>--}}
{{--                                <input name="name" type="text" class="form-control" placeholder=" نام کمپین را وارد کنید..."--}}
{{--                                       value="{{$row->name}}">--}}
{{--                            </div>--}}
{{--                            <br>--}}
{{--                            <div class="form-group col-md-12">--}}
{{--                                <label>عنوان  :</label>--}}
{{--                                <input name="title" type="text" class="form-control" placeholder=" عنوان رپورتاژ را وارد کنید..."--}}
{{--                                       value="{{$row->title}}">--}}
{{--                            </div>--}}
{{--                            <br>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>توضیحات :</label>--}}
{{--                                <textarea name="description" type="text" rows="5" cols="5" class="form-control" placeholder=" اگر توضیح و نکته ای در هنگام انتشار رپورتاژ دارید وارد نمایید.">{{$row->description}}</textarea>--}}
{{--                            </div>--}}
{{--                            <br>--}}

{{--                            <div class="form-group col-md-12">--}}
{{--                                <p style="font-size: 12px;color: green;">--}}
{{--                                    فایل Word حاوی متن و لینک رپورتاژ های خود را وارد نمایید. لینک های خود را در Word به صورت Hyper Link در وسط متن، درج نمایید.--}}
{{--                                    <br>--}}
{{--                                    برای ارسال عکس، فایل Word و عکس ها را در یک فایل RAR آپلود نمایید.--}}
{{--                                </p>--}}
{{--                                <label> آپلود فایل</label>--}}
{{--                                <input type="file" class="form-control" name="file" id="exampleInputPassword1" placeholder="انتخاب فایل">--}}
{{--                                @if($row->file !== null)--}}
{{--                                <a href="{{asset('/assets/uploads/product/'.$row->file)}}" style="text-decoration: none;">دانلود فایل اپلود شده</a>--}}
{{--                                @endif--}}
{{--                            </div>--}}

{{--                        </div>--}}

                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">
                                            زبان
                                        </th>
                                        <th scope="col">
                                            کشور
                                        </th>
                                        <th scope="col">
                                            موضوع
                                        </th>
                                        <th scope="col">
                                            DA
                                        </th>
                                        <th scope="col">
                                            DR
                                        </th>
                                        <th scope="col">
                                            قیمت
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">
                                            {{@$row->product->language->title}}
                                        </th>
                                        <td>
                                            {{@$row->product->country->title}}
                                        </td>
                                        <td>

                                            @if(@$row->product)
                                                @foreach(@$row->product->categories as $item)
                                                    {{@$item->title}}
                                                    <br>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            {{@$row->product->da}}
                                        </td>
                                        <td>
                                            {{@$row->product->dr}}
                                        </td>
                                        <td>
                                            {{number_format(intval(@$row->product->price))}} تومان
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            @if(@$row->product->requirements !== null || @$row->product->content_requirements !== null)
                                <div class="mb-3">
                                    <p class="text-end m-0">
                                        <a class="btn btn-custom-red w-100" data-bs-toggle="collapse" href="#collapseExample"
                                           role="button" aria-expanded="false" aria-controls="collapseExample">
                                            ملظومات
                                        </a>
                                    </p>
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body text-danger text-justify">
                                            <p class="m-0">
                                                {{$row->product->content_requirements ? $row->product->content_requirements : ''}}
                                                <br>
                                                {{$row->product->requirements ? $row->product->requirements : ''}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="bg-light p-2">
                                <div class="row w-100 m-0">
                                    <div class="col-xl-6 p-1">
                                        <div class="form-group col-md-12">
                                            <label>نام کمپین :</label>
                                            <input name="name" type="text" class="form-control"
                                                   placeholder=" نام کمپین را وارد کنید..." value="{{@$row->name}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 p-1">
                                        <div class="form-group col-md-12">
                                            <label>عنوان :</label>
                                            <input name="title" type="text" class="form-control"
                                                   placeholder=" عنوان رپورتاژ را وارد کنید..." value="{{@$row->title}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 p-1">
                                        <div class="form-group">
                                            <label>توضیحات :</label>
                                            <textarea name="description" type="text" rows="3" cols="3"
                                                      class="form-control"
                                                      placeholder=" اگر توضیح و نکته ای در هنگام انتشار رپورتاژ دارید وارد نمایید.">{{@$row->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="my-2">
                                    <small class="text-success">
                                        فایل Word حاوی متن و لینک رپورتاژ های خود را وارد نمایید. لینک های خود را در
                                        Word به
                                        صورت Hyper Link در وسط متن، درج نمایید.
                                        <br>
                                        برای ارسال عکس، فایل Word و عکس ها را در یک فایل RAR آپلود نمایید.
                                    </small>
                                </div>
                                <label> آپلود فایل</label>
                                <input type="file" class="form-control" name="file" id="exampleInputPassword1"
                                       placeholder="انتخاب فایل">
                                <div class="">
                                    <p class="text-end m-0">
                                        @if(@$row->file !== null)
                                            <a href="{{asset('/assets/uploads/product/'.@$row->file)}}"
                                               class="btn btn-custom-danger my-3">
                                                دانلود فایل اپلود شده
                                            </a>
                                        @endif
                                    </p>
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

@else
<h3 style="text-align: center;
color: darkorange;
margin-top: 10%;">سبد خرید شما خالی میباشد.</h3>
@endif
@endsection
