@extends("layouts.admin.master")

@section('content')
<div class="row">
<div class="col-md-10 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">جدول سوالات متدوال </h3>

                <div class="card-tools">
                <a href="{{URL::action('Admin\ContentController@getQuestionAdd')}}" type="button" class="btn btn-primary" >افزودن</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>شماره</th>
                    <th>سوال</th>
                    <th>پاسخ</th>
                    <th>وضعیت</th>
                    <th>فعالیت</th>
                  </tr>
                  @foreach($data as $key=>$question)
                    
                  <tr>
                  <td>{{$key+1}}</td>
                    
                    <td>{{$question->question}}</td>
                    <td>{{$question->response}}</td>
                    <td>{{$question->status ? 'فعال' : 'غیر فعال'}}<span class="badge badge-success"></span></td>
                    <td> 
                    <a href="{{URL::action('Admin\ContentController@getQuestionEdit' , $question->id)}}" type="button" class="btn btn-primary" >ویرایش</a>
                    <a href="{{URL::action('Admin\ContentController@getQuestionDelete' , $question->id)}}" type="button" class="btn btn-danger" >حذف</a>
                    </td>
                  </tr>
                    @endforeach
                </table>
                
              </div>
            </div>
          </div>
        </div>

@endsection