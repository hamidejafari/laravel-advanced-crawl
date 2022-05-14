@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\ProductController@import')}}" enctype="multipart/form-data"  >
{{csrf_field()}}
<section class="content">
    <div class="container-fluid">
        <div class="row">
         
        <div class="col-md-10 mx-auto">
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> افزودن رپورتاژ </h3>
              </div>
              
              
                <div class="card-body">

                  <div class="form-group">
                    <label>انتخاب فایل</label>
                    <input type="file" class="form-control" name="file" enctype="multipart/form-data" placeholder="انتخاب فایل">

                  </div>
                  
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ارسال</button>
              
                <a href="{{URL::action('Admin\ProductController@getProduct')}}" type="button"  class="btn btn-primary" >بازگشت</a>
                  </div>
            </div>
        </div>
    </div>
</section>
</form>
@endsection