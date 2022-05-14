{{csrf_field()}}


<section class="content">
    <div class="container-fluid">
        <div class="row col-md-12">
         
        <div class="col-md-10 mx-auto">
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> افزودن عکس </h3>
              </div>
              
              
                <div class="card-body">
                <div class="col-md-12">
                <div class="form-group col-md-6">
                <label>نام :</label>
                <input name="title" type="text" class="form-control" placeholder="تایپ کنید..."
                value = "@if(isset($data->title)){{$data->title}}@endif">
                  </div>
                  <div class="form-group col-md-6">
                    <label>انتخاب عکس</label>
                    <input type="file" class="form-control" name="image" id="exampleInputPassword1" placeholder="انتخاب فایل">
                    @if(isset($data->image))
                    <img src="{{asset('assets/uploads/upload/'.$data->image)}}" alt="" style = "width: 150px">
                    @endif
                  </div>
                  <div class="form-group col-md-6">
                    <label>URL</label>
                    <input type="tetx" name="url" class="form-control"  placeholder="وارد کردن url..."
                    value = "@if(isset($data->url)){{$data->url}}@endif">
                  </div>
                </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name='status'>
                      <label class="form-check-label"> فعال </label>
                 </div>

                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
              
            </div>
        </div>
    </div>
</section>