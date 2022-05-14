{{csrf_field()}}
<div class="col-md-10 mx-auto">
<div class="card card-info">

    <div class="card-header">
      <h3 class="card-title">افزودن دسته بندی</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal">
      <div class="card-body">
        <div class="row col-md-12">
          <div class="form-group col-md-6">
            <label >نام دسته بندی</label>
              <input type="text" name="title" class="form-control"  placeholder="نام دسته را وارد کنید..."
              value = "@if(isset($data->title_seo)){{$data->title_seo}}@endif">
          </div>
          <div class="form-group col-md-6">
            <label>انتخاب عکس</label>
            <input type="file" class="form-control" name="image" id="exampleInputPassword1" placeholder="انتخاب فایل">
            @if(isset($data->image))
            <img src="{{asset('assets/uploads/content/article/'.$data->image)}}" alt="" style = "width: 150px">
            @endif
          </div>
          <div class="form-group col-md-6">
            <label>URL</label>
            <input type="tetx" name="url" class="form-control"  placeholder="وارد کردن url..."
            value = "@if(isset($data->url)){{$data->url}}@endif">
          </div>
          <div class="form-group col-md-6">
            <label>نام سئو :</label>
            <input name="title_seo" type="text" class="form-control" placeholder="تایپ کنید..."
            value = "@if(isset($data->title_seo)){{$data->title_seo}}@endif">
          </div>
        </div>
          <div class="form-group">
          <label>متن:</label>
          <textarea name="description" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->description)){{$data->description}}@endif</textarea>
          </div>


          <div class="form-group">
            <label>متن سئو :</label>
            <textarea name="description_seo" rows="5" type="text" class="form-control" placeholder="تایپ کنید...">@if(isset($data->description_seo)){{$data->description_seo}}@endif</textarea>
          </div>


          <div class="form-group">
              <label>Schema Codes :</label>
              <textarea name="schema_code" rows="5" type="text" class="form-control" placeholder="تایپ کنید...">@if(isset($data->schema_code)){{$data->schema_code}}@endif</textarea>
          </div>

          <div class="form-check">
          <input name="status" type="checkbox" class="switchery" checked="checked"
          value="1" @if(isset($data->status) && $data->status==1)checked="checked"  @endif>
          فعال
          </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-info">ارسال</button>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
  </div>
