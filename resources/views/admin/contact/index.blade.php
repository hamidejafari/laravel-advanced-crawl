@extends("layouts.admin.master")

@section('content')
<div class="row">
<div class="col-md-10 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> پیام ها </h3>
                <div class="card-header">
                <a href="{{URL::action('Admin\ContactController@export')}}" type="button"  class="btn btn-primary" >Excel</a>
               </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>شماره</th>
                    <th>نام</th>
                    <th>وضعیت</th>
                    <th>تاریخ</th>
                    <th>فعالیت</th>
                  </tr>
                  @foreach($data as $key=>$contact)
                    
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->read_at ? 'خوانده شده' : 'خوانده نشده'}}</td>
                    <td>{{jdate('Y/m/d',$contact->created_at->timestamp)}}</td>
                    
                    <td> 
                    <a href="{{URL::action('Admin\ContactController@getContactEdit' , $contact->id)}}" type="button" class="btn btn-primary" >مشاهده</a>
                    <a href="{{URL::action('Admin\ContactController@getDeleteContact' , $contact->id)}}" type="button" class="btn btn-danger" >حذف</a>
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