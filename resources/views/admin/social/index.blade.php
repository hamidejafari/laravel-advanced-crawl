@extends("layouts.admin.master")

@section('content')
<div class="row">
<div class="col-md-10 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">فضای مجازی </h3>

                <div class="card-tools">
                <a href="{{URL::action('Admin\SocialController@getSocialAdd')}}" type="button" class="btn btn-primary" >افزودن</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>شماره</th>
                    
                    <th>نام</th>
                    <th>آدرس</th>
                    <th>فعالیت</th>
                  </tr>
                  @foreach($data as $key=>$social)
                    
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$social->title}}</td>
                    <td>{{$social->address}}</td>
                    
                    <td> 
                    <a href="{{URL::action('Admin\SocialController@getSocialEdit' , $social->id)}}" type="button" class="btn btn-primary" >ویرایش</a>
                    <a href="{{URL::action('Admin\SocialController@getSocialDelete' , $social->id)}}" type="button" class="btn btn-danger" >حذف</a>
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