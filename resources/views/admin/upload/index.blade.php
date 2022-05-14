@extends("layouts.admin.master")

@section('content')
<div class="row">
<div class="col-md-10 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">جدول uploader</h3>
                <div class="card-tools">
                <a href="{{URL::action('Admin\UploadController@getUploadAdd')}}" type="button" class="btn btn-primary" >افزودن</a>
                </div>
              </div>
              
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>شماره</th>
                    <th>تصویر</th>
                    <th>نام</th>
                    <th>آدرس</th>
                    <th>وضعیت</th>
                    <th>فعالیت</th>
                  </tr>
                  @foreach($data as $key=>$upload)
                   
                  <tr>
                    <td>{{$key+1}}</td>
                    <td> 
                    <img src="{{asset('assets/uploads/content/upload/'.$upload->image)}}" alt="" style ="width: 50px" >
                    </td>
                    <td>{{$upload->title}}</td>
                    <td ><a href="{{asset('assets/uploads/content/upload/'.$upload->image)}}">{{asset('assets/uploads/content/upload/'.$upload->image)}}</a></td>
                    <td>{{$upload->status ? 'فعال' : 'غیر فعال'}}<span class="badge badge-success"></span></td>
                    <td> 
                    <a href="{{URL::action('Admin\UploadController@getUploadEdit' , $upload->id)}}" type="button" class="btn btn-primary" >ویرایش</a>
                    <a href="{{URL::action('Admin\UploadController@getUploadDelete' , $upload->id)}}" type="button" class="btn btn-danger" >حذف</a>
                    </td>
                  </tr>
                    @endforeach
                </table>
                <div class="pagii">
                    @if(count($data))
                        {!! $data->appends(Request::except('page'))->render() !!}
                    @endif
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection