{{csrf_field()}}
<section class="content">
  <div class="container-fluid">
  <div class="col-md-10 mx-auto">
      <div class="card card-primary">
          <div class="card-header">
          <h3 class="card-title">  اضافه کردن رپورتاژ </h3>
          </div>
          <div class="card-body">
              <div class="row col-md-12">
                  @if(isset($data->id))
                      <div class="form-group col-md-6">
                          <label> آیدی  :</label>
                          <input name="id_rep" type="text" disabled class="form-control"
                                 value="{{$data->id}}"/>
                      </div>
                      <div class="form-group col-md-6">
                          <label> دامنه  :</label>
                          <input name="domain" type="text" class="form-control" placeholder="تایپ کنید..."
                                 value="@if(isset($data->domain)){{$data->domain}}@endif"/>
                      </div>

                  @else
                      <div class="form-group col-md-12">
                          <label> دامنه  :</label>
                          <input name="domain" type="text" class="form-control" placeholder="تایپ کنید..."
                                 value="@if(isset($data->domain)){{$data->domain}}@endif"/>
                      </div>

                  @endif

                  <div class="form-group col-md-6">
                      <label>قیمت (دلار) :</label>
                      <input name="price_dollar" type="text" class="form-control" placeholder="قیمت ریپورتاژ بدون سود دلار"
                             value="@if(isset($data->price_dollar)){{$data->price_dollar}}@endif"/>
                  </div>



                  <div class="form-group col-md-6">
                    <label>قیمت (تومان) :</label>
                      @if(isset($data))

                          <div class="row">
                              <div class="col-md-6">
                                  <input name="price" type="text" class="form-control" placeholder="قیمت دلخواه خود خارج از الگورتیم سایت را وارد کنید"
                                         value = "@if(isset($data->price)){{number_format($data->price)}}@endif" disabled />

                              </div>
                              <div class="col-md-6">
                                  <input name="price_change" type="text" class="form-control" placeholder="تغییر قیمت تومان"
                                  />

                              </div>

                          </div>


                      @else
                          <input name="price" type="text" class="form-control" placeholder="قیمت دلخواه خود خارج از الگورتیم سایت را وارد کنید"
                                 value = "@if(isset($data->price)){{number_format($data->price)}}@endif"  />

                      @endif


                </div>

                  <div class="form-group col-md-6">
                      <label>وضعیت</label>
                      <select class="form-control" id="select-state" name="active">
                          <option value="0" @if(isset($data) && $data->active == 0) selected @endif>غیرفعال</option>
                          <option value="1" @if(isset($data) && $data->active == 1) selected @endif>فعال</option>
                      </select>
                  </div>

                  <div class="form-group col-md-6">
                      <label>دلیل غیرفعال بودن:</label>
                      <textarea name="inactive_reason" style="height: 38px;" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->inactive_reason)){{$data->inactive_reason}}@endif</textarea>
                  </div>


                  <div class="form-check col-md-6">
                      <input class="form-check-input" type="checkbox" name="show_in_list" value="1" @if(isset($data->show_in_list) && $data->show_in_list == 1) checked="checked"  @endif>
                      <label class="form-check-label"> نمایش در پنل کاربران </label>
                  </div>

                  <div class="form-check col-md-6">
                      <input class="form-check-input" type="checkbox" name="show_before_login" value="1" @if(isset($data->show_before_login) && $data->show_before_login == 1) checked="checked"  @endif>
                      <label class="form-check-label">  نمایش در صفحه وبسایت </label>
                  </div>

                  <div class="form-group col-md-6">
                      <label>زبان</label>
                      <select class="form-control"  name="language_id">
                          @foreach($lan as $item )
                                  <option value="{{@$item->id}}"
                                          @if(isset($data->language_id))
                                          @if($data->language_id==$item->id) selected @endif
                                      @endif
                                  >{{@$item->title}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <label>کشور</label>
                      <select class="form-control" id="select-state" name="country_id">
                          @foreach($coun as $item )
                                  <option value="{{@$item->id}}"
                                          @if(isset($data->country_id))
                                          @if($data->country_id==$item->id) selected @endif
                                      @endif
                                  >{{@$item->title}}</option>
                          @endforeach
                      </select>
                  </div>






                  <div class="form-group col-md-6">
                      <label>DA</label>
                      <input type="text" name="da" class="form-control"  placeholder="وارد کردن da..."
                             value = "@if(isset($data->da)){{$data->da}}@endif"/>
                  </div>

                  <div class="form-group col-md-6">
                      <label>DR</label>
                      <input type="text" name="dr" class="form-control"  placeholder="وارد کردن dr..."
                             value = "@if(isset($data->dr)){{$data->dr}}@endif"/>
                  </div>


                  <div class="form-group col-md-6">
                      <label>Sort :</label>
                      <input name="sort_number" type="text" class="form-control" placeholder="تایپ کنید..."
                             value="@if(isset($data->sort_number)){{$data->sort_number}}@endif"/>
                  </div>



                  <div class="form-group col-md-6">
                      <label>Related :</label>
                      <input name="related" type="text" class="form-control" placeholder="تایپ کنید..."
                             value="@if(isset($data->related)){{$data->related}}@endif"/>
                  </div>

                  <div class="form-group col-md-6">
                      <label>دسته بندی</label>
                      <select class="form-control" id="select-state" name="category_id2[]" multiple>
                          @foreach($cat as $item)
                              <option value="{{@$item->id}}" @if(isset($data) && in_array($item->id,$data->categories->pluck('id')->toArray())) selected @endif>{{@$item->title}}</option>
                          @endforeach
                      </select>
                  </div>

                  <div class="form-group col-md-6">
                      <label>وضعیت درکی</label>
                      <select class="form-control" name="status_id2[]" multiple>
                          <option value="0">هیچکدام</option>

                      @foreach($status as $item)
                              <option value="{{@$item->id}}" @if(isset($data) && in_array($item->id,$data->statuses->pluck('id')->toArray())) selected @endif>{{@$item->title}}</option>
                          @endforeach
                      </select>
                  </div>



                  <div class="form-group col-md-6">
                      <label>تعداد لینک فالو :</label>
                      <input name="max_doffolow_link" type="text" class="form-control" placeholder="تایپ کنید..."
                             value="@if(isset($data->max_doffolow_link)){{$data->max_doffolow_link}}@endif"/>
                  </div>
                  <div class="form-group col-md-6">
                      <label> تعداد لینک  :</label>
                      <input name="max_total_link" type="text" class="form-control" placeholder="تایپ کنید..."
                             value="@if(isset($data->max_total_link)){{$data->max_total_link}}@endif"/>
                  </div>






                  <!--  <div class="form-group col-md-6">-->
                  <!--  <label>انتخاب عکس</label>-->
                  <!--  <input type="file" class="form-control" name="image" id="exampleInputPassword1" placeholder="انتخاب فایل">-->
                  <!--  @if(isset($data->image))-->
                  <!--  <img src="{{asset('assets/uploads/product/'.$data->image)}}" alt="" style = "width: 150px">-->
                  <!--  @endif-->
                  <!--</div>-->







              <div class="form-group col-md-6">
                  <label>Requirements:</label>
                  <textarea name="requirements" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->requirements)){{$data->requirements}}@endif</textarea>
              </div>

              <div class="form-group col-md-6">
                  <label>Content Requirements:</label>
                  <textarea name="content_requirements" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->content_requirements)){{$data->content_requirements}}@endif</textarea>
              </div>

                  <div class="form-group col-md-12">
                      <label>Contact Info :</label>
                      <textarea name="contact_info" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->contact_info)){{$data->contact_info}}@endif</textarea>
                  </div>




                  <!--<div class="form-check col-md-4">-->
                  <!--    <input class="form-check-input" type="checkbox" name="content_by_media" value="1" @if(isset($data->content_by_media) && $data->content_by_media == 1) checked="checked"  @endif>-->
                  <!--    <label class="form-check-label">  عکس دار بودن</label>-->
                  <!--</div>-->

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
