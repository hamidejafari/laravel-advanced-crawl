{{csrf_field()}}


<section class="content">
    <div class="container-fluid">
    <div class="col-md-10 mx-auto">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title"> تنظیمات سایت </h3>
                </div>
            <div class="card-body">
                 <div class="row col-md-12">
                    <div class="form-group col-md-6">
                    <label>نام :</label>
                    <input name="title" type="text" class="form-control" placeholder="تایپ کنید..."
                    value = "@if(isset($data->title)){{$data->title}}@endif">
                    </div>

                    <div class="form-group col-md-6">
                    <label> لوگو</label>
                    <input type="file" class="form-control" name="logo" id="exampleInputPassword1" placeholder="انتخاب فایل">
                    @if(isset($data->logo))
                    <img src="{{asset('assets/uploads/setting/'.$data->logo)}}" alt="" style = "width: 150px">
                    @endif
                    </div>
                    <div class="form-group col-md-6">
                    <label>فوآیکون </label>
                    <input type="file" class="form-control" name="favicon" id="exampleInputPassword1" placeholder="انتخاب فایل">
                    @if(isset($data->favicon))
                    <img src="{{asset('assets/uploads/setting/'.$data->favicon)}}" alt="" style = "width: 150px">
                    @endif
                    </div>

                    <div class="form-group col-md-6">
                    <label>ایمیل :</label>
                    <input name="email" type="text" class="form-control" placeholder="تایپ کنید..."value ="@if(isset($data->email)){{$data->email}}@endif">
                    </div>



                    <div class="form-group col-md-6">
                    <label>شماره تماس :</label>
                    <input name="phone" type="text" class="form-control" placeholder="تایپ کنید..."value ="@if(isset($data->phone)){{$data->phone}}@endif">
                    </div>

                    <div class="form-group col-md-6">
                    <label>شماره تماس :</label>
                    <input name="phone2" type="text" class="form-control" placeholder="تایپ کنید..."value ="@if(isset($data->phone2)){{$data->phone2}}@endif">
                    </div>

                    <div class="form-group col-md-6">
                    <label>نام سئو :</label>
                    <input name="title_seo" type="text" class="form-control" placeholder="تایپ کنید..."value ="@if(isset($data->title_seo)){{$data->title_seo}}@endif">
                    </div>
                    <div class="form-group col-md-6">
                    <label>  انتخاب عکس درباره ما</label>
                    <input type="file" class="form-control" name="aboutimg" id="exampleInputPassword1" placeholder="انتخاب فایل">
                    @if(isset($data->aboutimg))
                    <img src="{{asset('assets/uploads/setting/'.$data->aboutimg)}}" alt="" style = "width: 150px">
                    @endif
                    </div>

                     <div class="form-group col-md-6">
                         <label>حداقل قیمت نمایش رپورتاژ :</label>
                         <input name="price_limit" type="text" class="form-control" placeholder="تایپ کنید..."value ="@if(isset($data->price_limit)){{$data->price_limit}}@endif">
                     </div>

                     <div class="form-group col-md-6">
                         <label>حداکثر قیمت نمایش رپورتاژ :</label>
                         <input name="price_max_limit" type="text" class="form-control" placeholder="تایپ کنید..." value ="@if(isset($data->price_max_limit)){{$data->price_max_limit}}@endif">
                     </div>


                 </div>
                <div calss="row col-md-12">

 <div class="form-group">
                    <label>عنوان درباره ما صفحه اول :</label>
                    <input name="about_us_title" type="text" class="form-control" placeholder="تایپ کنید..."value ="@if(isset($data->about_us_title)){{$data->about_us_title}}@endif">
                    </div>

                     <div class="form-group">
                    <label>درباره ما صفحه اول:</label>
                    <textarea name="about_us_first" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->about_us_first)){{$data->about_us_first}}@endif</textarea>
                    </div>


                    <div class="form-group">
                    <label>متن درباره ما:</label>
                    <textarea name="aboutus" type="text" rows="5" cols="5" class="form-control ckeditor" placeholder="تایپ کنید...">@if(isset($data->aboutus)){!!$data->aboutus!!}@endif</textarea>
                    </div>

 <div class="form-group">
                    <label>عنوان تصویر صفحه اول:</label>
                    <textarea name="slider_title" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->slider_title)){{$data->slider_title}}@endif</textarea>
                    </div>
                     <div class="form-group">
                    <label>متن تصویر صفحه اول:</label>
                    <textarea name="slider_description" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->slider_description)){{$data->slider_description}}@endif</textarea>
                    </div>
                     <div class="form-group">
                    <label>متن دکمه تصویر صفحه اول:</label>
                    <textarea name="slider_button" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->slider_button)){{$data->slider_button}}@endif</textarea>
                    </div>
                     <div class="form-group">
                    <label>لینک تصویر صفحه اول:</label>
                    <textarea name="slider_link" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->slider_link)){{$data->slider_link}}@endif</textarea>
                    </div>
<div class="form-group">
                    <label>ای نماد:</label>
                    <textarea name="enamad" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->enamad)){{$data->enamad}}@endif</textarea>
                    </div>

                    <div class="form-group">
                    <label>آدرس:</label>
                    <textarea name="address" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->address)){{$data->address}}@endif</textarea>
                    </div>

                    <div class="form-group">
                    <label>قوانین:</label>
                    <textarea name="rules" type="text"  cols="5" class="form-control ckeditor" placeholder="تایپ کنید...">@if(isset($data->rules)){!!$data->rules!!}@endif</textarea>
                    </div>

                    <div class="form-group">
                    <label>نقشه:</label>
                    <textarea name="maps" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->maps)){{$data->maps}}@endif</textarea>
                    </div>


                    <div class="form-group">
                    <label>متن سئو:</label>
                    <textarea name="description_seo" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->description_seo)){{$data->description_seo}}@endif</textarea>
                    </div>

                    <div class="form-group">
                        <label>Schema Codes :</label>
                        <textarea name="schema_code" rows="5" type="text" class="form-control" placeholder="تایپ کنید...">@if(isset($data->schema_code)){{$data->schema_code}}@endif</textarea>
                    </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name='req' value="1" @if(isset($data->req) && $data->req==1)checked="checked"  @endif>
                        <label class="form-check-label"> نمایش فرم درخواست </label>
                   </div>
                   <div class="form-check">
                        <input class="form-check-input" type="checkbox" name='faq' value="1" @if(isset($data->faq) && $data->faq==1)checked="checked"  @endif>
                        <label class="form-check-label"> نمایش سوالات متداول </label>
                   </div>
                   <div class="form-check">
                        <input class="form-check-input" type="checkbox" name='blog' value="1" @if(isset($data->faq) && $data->blog==1)checked="checked"  @endif>
                        <label class="form-check-label"> نمایش بلاگ </label>
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
