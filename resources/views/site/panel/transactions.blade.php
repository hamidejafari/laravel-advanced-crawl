@extends("site.panel.master")
@section('content')
    <div class="border dashboard-search p-4 mb-0">
        <h4 class="text-custom text-center mb-4">
            لیست تراکنش ها
        </h4>
        <table class="table table-striped m-0">
            <thead>
            <tr>
                <th scope="col" class="text-center text-custom fw-bolder">
                    برای
                </th>
                <th scope="col" class="text-center text-custom fw-bolder">
                   وضعیت
                </th>
                <th scope="col" class="text-center text-custom fw-bolder">
                  تاریخ
                </th>
                <th scope="col" class="text-center text-custom fw-bolder">
                    مبلغ
                </th>
                <th scope="col" class="text-center text-custom fw-bolder">
                    جزئیات
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $row)
                <tr>
                    <th class="text-center" scope="row">

                        @if($row->order_item_id == null)
                            {{$row->description ? $row->description : 'سفارش رپورتاژ'}}
                            {{ $row->type == 1 ? ' | کسر از اعتبار' : '' }}
                            {{ $row->type == 0 ? ' | پرداخت بانکی ' : '' }}
                        @else
                            @if($row->order_item_id !== null && $row->product_new_id !== null && $row->product_old_id == null)
                                {{'بازگشت مبلغ رپورتاژ به اعتبار' . ' |  رسانه :  ' . $row->productNew->domain }}
                            @else
                                {!!  'تغییر رسانه از ' .'<br>'. $row->productOld->domain . '<br>'. ' به ' .'<br>'. $row->productNew->domain !!}
                                {{ $row->type == 1 ? ' | کسر از اعتبار' : '' }}
                                {{ $row->type == 0 ? ' | پرداخت بانکی '  : '' }}
                            @endif
                        @endif

                    </th>
                    <td class="text-center">
                        {{$row->status == "SUCCEED" ? 'موفق' : 'ناموفق' }}
                    </td>
{{--                    <td class="text-center">--}}
{{--                        {{$row->ref_id }}--}}
{{--                    </td>--}}
                    <td class="text-center" style="direction: ltr;">
                        {{jdate('Y/m/d  H:i',$row->created_at->timestamp)}}
                    </td>
                    <td class="text-center">
                        {{number_format($row->price)}} ریال
                    </td>
                    <td class="text-center">
                        <a href="{{route('site.panel.transaction.detail',['id'=>$row->id])}}" class="btn btn-custom-danger rounded-3">
                            <i class="fas fa-eye"></i>
                        </a>



                        @if(@$row->order)
                            @if(count(@$row->order->orderItems) > 0)

                                <a href="{{route('site.panel.order.detail',['id'=>$row->order_id])}}" class="btn btn-custom-danger rounded-3">
                                    نمایش سفارش
                                </a>
                            @endif
                        @endif


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <center>
        {{ $transactions->appends(request()->input())->render() }}
    </center>
@endsection
