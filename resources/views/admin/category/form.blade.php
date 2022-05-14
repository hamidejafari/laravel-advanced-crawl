{{csrf_field()}}
<div class="col-md-10 mx-auto">
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">افزودن دسته بندی</h3>
    </div>
    <form class="form-horizontal">
      <div class="card-body">
        <div class="row col-md-12">
          <div class="form-group col-md-6">
            <label>نام دسته بندی</label>
            <div class="col-sm-12">
              <input type="text" name="title" class="form-control"  placeholder="نام دسته را وارد کنید..."
              value = "@if(isset($data->title)){{$data->title}}@endif">
            </div>
          </div>
            <div class="form-group col-md-6">
                <label>نام های انگلیسی دسته بندی</label>
                <div class="col-sm-12">
                    <input type="text" name="english_titles" class="form-control"  placeholder="نام انگلیسی دسته را وارد کنید..."
                           value = "@if(isset($data->english_titles)){{$data->english_titles}}@endif">
                </div>
                <p>نام دسته هارو با , جدا کنید</p>

            </div>
          <div class="form-group col-md-12">
          <label>دسته</label>
          <select name="parent_id" id="parent_id" class="form-control">
          <option value=""> بدون والد </option>
            @foreach($data as $item )
            <option value="{{@$item->id}}"
            @if(isset($data->parent_id))
            @if($data->parent_id==$item->id) selected @endif
            @endif
            >{{@$item->title}}</option>
            @endforeach
          </select>
          </div>
{{--          <div class="form-group col-md-6">--}}
{{--            <label>URL</label>--}}
{{--            <div class="col-sm-12">--}}
{{--              <input type="text" name="url" class="form-control"  placeholder="نام دسته را وارد کنید..."--}}
{{--              value = "@if(isset($data->url)){{$data->url}}@endif">--}}
{{--            </div>--}}
{{--          </div>--}}
          <!--<div class="form-group col-md-6">-->
          <!--      <label>انتخاب عکس</label>-->
          <!--      <input type="file" class="form-control" name="image" id="exampleInputPassword1" placeholder="انتخاب فایل">-->
          <!--      @if(isset($data->image))-->
          <!--      <img src="{{asset('assets/uploads/product/'.$data->image)}}" alt="" style = "width: 150px">-->
          <!--      @endif-->
          <!--      </div>-->
{{--          <div class="form-group col-md-6">--}}
{{--          <label>نام سئو :</label>--}}
{{--          <input name="title_seo" type="text" class="form-control" placeholder="تایپ کنید..."--}}
{{--          value = "@if(isset($data->title_seo)){{$data->title_seo}}@endif">--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label>متن :</label>--}}
{{--            <textarea name="description" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->description)){{$data->description}}@endif</textarea>--}}
{{--          </div>--}}
{{--          <div class="form-group">--}}
{{--            <label>متن سئو:</label>--}}
{{--            <textarea name="description_seo" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->description_seo)){{$data->description_seo}}@endif</textarea>--}}
{{--          </div>--}}
{{--          <div class="form-check">--}}
{{--          <input name="status" type="checkbox" class="switchery" checked="checked"--}}
{{--            value="1" @if(isset($data->status) && $data->status==1)checked="checked"  @endif>--}}
{{--            فعال--}}
{{--          </div>--}}

      </div>

      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-info">ارسال</button>
      </div>
      <!-- /.card-footer -->
    </form>
</div>
</div>
