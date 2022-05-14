@extends("layouts.admin.master")

@section('content')
<div class="row">
<div class="col-md-10 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">جدول کشور </h3>

                <div class="card-tools">
                <a href="{{URL::action('Admin\CountryController@getCountryAdd')}}" type="button" class="btn btn-primary" >افزودن</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>شماره</th>
                    <th>نام</th>
                      <th>تصویر</th>

                      <th>نمایش در منو</th>
                    <th>فعالیت</th>
                  </tr>
                  @foreach($data as $key=>$country)

                  <tr>
                    <td>{{$key+1}}</td>

                    <td>{{$country->title}}</td>
                      <td><img src="{{ $country->image ? asset('assets/uploads/country/'.$country->image) : asset('assets/notFound.jpg')}}" style="width: 100px;" /></td>

                      <td>{{$country->status ? 'فعال' : 'غیر فعال'}}<span class="badge badge-success"></span></td>
                    <td>
                    <a href="{{URL::action('Admin\CountryController@getCountryEdit' , $country->id)}}" type="button" class="btn btn-primary" >ویرایش</a>
                    <a href="{{URL::action('Admin\CountryController@getCountryDelete' , $country->id)}}" type="button" class="btn btn-danger" >حذف</a>
                    </td>
                  </tr>
                    @endforeach
                </table>

              </div>
            </div>
          </div>
        </div>

@endsection
