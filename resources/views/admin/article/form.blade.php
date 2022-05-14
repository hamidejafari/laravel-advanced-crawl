{{csrf_field()}}


<section class="content">
<div class="container-fluid">
<div class="col-md-10 mx-auto">
    <div class="card card-primary">
      <div class="card-header">
      <h3 class="card-title"> افزودن مقاله </h3>
      </div>

      <div class="card-body">
        <div class="row col-md-12">
          <div class="form-group col-md-6">
          <label>نام :</label>
          <input name="title" type="text" class="form-control" placeholder="تایپ کنید..."
          value = "@if(isset($data->title)){{$data->title}}@endif">
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
        </div>
          <div class="form-group">
          <label>متن:</label>
          <textarea name="description" type="text" rows="5" cols="5" class="form-control ckeditor" placeholder="تایپ کنید...">@if(isset($data->description)){!!$data->description!!} @endif
          </textarea>
          </div>
          <div class="form-group">
              <label>متن کوتاه:</label>
              <textarea name="short_text" type="text" rows="5" cols="5" class="form-control " placeholder="تایپ کنید...">@if(isset($data->short_text)){!!$data->short_text!!}@endif
          </textarea>
          </div>
        <div class="row col-md-12">
          <div class="form-group col-md-6">
          <label>نام سئو :</label>
          <input name="title_seo" type="text" class="form-control" placeholder="تایپ کنید..."
          value = "@if(isset($data->title_seo)){{$data->title_seo}}@endif">
          </div>
          <div class="form-group col-md-6">
          <label> انتخاب عکس سئو</label>
          <input type="text" name="image_seo" class="form-control" id="exampleInputPassword1" placeholder="انتخاب عکس"
          value = "@if(isset($data->image_seo)){{$data->image_seo}}@endif">
          </div>
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
          <input class="form-check-input" type="checkbox" name='status' value="1" @if(isset($data->status) && $data->status==1)checked="checked"  @endif>
          <label class="form-check-label"> نمایش در صفحه </label>
          </div>
        </div>
          <div class="card-footer">
          <button type="submit" class="btn btn-primary">ارسال</button>
          </div>

    </div>
  </div>
</div>
</section>
