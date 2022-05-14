@extends("layouts.admin.master")

@section('content')
<div class="row">
<div class="col-md-10 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> پیام ها </h3>
                <br>
                <div class="card">
                <div class="card-header">
                <a href="{{URL::action('Admin\CommentController@export')}}" type="button"  class="btn btn-primary" >Excel</a>
                   
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                جستجو      
                </button>

                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">سرچ کردن </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form action="{{URL::current()}}" method="GET">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">نام:</label>
                        <input type="text" name="commentable_type" class="form-control" id="recipient-name">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        <button type="submit" class="btn btn-primary">جستجو کردن</button>
                      </div>
                    </form>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>شماره</th>
                    <th> نام  </th>
                    <th> مشاهده  </th>
                    <th>وضعیت</th>
                    <th>تاریخ</th>
                    <th>فعالیت</th>
                  </tr>
                  @foreach($comments as $key=>$comment)
                    
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>
                    @if($comment->commentable_type == 'App\Models\Content'){{@$comment->article->title}}
                    @else($comment->commentable_type == 'App\Models\Category')
                    {{@$comment->category->title}}
                    @endif
                    </td>
                    <td>{{$comment->read_at ? 'خوانده شده' : ' خوانده نشده'}}</td>
                    <td>{{$comment->status ? 'فعال' : 'غیر فعال'}}</td>
                    <td>{{jdate('Y/m/d',$comment->created_at->timestamp)}}</td>
                    
                    <td> 
                    <a href="{{URL::action('Admin\CommentController@getCommentEdit' , $comment->id)}}" type="button" class="btn btn-primary" >مشاهده</a>
                    <a href="{{URL::action('Admin\CommentController@getCommentDelete' , $comment->id)}}" type="button" class="btn btn-danger" >حذف</a>
                    </td>
                  </tr>
                    @endforeach
                </table>
                
              </div>
            </div>
          </div>
        </div>

@endsection