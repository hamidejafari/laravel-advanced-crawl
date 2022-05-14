{{csrf_field()}}


<section class="content">
    <div class="container-fluid">
    <div class="col-md-10 mx-auto">
            <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title"> افزودن  </h3>
                    </div>
            <div class="card-body">
                <div class="row col-md-12">
                        <div class="form-group col-md-6">
                        <label>نام :</label>
                        <input name="title" type="text" class="form-control" placeholder="تایپ کنید..."
                        value = "@if(isset($data->title)){{$data->title}}@endif">
                        </div>
                                
                        <div class="form-group col-md-6">
                        <label> آدرس :</label>
                        <input name="address" type="text" class="form-control" placeholder="تایپ کنید..."
                        value = "@if(isset($data->address)){{$data->address}}@endif">
                        </div>
                    
                        <div class="form-group col-md-6">
                        <label>انتخاب آیکون</label>
                        <input type="text" class="form-control" name="image" id="exampleInputPassword1" placeholder="تایپ کنید"
                        value = "@if(isset($data->image)){{$data->image}}@endif">
                        <br>
                        <h6>برای انتخاب آیکون متن راهنما را داخل باکس قرار دهید</h6>
                        </div>
                      
                        <div class="form-group col-md-6">
                        <p>
							اینستاگرام : <span class="text-custom-danger">fa-instagram</span>
                        </p>
                        <p>
                            توییتر : <span class="text-custom-danger">fa-twitter</span>
                        </p>
                        <p>
                            فیسبوک : <span class="text-custom-danger">fa-facebook-f</span>
                        </p>
                        
                        <p>
                            گوگل پلاس : <span class="text-custom-danger">fa-google-plus-g</span>
                        </p>
                        <p>
                            لینکدین : <span class="text-custom-danger">fa-linkedin-in</span>
						</p>
                        </div>
                </div>
            </div>
                

                
                
                
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
            </div>
        </div>
    </div>
</section>