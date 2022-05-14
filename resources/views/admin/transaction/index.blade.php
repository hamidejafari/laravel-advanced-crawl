@extends("layouts.admin.master")

@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> لیست تراکنش ها </h3>

                    <div class="card-tools">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr>
                            <th>برای</th>
                            <th>کاربر</th>
                            <th>وضعیت</th>
                            <th>تاریخ</th>
                            <th>کدپیگیری</th>
                            <th>مبلغ پرداختی</th>
                            <th>شماره کارت</th>
                            <th>آی پی</th>
                        </tr>
                        @foreach($data as $row)
                            <tr>
                                <td>{{$row->description ? $row->description : 'سفارش رپورتاژ'}}</td>
                                <td> {{ @$row->user->name . ' ' . @$row->user->family }}</td>
                                <td> {{$row->status == "SUCCEED" ? 'پرداخت شده و موفقیت آمیز' : 'پرداخت نشده' }}</td>
                                <td>    {{jdate('Y/m/d  H:i',$row->created_at->timestamp)}}</td>
                                <td>   {{$row->ref_id }}</td>
                                <td> {{number_format($row->price)}} تومان</td>
                                <td>   {{$row->card_number ? $row->card_number : 'ندارد'}}</td>
                                <td>   {{$row->ip }}</td>

                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
