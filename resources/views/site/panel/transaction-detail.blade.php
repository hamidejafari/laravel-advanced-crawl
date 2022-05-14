@extends("site.panel.master")
@section('content')
    <div class="border dashboard-search p-4 mb-0">


        <h4 class="text-custom text-center mb-4" style="text-align: center">
            جزییات تراکنش
            <br>
            <a class="btn btn-custom-danger rounded-3" href="{{url('/panel/transactions')}}" style="background-color: #ff8c00;margin-top: 1%;">
                بازگشت
            </a>
        </h4>

        <div class="row w-100 m-0">
            <div style="margin-right: 24%;margin-bottom: 3%;" class="col-xxl-6 col-lg-6 col-sm-12 p-2" >
                <div class="card bg-light rounded-3 shadow-sm p-2">
                    <ul class="px-0 m-0">
{{--                        <li class="list-unstyled p-1">--}}
{{--                            <p class="m-0 text-custom fw-bolder">--}}
{{--                                کاربر :--}}
{{--                                <span class="text-custom-danger fw-lighter float-end">--}}
{{--								 {{@$transaction->user->name . ' ' . @$transaction->user->family}}--}}
{{--								</span>--}}
{{--                            </p>--}}
{{--                        </li>--}}

                        <li class="list-unstyled p-1">
                            <p class="m-0 text-custom fw-bolder">
                                برای :
                                <span class="text-custom-danger fw-lighter float-end">
								    @if($transaction->order_item_id == null)
                                        {{$transaction->description ? $transaction->description : 'سفارش رپورتاژ'}}
                                        {{ $transaction->type == 1 ? ' | کسر از اعتبار' : '' }}
                                        {{ $transaction->type == 0 ? ' | پرداخت بانکی ' : '' }}
                                    @else
                                        @if($transaction->order_item_id !== null && $transaction->product_new_id !== null && $transaction->product_old_id == null)
                                            {{'بازگشت مبلغ رپورتاژ به اعتبار' . ' |  رسانه :  ' . $transaction->productNew->domain }}
                                        @else
                                            {{ 'تغییر رسانه از ' . $transaction->productOld->domain . ' به ' . $transaction->productNew->domain }}
                                            {{ $transaction->type == 1 ? ' | کسر از اعتبار' : '' }}
                                            {{ $transaction->type == 0 ? ' | پرداخت بانکی '  : '' }}
                                        @endif
                                    @endif

								</span>
                            </p>
                        </li>

                        <li class="list-unstyled p-1">
                            <p class="m-0 text-custom fw-bolder">
                                وضعیت تراکنش :
                                <span class="text-custom-danger fw-lighter float-end">
								 {{$transaction->status == "SUCCEED" ? 'موفق' : 'ناموفق' }}
								</span>
                            </p>
                        </li>
                        @if($transaction->ref_id)

                        <li class="list-unstyled p-1">
                            <p class="m-0 text-custom fw-bolder">
                                کد پیگیری بانک :
                                <span class="text-custom-danger fw-lighter float-end">
									{{$transaction->ref_id}}
								</span>
                            </p>
                        </li>
                        @endif
                        <li class="list-unstyled p-1">
                            <p class="m-0 text-custom fw-bolder">
                                مبلغ  :
                                <span class="text-custom-danger fw-lighter float-end">
									{{number_format($transaction->price) . ' ریال '}}
								</span>
                            </p>
                        </li>


                        @if($transaction->card_number)
                        <li class="list-unstyled p-1">
                            <p class="m-0 text-custom fw-bolder">
                                شماره کارت :
                                <span class="text-custom-danger fw-lighter float-end" style="direction:ltr">
									{{$transaction->card_number ? $transaction->card_number : 'ندارد'}}
								</span>
                            </p>
                        </li>
                        @endif
                        <li class="list-unstyled p-1">
                            <p class="m-0 text-custom fw-bolder">
                                آی پی :
                                <span class="text-custom-danger fw-lighter float-end">
									{{$transaction->ip}}
								</span>
                            </p>
                        </li>

                        <li class="list-unstyled p-1">
                            <p class="m-0 text-custom fw-bolder">
                                تاریخ پرداخت:
                                <span class="text-custom-danger fw-lighter float-end" style="direction: ltr;">
                                    {{jdate('Y/m/d  H:i',$transaction->created_at->timestamp)}}


								</span>
                            </p>
                        </li>


                    </ul>
                    @if(@$transaction->order)
                        @if(count(@$transaction->order->orderItems) > 0)
                            <div class="col-md-12 ms-auto px-0 py-2">
                                <!-- Button trigger modal -->
                                <a type="button"
                                        class="btn btn-custom-outline-danger fw-bolder btn-lg d-flex align-items-center ms-auto"
                                        style="float: right;" href="{{route('site.panel.order.detail',['id'=>$transaction->order_id])}}">

                                   نمایش سفارش
                                </a>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>

    </div>


@endsection
