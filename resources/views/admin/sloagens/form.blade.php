{{csrf_field()}}


<section class="content">
    <div class="container-fluid">
        <div class="row">

          <div class="col-md-10 mx-auto">

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> افزودن شعار </h3>
              </div>


            <div class="card-body">
            <div class="row col-md-12">
                  <div class="form-group col-md-6">
                    <label>نام </label>
                      <input type="text" name="title" class="form-control"  placeholder="نام شعار را وارد کنید..."
                      value = "@if(isset($data->title)){{$data->title}}@endif">
                  </div>
                  <div class="form-group col-md-6">
                    <label> انتخاب آیکون شعار</label>
                    <input type="file" class="form-control" name="icon" id="exampleInputPassword1" placeholder="انتخاب فایل">
                    @if(isset($data->icon))
				            <img src="{{asset('assets/uploads/content/sloagens/'.$data->icon)}}" alt="" style = "width: 150px">
			            	@endif
                  </div>


                </div>
                  <div class="form-group">
                    <label>متن:</label>
                    <textarea name="description" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->description)){!!$data->description!!}@endif</textarea>
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
