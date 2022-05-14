@extends("layouts.admin.master")

@section('content')
<div class="row">
<div class="col-md-10 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">جدول مقالات</h3>

                <div class="card-tools">
                <a href="{{URL::action('Admin\ArticleController@getArticleAdd')}}" type="button" class="btn btn-primary" >افزودن</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>شماره</th>
                    <th>تصویر</th>
                    <th>نام</th>
                    <!--<th>دسته بندی</th>-->
                    <th>وضعیت</th>
                    <th>فعالیت</th>
                  </tr>
                  @foreach($data as $key=>$article)
                    
                  <tr>
                    <td>{{$key+1}}</td>
                    <td> 
                    <img src="{{asset('assets/uploads/content/article/'.$article->image)}}" alt="" style ="width: 50px">
                    </td>
                    <td>{{$article->title}}</td>
                    
                    <!--<td>{{@$article->parent->title}}</td>-->
                    <td>{{$article->status ? 'فعال' : 'غیر فعال'}}<span class="badge badge-success"></span></td>
                    <td> 
                    <a href="{{URL::action('Admin\ArticleController@getArticleEdit' , $article->id)}}" type="button" class="btn btn-primary" >ویرایش</a>
                    <a href="{{URL::action('Admin\ArticleController@getArticleDelete' , $article->id)}}" type="button" class="btn btn-danger" >حذف</a>
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

@endsection