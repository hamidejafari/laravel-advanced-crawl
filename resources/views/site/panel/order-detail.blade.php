@extends("site.panel.master")
@section('content')
<div class="border dashboard-search p-4 mb-0">
	<h4 class="text-custom text-center mb-4" style="text-align: center">
		جزییات سفارش
		<br>
		<a class="btn btn-custom-danger rounded-3" href="{{url('/panel/orders')}}"
			style="background-color: #ff8c00;margin-top: 1%;">
			بازگشت
		</a>
	</h4>

	<div class="row w-100 m-0">
		<div style="margin-right: 24%;margin-bottom: 3%;" class="col-xxl-6 col-lg-6 col-sm-12 p-2">
			<div class="card bg-light rounded-3 shadow-sm p-2">
				<ul class="px-0 m-0">
					<li class="list-unstyled p-1">
						<p class="m-0 text-custom fw-bolder">
							وضعیت کلی فاکتور :
							<span class="text-custom-danger fw-lighter float-end">
								{{@$order->orderStatus->title}}
							</span>
						</p>
					</li>


                    @if($order->payment)
                        <li class="list-unstyled p-1">
                            <p class="m-0 text-custom fw-bolder">
                                مبلغ اولیه پرداخت شده :
                                <span class="text-custom-danger fw-lighter float-end">

                                {{number_format($order->payment) . ' تومان '}}
                            </span>
                            </p>
                        </li>


                        @if(@$order->transactions)
                            <li class="list-unstyled p-1">
                                <p class="m-0 text-custom fw-bolder">
                                    تاریخ پرداخت مبلغ اولیه:
                                    <span class="text-custom-danger fw-lighter float-end" style="direction: ltr;">

                                     {{jdate('Y/m/d  H:i',@$order->transactions[0]->created_at->timestamp)}}
                                </span>
                                </p>
                            </li>
                        @endif

                    @endif

					<li class="list-unstyled p-1">
						<p class="m-0 text-custom fw-bolder">
							مبلغ کل سفارش :
							<span class="text-custom-danger fw-lighter float-end">
								{{number_format($order->total_prices) . ' تومان '}}
							</span>
						</p>
					</li>

                    <li class="list-unstyled p-1">
                        <p class="m-0 text-custom fw-bolder">
                            تاریخ ثبت سفارش:
                            <span class="text-custom-danger fw-lighter float-end" style="direction: ltr;">

								 {{jdate('Y/m/d  H:i',$order->created_at->timestamp)}}
							</span>
                        </p>
                    </li>







                    @if(@$order->transactions)
                        <div class="col-md-12 ms-auto px-0 py-2">
                            <!-- Button trigger modal -->
                            <a type="button"
                               class="btn btn-custom-outline-danger fw-bolder btn-lg d-flex align-items-center ms-auto"
                               style="float: right;" href="{{url('/panel/transactions?order_id='.$order->id)}}">
                               تراکنش ها
                            </a>
                        </div>
                    @endif


				</ul>
			</div>
		</div>
	</div>

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
					وضعیت
				</th>
				<th scope="col" class="text-center text-custom fw-bolder">
					عملیات
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($order->orderItems as $row)
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
					{{@$row->orderStatus->title}}
				</td>
				<td class="text-center">
                    @if(
                        $row->order->order_status_id == 1 ||
                        $row->order_item_status_id == 18 ||
                        $row->order_item_status_id == 14 ||
                        $row->order_item_status_id == 15
                    )
                        <button type="button" class="btn btn-custom-danger rounded-3" data-bs-toggle="modal"
                                data-bs-target="#orderModal{{$row->id}}">
                            <i class="fas fa-edit"></i> ویرایش
                        </button>
                    @endif


                    @if(
                        $row->order->order_status_id == 1 ||
                        $row->order_item_status_id == 10 ||
                        $row->order_item_status_id == 12 ||
                        $row->order_item_status_id == 13 ||
                        $row->order_item_status_id == 16 ||
                        $row->order_item_status_id == 14
                    )
                        <a type="button" class="btn btn-custom-danger rounded-3"
                            href="{{url('/panel?order_item_id='.$row->id)}}">
                            <i class="fas fa-edit"></i> ویرایش و تغییر رسانه
                        </a>
                    @endif
                    @if($row->problems !== null)
                        <button type="button" class="btn btn-success rounded-3" data-bs-toggle="modal"
                                data-bs-target="#orderDetailModal{{$row->id}}">
                            مشاهده توضیحات مدیریت
                        </button>
                    @endif
					@if(@$row->order_item_status_id == 11)
                        <button type="button" class="btn btn-success rounded-3" data-bs-toggle="modal"
                            data-bs-target="#orderDetailModal{{$row->id}}">
                            مشخصات رپورتاژ منتشر شده
                        </button>
					@endif


{{--                    @if(--}}
{{--                        $row->order_item_status_id == 10 ||--}}
{{--                        $row->order_item_status_id == 12 ||--}}
{{--                        $row->order_item_status_id == 13 ||--}}
{{--                        $row->order_item_status_id == 16 ||--}}
{{--                        $row->order_item_status_id == 14--}}
{{--                    )--}}
{{--                        <a  class="btn btn-custom-danger rounded-3"--}}
{{--                           href="{{route('site.panel.back-charge',['orderItemId'=>$row->id])}}"--}}
{{--                           style="background-color: red;">--}}
{{--                            بازگشت وجه به اعتبار--}}
{{--                        </a>--}}
{{--                    @endif--}}

                    @if(
                        $row->order->order_status_id == 1 ||
                        $row->order_item_status_id == 12 ||
                        $row->order_item_status_id == 10 ||
                        $row->order_item_status_id == 13
                    )
                        <a  class="btn btn-custom-danger rounded-3"
                            href="{{route('site.panel.order.status',['id'=>$row->id,'status'=>16])}}"
                            style="background-color: red;">
                            حذف
                        </a>
                    @endif
                        @if(
                       $row->order_item_status_id == 14
                   )
                            <a  class="btn btn-custom-danger rounded-3"
                                href="{{route('site.panel.order.status',['id'=>$row->id,'status'=>16])}}"
                                style="background-color: red;">
                                لغو
                            </a>
                        @endif




{{--                    @if($row->order->order_status_id !== 1 && $row->order_item_status_id != 11 && $row->order_item_status_id != 12 &&--}}
{{--                    $row->order_item_status_id != 13 && $row->order_item_status_id != 16 && $row->order_item_status_id != 17  &&  $row->order_item_status_id != 15  &&  $row->order_item_status_id != 2)--}}
{{--                        <a type="button" class="btn btn-custom-danger rounded-3"--}}
{{--                           href="{{route('site.panel.order.status',['id'=>$row->id,'status'=>16])}}"--}}
{{--                           style="background-color: red;">--}}
{{--                            لغو رپورتاژ--}}
{{--                        </a>--}}
{{--                    @endif--}}


				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@foreach($order->orderItems as $row)
<!-- Modal -->
<div class="modal fade" id="orderDetailModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog">

		<div class="modal-content" style="width: 650px;margin-right: -12%;">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"> جزییات رپورتاژ در رسانه "{{@$row->product->domain}}"
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				@if(@$row->orderStatus->id == 11)

				<p style="text-align: center">
					لینک رپورتاژ :‌ <a target="_blank" rel="noreferrer" href="{{$row->link}}">{{$row->link}}</a>
				</p>
				
				@endif
<p style="text-align: center">
					{{$row->problems}}
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
			</div>
		</div>
		</form>
	</div>
</div>
@endforeach



@foreach($items as $row)
<!-- Modal -->
<div class="modal fade" id="orderModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<form method="post" action="{{route('site.panel.order.post-edit')}}" enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="hidden" name="order_item_id" value="{{$row->id}}" />

			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"> ویرایش رپورتاژ در رسانه
						"{{@$row->product->domain}}"</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
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
										@if(@$row->product->categories)
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
                    @if($row->product->requirements !== null || ($row->product->content_requirements !== null && strlen($row->product->content_requirements) > 3) )
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
										placeholder=" نام کمپین را وارد کنید..." @if(@$row->order_item_status_id == 15) disabled @endif value="{{@$row->name}}">
								</div>
							</div>
							<div class="col-xl-6 p-1">
								<div class="form-group col-md-12">
									<label>عنوان :</label>
									<input name="title" type="text" class="form-control"
										placeholder=" عنوان رپورتاژ را وارد کنید..." @if(@$row->order_item_status_id == 15) disabled @endif  value="{{@$row->title}}">
								</div>
							</div>
							<div class="col-xl-12 p-1">
								<div class="form-group">
									<label>توضیحات :</label>
									<textarea name="description" type="text" rows="3" cols="3"
										class="form-control"
										placeholder=" اگر توضیح و نکته ای در هنگام انتشار رپورتاژ دارید وارد نمایید.">{{$row->description}}</textarea>
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
								@if($row->file !== null)
								<a href="{{asset('/assets/uploads/product/'.$row->file)}}"
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


@endsection
