@extends("layouts.admin.master")

@section('content')
    <div class="modal fade" id="sodModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin-top: 8%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="messageModalLabel" style="padding-right: 40px;">سود ها</h4>
                </div>
                <div class="modal-body">

                    <form method="post" action="{{url('/admin/add-profit/')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>از (دلار):</label>
                                    <input class="form-control" type="text" id="title" name="from_price"
                                           value=""
                                           placeholder="دلار  را وارد کنید . . ." >
                                </div>
                                <div class="col-md-6">
                                    <label>تا (دلار):</label>
                                    <input class="form-control" type="text" id="title" name="to_price"
                                           value=""
                                           placeholder="دلار  را وارد کنید . . ." >
                                </div>

                                <div class="col-md-6">
                                    <label>سود :</label>
                                    <input class="form-control" type="text" id="title" name="profit_price"
                                           value=""
                                           placeholder="قیمت  را وارد کنید . . ." >
                                </div>
                                <div class="col-md-6">
                                    <label>نوع قیمت سود:</label>
                                    <select class="form-control" id="select-state" name="type">
                                        <option value="0">دلار</option>
                                        <option value="1">تومان</option>
                                    </select>
                                </div>


                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 24px;">ذخیره</button>
                                </div>

                            </div>
                        </div>




                    </form>
                    <hr>

                    <table class="table">
                        <tr>
                            <th>از دلار</th>
                            <th>تا دلار</th>
                            <th>سود</th>
                            <th>نوع سود</th>
                            <th>عملیات</th>
                        </tr>
                        @foreach($profits as $row)
                            <tr>

                                <td>
                                    {{$row->from_price}} دلار
                                </td>

                                <td>
                                    {{$row->to_price}} دلار
                                </td>
                                <td>
                                    {{$row->profit_price}}
                                </td>

                                <td>
                                    {{$row->type ?  'تومان' : 'دلار'}}
                                </td>


                                <td>
                                    <center>
                                        <a href="{{url('/admin/delete-profit/'.$row->id)}}" data-toggle="tooltip"
                                           data-original-title="حذف اطلاعات" class="btn btn-danger  btn-xs"><i
                                                class="fa fa-trash"></i> حذف </a>
                                    </center>
                                </td>
                            </tr>
                        @endforeach


                    </table>

                </div>
            </div>
        </div>
    </div>

    <form method="post"  action="{{url('/admin/post-price-setting')}}" enctype="multipart/form-data"  >
        {{csrf_field()}}


        <section class="content">
            <div class="container-fluid">
                <div class="col-md-10 mx-auto">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> تنظیمات قیمت </h3>
                        </div>
                        <div class="card-body">
                            <div class="row col-md-12">
                                <div class="form-group col-md-6">
                                    <label>قیمت دلار روز :</label>
                                    <input name="current_dollar" type="text" class="form-control" placeholder="تایپ کنید..."
                                           value="{{$setting->current_dollar}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>درصد کشیده شده روی دلار:</label>
                                    <input name="precent_dollar_profit" type="text" class="form-control" placeholder="به تومان وارد کنید"
                                           value="{{$setting->precent_dollar_profit}}"
                                    >
                                </div>

                                <div class="form-group col-md-12">
                                    <label>اعمال قیمت رپورتاژ ها :</label>
                                    <select class="form-control" id="select-state" name="pricing_time">
                                            <option @if($setting->pricing_time == "none") selected @endif value="none">هیچکدام, به صورت دستی</option>
                                            <option @if($setting->pricing_time == "daily") selected @endif value="daily">هر روز</option>
                                            <option @if($setting->pricing_time == "weekly") selected @endif value="weekly">هر هفته</option>
                                            <option @if($setting->pricing_time == "monthly") selected @endif value="monthly">هر ماه</option>
                                    </select>
                                </div>


                                <div class="form-group col-md-12">
                                    <input type="checkbox" name="pricing" value="1" >
					                <span class="text">اعمال قیمت و از حالت اتوماتیک خارج کردن</span>
                                </div>






                                <a data-toggle="modal" data-target="#sodModal"  class="btn btn-primary" style="margin-right: 43%;background-color: #1ba61d;color:white">لیست سود ها</a>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">ذخیره </button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </form>
@endsection
