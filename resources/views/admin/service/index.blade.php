@extends("layouts.admin.master")

@section('content')
<div class="row">
<div class="col-md-10 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">جدول خدمات </h3>

                <div class="card-tools">
                <a href="{{URL::action('Admin\ServiceController@getServiceAdd')}}" type="button" class="btn btn-primary" >افزودن</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>شماره</th>
                    <th>تصویر</th>
                    <th>نام</th>
                    <th>وضعیت</th>
                    <th>فعالیت</th>
                  </tr>
                  @foreach($data as $key=>$service)
                    
                  <tr>
                    <td>{{$key+1}}</td>
                    <td> 
                    <img src="{{asset('assets/uploads/service/'.$service->image)}}" alt="" style ="width: 50px" >
                    </td>
                    <td>{{$service->title}}</td>
                    <td>{{$service->status ? 'فعال' : 'غیر فعال'}}<span class="badge badge-success"></span></td>
                    <td> 
                    <a href="{{URL::action('Admin\ServiceController@getServiceEdit' , $service->id)}}" type="button" class="btn btn-primary" >ویرایش</a>
                    <a href="{{URL::action('Admin\ServiceController@getServiceDelete' , $service->id)}}" type="button" class="btn btn-danger" >حذف</a>
                    </td>
                  </tr>
                    @endforeach
                </table>
                
              </div>
            </div>
          </div>
        </div>

@endsection