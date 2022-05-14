@extends("layouts.admin.master")

@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست تیکت ها  </h3>

                    <div class="card-tools">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr>
                            <th>کد</th>
                            <th>کاربر</th>
                            <th>وضعیت</th>
                            <th>تاریخ</th>
                            <th>فعالیت</th>
                        </tr>
                        @foreach($data as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td> {{ @$row->user->name . ' ' . @$row->user->family }}</td>
                                <td>     {{$row->status ? 'پاسخ داده شده' : 'در انتظار پاسخ'}}</td>
                                <td>  {{jdate('Y/m/d H:i',$row->created_at->timestamp)}}</td>

                                <td>
                                    <a href="{{URL::action('Admin\TicketController@detail' , $row->id)}}" type="button" class="btn btn-primary" >جزییات</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
