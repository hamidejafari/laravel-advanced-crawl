@extends("layouts.admin.master")

@section('content')
<div class="row">
<div class="col-md-10 mx-auto">
        <div class="card">
          <div class="card-header">
          <h3 class="card-title"> جدول دسته بندی مقالات</h3>
                  <div class="card-tools">
                  <a href="{{URL::action('Admin\ArticleController@getArticlecatAdd')}}" type="button"  class="btn btn-primary" >افزودن</a>
  
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    جستجو      
                    </button>

                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">سرچ کردن </h5>
                          </div>
                          <div class="modal-body">
                          <form action="{{URL::current()}}" method="GET">
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">نام:</label>
                            <input type="text" name="title" class="form-control" id="recipient-name">
                          </div>
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
                    <th>تصویر</th>
                    <th>نام</th>
                   
                    <th>وضعیت</th>
                    <th>فعالیت</th>
                  </tr>

                    @foreach($cat as $key=>$row)
                  
                    <tr>
                    <td>{{$key+1}}</td>
                    <td> 
                    <img src="{{asset('assets/uploads/content/article/'.$row->image)}}" alt="" style ="width: 50px">
                    </td>
                    <td>{{$row->title}}</td>
                    
                    
                    
                    <td>{{$row->status ? 'فعال' : 'غیر فعال'}}</td>
                    
                    <td> 
                    <a href="{{URL::action('Admin\ArticleController@getArticlecatEdit' , $row->id)}}" type="button" class="btn btn-primary" >ویرایش</a>
                    <a href="{{URL::action('Admin\ArticleController@getArticlecatDelete' , $row->id)}}" type="button" class="btn btn-danger" >حذف</a>
                    </td>
                  </tr>
                    @endforeach
                </table>
               
              </div>
          </div>
      </div>
</div>

@endsection