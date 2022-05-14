{{csrf_field()}}


<section class="content">
    <div class="container-fluid">
        <div class="row">

        <div class="col-md-10 mx-auto">

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> افزودن کشور </h3>
              </div>


            <div class="card-body">

            <div class="row col-md-12">
            <div class="form-group col-md-6">
                <label>زبان :</label>
                <input name="title" type="text" class="form-control" placeholder="تایپ کنید..."
                value = "@if(isset($data->title)){{$data->title}}@endif">
                  </div>
                  <div class="form-group col-md-6">
                  <label>نام سئو :</label>
                  <input name="title_seo" type="text" class="form-control" placeholder="تایپ کنید..."
                  value = "@if(isset($data->title_seo)){{$data->title_seo}}@endif">
                  </div>
                  </div>
                  <div class="form-group">
                   <label>متن سئو:</label>
                    <textarea name="description_seo" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">
                    @if(isset($data->description_seo)){{$data->description_seo}}@endif
                    </textarea>
                  </div>
                <div class="form-group">
                    <label>Schema Codes :</label>
                    <textarea name="schema_code" rows="5" type="text" class="form-control" placeholder="تایپ کنید...">@if(isset($data->schema_code)){{$data->schema_code}}@endif</textarea>
                </div>

                <div class="form-group col-md-12">
                    <label>انتخاب عکس</label>
                    <input type="file" class="form-control" name="image" id="exampleInputPassword1" placeholder="انتخاب فایل">
                    @if(isset($data->image))
                        <img src="{{asset('assets/uploads/language/'.$data->image)}}" alt="" style = "width: 150px">
                    @endif
                </div>
                <div class="form-group col-md-12">
                    <label>URL :</label>
                    <input name="url" type="text" class="form-control" placeholder="تایپ کنید..."
                           value = "@if(isset($data->url)){{$data->url}}@endif">
                </div>

                <div class="form-group col-md-12">
                    <label>عنوان نمایشی :</label>
                    <input name="title_content" type="text" class="form-control" placeholder="تایپ کنید..."
                           value = "@if(isset($data->title_content)){{$data->title_content}}@endif">
                </div>
                <div class="form-group">
                    <label>توضیحات کوتاه:</label>
                    <textarea name="content" type="text" rows="5" cols="5" class="form-control ckeditor" placeholder="تایپ کنید...">@if(isset($data->content)){!!$data->content!!} @endif
                        </textarea>
                </div>
                <div class="form-group">
                    <label>توضیحات اصلی:</label>
                    <textarea name="content_more" type="text" rows="5" cols="5" class="form-control ckeditor" placeholder="تایپ کنید...">@if(isset($data->content_more)){!!$data->content_more!!} @endif
                            </textarea>
                </div>


                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name='status' value="1" @if(isset($data->status) && $data->status==1)checked="checked"  @endif>
                        <label class="form-check-label"> نمایش در منو </label>
                   </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name='show' value="1" @if(isset($data->show) && $data->show==1)checked="checked"  @endif>
                    <label class="form-check-label"> نمایش در سلکت باکس پنل </label>
                </div>

                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ارسال</button>
                </div>

            </div>
        </div>
    </div>
</section>
