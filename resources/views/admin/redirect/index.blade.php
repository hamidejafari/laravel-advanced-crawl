@extends("layouts.admin.master")

@section('content')
<div class="row">
<div class="col-md-10 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">جدول محصولات</h3>

                <div class="card-tools">
                <a href="{{URL::action('Admin\RedirectController@getRedirectAdd')}}" type="button" class="btn btn-primary" >افزودن</a>
                </div>
              </div>
             
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>شماره</th>
                    <th>آدرس قدیم</th>
                    <th>آدرس جدید</th>
                    <th>فعالیت</th>
                  </tr>
                  @foreach($data as $key=>$redirect)
                   
                  <tr>
                  <td>{{$key+1}}</td>
                    <td>{{$redirect->old_address}}</td>
                    <td>{{$redirect->new_address}}</td>
                    <td> 
                    <a href="{{URL::action('Admin\RedirectController@getRedirectDelete' , $redirect->id)}}" type="button" class="btn btn-danger" >حذف</a>
                    </td>
                  </tr>
                  @endforeach
                </table>
                <div class="pagii">
                   
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection