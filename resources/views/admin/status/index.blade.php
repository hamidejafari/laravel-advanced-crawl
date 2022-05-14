@extends("layouts.admin.master")
@section('content')
    <div class="row">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">لیست وضعیت های درکی رپورتاژ</h3>
                    <div class="card-tools">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            اضافه کردن
                        </button>

                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">اضافه کردن </h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{URL::action('Admin\StatusController@postAdd')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">عنوان:</label>
                                                <input type="text" name="title" class="form-control" id="recipient-name">
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">رنگ:</label>
                                                <input type="color" name="color" class="form-control" value="#ffff" id="recipient-name" style="height: 63px;">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                                <button type="submit" class="btn btn-primary">اضافه کردن</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <br>



                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tr>
                                <th>کد</th>
                                <th>عنوان</th>
                                <th>رنگ</th>
                                <th style="width:174px">عملیات</th>
                            </tr>
                            @foreach($data as $row)
                                <tr>
                                    <td scope="row" class="text-secondary text-center">
                                        {{$row->id}}
                                    </td>
                                    <td>{{@$row->title}}</td>
                                    <td style="background: {{$row->color}}"></td>
                                    <td>
                                        <a href="{{URL::action('Admin\StatusController@getDelete' , $row->id)}}" type="button" class="btn btn-danger" >حذف</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection
