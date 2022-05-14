@extends("site.panel.master")
@section('content')
    <div class="border dashboard-search p-4 mb-0">
        <h4 class="text-custom text-center mb-4">
            لیست سفارشات
        </h4>
        <table class="table table-striped m-0">
            <thead>
                <tr>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        کد پیگیری
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        تعداد رپورتاژ ها
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        وضعیت
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        مبلغ کل
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        مبلغ پرداختی
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        تاریخ
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        عملیات
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($orders as $row)
                <tr>
                    <th class="text-center" scope="row">
                        {{$row->id}}
                    </th>
                    <td class="text-center">
                        {{count($row->orderItems)}}
                    </td>
                    <td class="text-center">
                        {{$row->orderStatus->title}}
                    </td>
                    <td class="text-center">
                        {{number_format($row->total_prices) . ' تومان '}}
                    </td>
                    <td class="text-center">
                        {{number_format($row->payment) . ' تومان '}}
                    </td>
                    <td class="text-center" style="direction: ltr;">
                        {{jdate('Y/m/d  H:i',$row->created_at->timestamp)}}
                    </td>
                    <td class="text-center">
                        <a href="{{route('site.panel.order.detail',['id'=>$row->id])}}" class="btn btn-custom-danger rounded-3">
                            <i class="fas fa-eye"></i>
                        </a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
