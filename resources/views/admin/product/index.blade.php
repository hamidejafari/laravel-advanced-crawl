@extends("layouts.admin.master")

@section('content')
<div class="row">
    <div class="container">
        <div class="card">
          <div class="card-header">
                <h3 class="card-title">جدول رپورتاژ</h3>
                  <div class="card-tools">
                  <a href="{{URL::action('Admin\ProductController@importAdd')}}" type="button"  class="btn btn-primary" >ایمپورت اکسل</a>
{{--                  <a href="{{URL::action('Admin\ProductController@export')}}" type="button"  class="btn btn-primary" >خروجی اکسل</a>--}}
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exportModal">
                          خروجی اکسل
                      </button>
                      <a href="{{URL::action('Admin\ProductController@getProductAdd')}}" type="button"  class="btn btn-primary" >افزودن</a>

                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    جستجو
                    </button>

                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document" style="width: 53%;
max-width: none !important;
margin-top: 6%;">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"> جستجو </h5>
                          </div>
                          <div class="modal-body">

                          <form action="{{URL::current()}}" method="GET">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                              <button type="submit" class="btn btn-primary">جستجو کردن</button>
                              <div class="card-body">
                                  <div class="row col-md-12">
                                      <div class="form-group col-md-6">
                                          <label> آیدی  :</label>
                                          <input name="id_rep" type="text"  class="form-control"
                                                 value=""/>
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label> دامنه  :</label>
                                          <input name="domain" type="text" class="form-control" placeholder="تایپ کنید..."
                                                 value=""/>
                                      </div>


                                      <div class="form-group col-md-6">
                                          <label>قیمت (دلار) از:</label>
                                          <input name="from_price_dollar" type="text" class="form-control" placeholder="قیمت ریپورتاژ بدون سود دلار"
                                                 value=""/>
                                      </div>

                                      <div class="form-group col-md-6">
                                          <label>قیمت (دلار) تا:</label>
                                          <input name="to_price_dollar" type="text" class="form-control" placeholder="قیمت ریپورتاژ بدون سود دلار"
                                                 value=""/>
                                      </div>




                                      <div class="form-group col-md-6">
                                          <label>قیمت (تومان) از:</label>
                                          <input name="from_price" type="text" class="form-control" placeholder="قیمت تومانی رپورتاژ"
                                                 value = ""  />

                                      </div>

                                      <div class="form-group col-md-6">
                                          <label>قیمت (تومان) تا:</label>
                                          <input name="to_price" type="text" class="form-control" placeholder="قیمت تومانی رپورتاژ"
                                                 value = ""  />

                                      </div>


                                      <div class="form-group col-md-6">
                                          <label>وضعیت</label>
                                          <select class="form-control" id="select-state" name="active">
                                              <option value="" selected >هیچکدام</option>
                                              <option value="0" >غیرفعال</option>
                                              <option value="1" >فعال</option>
                                          </select>
                                      </div>

                                      <div class="form-group col-md-6">
                                          <label>دلیل غیرفعال بودن:</label>
                                          <textarea name="inactive_reason" style="height: 38px;" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید..."></textarea>
                                      </div>


                                      <div class="form-check col-md-6">
                                          <input class="form-check-input" type="checkbox" name="show_in_list" value="1" >
                                          <label class="form-check-label"> نمایش در پنل کاربران </label>
                                      </div>

                                      <div class="form-check col-md-6">
                                          <input class="form-check-input" type="checkbox" name="show_before_login" value="1" >
                                          <label class="form-check-label">  نمایش در صفحه وبسایت </label>
                                      </div>

                                      <div class="form-group col-md-6">
                                          <label>زبان</label>
                                          <select class="form-control"  name="language_id[]" multiple>
                                              <option value="" selected>انتخاب کنید</option>
                                              @foreach($lan as $item )
                                                      <option value="{{@$item->id}}"

                                                      >{{@$item->title}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label>کشور</label>
                                          <select class="form-control" id="select-state" name="country_id[]" multiple>
                                              <option value="" selected>انتخاب کنید</option>

                                              @foreach($coun as $item )
                                                      <option value="{{@$item->id}}"
                                                      >{{@$item->title}}</option>
                                              @endforeach
                                          </select>
                                      </div>






                                      <div class="form-group col-md-6">
                                          <label>از DA</label>
                                          <input type="text" name="from_da" class="form-control"  placeholder="وارد کردن da..."
                                                 value = ""/>
                                      </div>

                                      <div class="form-group col-md-6">
                                          <label>تا DA</label>
                                          <input type="text" name="to_da" class="form-control"  placeholder="وارد کردن da..."
                                                 value = ""/>
                                      </div>


                                      <div class="form-group col-md-6">
                                          <label>از DR</label>
                                          <input type="text" name="from_dr" class="form-control"  placeholder="وارد کردن dr..."
                                                 value = ""/>
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label>تا DR</label>
                                          <input type="text" name="to_dr" class="form-control"  placeholder="وارد کردن dr..."
                                                 value = ""/>
                                      </div>


                                      <div class="form-group col-md-6">
                                          <label>از Sort :</label>
                                          <input name="from_sort_number" type="text" class="form-control" placeholder="تایپ کنید..."
                                                 value=""/>
                                      </div>


                                      <div class="form-group col-md-6">
                                          <label> تا Sort :</label>
                                          <input name="to_sort_number" type="text" class="form-control" placeholder="تایپ کنید..."
                                                 value=""/>
                                      </div>



                                      <div class="form-group col-md-12">
                                          <label>Related :</label>
                                          <input name="related" type="text" class="form-control" placeholder="تایپ کنید..."
                                                 value=""/>
                                      </div>

                                      <div class="form-group col-md-6">
                                          <label>دسته بندی</label>
                                          <select class="form-control" id="select-state" name="category_id2[]" multiple>
                                              @foreach($cat as $item)
                                                  <option value="{{@$item->id}}" >{{@$item->title}}</option>
                                              @endforeach
                                          </select>
                                      </div>

                                      <div class="form-group col-md-6">
                                          <label>وضعیت درکی</label>
                                          <select class="form-control" name="status_id2[]" multiple>
                                              <option value="0">هیچکدام</option>

                                              @foreach($status as $item)
                                                  <option value="{{@$item->id}}" >{{@$item->title}}</option>
                                              @endforeach
                                          </select>
                                      </div>



                                      <div class="form-group col-md-6">
                                          <label>از تعداد لینک فالو :</label>
                                          <input name="from_max_doffolow_link" type="text" class="form-control" placeholder="تایپ کنید..."
                                                 value=""/>
                                      </div>

                                      <div class="form-group col-md-6">
                                          <label>تا تعداد لینک فالو :</label>
                                          <input name="to_max_doffolow_link" type="text" class="form-control" placeholder="تایپ کنید..."
                                                 value=""/>
                                      </div>

                                      <div class="form-group col-md-6">
                                          <label> از تعداد لینک  :</label>
                                          <input name="from_max_total_link" type="text" class="form-control" placeholder="تایپ کنید..."
                                                 value=""/>
                                      </div>

                                      <div class="form-group col-md-6">
                                          <label>  تا تعداد لینک  :</label>
                                          <input name="to_max_total_link" type="text" class="form-control" placeholder="تایپ کنید..."
                                                 value=""/>
                                      </div>













                                      <div class="form-group col-md-6">
                                          <label>Requirements:</label>
                                          <textarea name="requirements" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید..."></textarea>
                                      </div>

                                      <div class="form-group col-md-6">
                                          <label>Content Requirements:</label>
                                          <textarea name="content_requirements" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید..."></textarea>
                                      </div>

                                      <div class="form-group col-md-12">
                                          <label>Contact Info :</label>
                                          <textarea name="contact_info" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید..."></textarea>
                                      </div>


                                  </div>
                              </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                            <button type="submit" class="btn btn-primary">جستجو کردن</button>
                          </div>
                        </form>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document" style="width: 53%;
max-width: none !important;
margin-top: 6%;">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle"> خروجی اکسل </h5>
                                  </div>
                                  <div class="modal-body">

                                      <form action="{{URL::action('Admin\ProductController@export')}}" method="GET">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                          <button type="submit" class="btn btn-primary">خروجی گرفتن</button>
                                          <div class="card-body">
                                              <div class="row col-md-12">
                                                  <div class="form-group col-md-6">
                                                      <label> آیدی  :</label>
                                                      <input name="id_rep" type="text"  class="form-control"
                                                             value=""/>
                                                  </div>
                                                  <div class="form-group col-md-6">
                                                      <label> دامنه  :</label>
                                                      <input name="domain" type="text" class="form-control" placeholder="تایپ کنید..."
                                                             value=""/>
                                                  </div>


                                                  <div class="form-group col-md-6">
                                                      <label>قیمت (دلار) از:</label>
                                                      <input name="from_price_dollar" type="text" class="form-control" placeholder="قیمت ریپورتاژ بدون سود دلار"
                                                             value=""/>
                                                  </div>

                                                  <div class="form-group col-md-6">
                                                      <label>قیمت (دلار) تا:</label>
                                                      <input name="to_price_dollar" type="text" class="form-control" placeholder="قیمت ریپورتاژ بدون سود دلار"
                                                             value=""/>
                                                  </div>




                                                  <div class="form-group col-md-6">
                                                      <label>قیمت (تومان) از:</label>
                                                      <input name="from_price" type="text" class="form-control" placeholder="قیمت تومانی رپورتاژ"
                                                             value = ""  />

                                                  </div>

                                                  <div class="form-group col-md-6">
                                                      <label>قیمت (تومان) تا:</label>
                                                      <input name="to_price" type="text" class="form-control" placeholder="قیمت تومانی رپورتاژ"
                                                             value = ""  />

                                                  </div>


                                                  <div class="form-group col-md-6">
                                                      <label>وضعیت</label>
                                                      <select class="form-control" id="select-state" name="active">
                                                          <option value="" selected >هیچکدام</option>
                                                          <option value="0" >غیرفعال</option>
                                                          <option value="1" >فعال</option>
                                                      </select>
                                                  </div>

                                                  <div class="form-group col-md-6">
                                                      <label>دلیل غیرفعال بودن:</label>
                                                      <textarea name="inactive_reason" style="height: 38px;" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید..."></textarea>
                                                  </div>


                                                  <div class="form-check col-md-6">
                                                      <input class="form-check-input" type="checkbox" name="show_in_list" value="1" >
                                                      <label class="form-check-label"> نمایش در پنل کاربران </label>
                                                  </div>

                                                  <div class="form-check col-md-6">
                                                      <input class="form-check-input" type="checkbox" name="show_before_login" value="1" >
                                                      <label class="form-check-label">  نمایش در صفحه وبسایت </label>
                                                  </div>

                                                  <div class="form-group col-md-6">
                                                      <label>زبان</label>
                                                      <select class="form-control"  name="language_id">
                                                          <option value="" selected>انتخاب کنید</option>
                                                          @foreach($lan as $item )
                                                              @if($item->status == 1)
                                                                  <option value="{{@$item->id}}"

                                                                  >{{@$item->title}}</option>
                                                              @endif
                                                          @endforeach
                                                      </select>
                                                  </div>
                                                  <div class="form-group col-md-6">
                                                      <label>کشور</label>
                                                      <select class="form-control" id="select-state" name="country_id">
                                                          <option value="" selected>انتخاب کنید</option>

                                                          @foreach($coun as $item )
                                                              @if($item->status == 1)
                                                                  <option value="{{@$item->id}}"
                                                                  >{{@$item->title}}</option>
                                                              @endif
                                                          @endforeach
                                                      </select>
                                                  </div>






                                                  <div class="form-group col-md-6">
                                                      <label>از DA</label>
                                                      <input type="text" name="from_da" class="form-control"  placeholder="وارد کردن da..."
                                                             value = ""/>
                                                  </div>

                                                  <div class="form-group col-md-6">
                                                      <label>تا DA</label>
                                                      <input type="text" name="to_da" class="form-control"  placeholder="وارد کردن da..."
                                                             value = ""/>
                                                  </div>


                                                  <div class="form-group col-md-6">
                                                      <label>از DR</label>
                                                      <input type="text" name="from_dr" class="form-control"  placeholder="وارد کردن dr..."
                                                             value = ""/>
                                                  </div>
                                                  <div class="form-group col-md-6">
                                                      <label>تا DR</label>
                                                      <input type="text" name="to_dr" class="form-control"  placeholder="وارد کردن dr..."
                                                             value = ""/>
                                                  </div>


                                                  <div class="form-group col-md-6">
                                                      <label>از Sort :</label>
                                                      <input name="from_sort_number" type="text" class="form-control" placeholder="تایپ کنید..."
                                                             value=""/>
                                                  </div>


                                                  <div class="form-group col-md-6">
                                                      <label> تا Sort :</label>
                                                      <input name="to_sort_number" type="text" class="form-control" placeholder="تایپ کنید..."
                                                             value=""/>
                                                  </div>



                                                  <div class="form-group col-md-12">
                                                      <label>Related :</label>
                                                      <input name="related" type="text" class="form-control" placeholder="تایپ کنید..."
                                                             value=""/>
                                                  </div>

                                                  <div class="form-group col-md-6">
                                                      <label>دسته بندی</label>
                                                      <select class="form-control" id="select-state" name="category_id2[]" multiple>
                                                          @foreach($cat as $item)
                                                              <option value="{{@$item->id}}" >{{@$item->title}}</option>
                                                          @endforeach
                                                      </select>
                                                  </div>

                                                  <div class="form-group col-md-6">
                                                      <label>وضعیت درکی</label>
                                                      <select class="form-control" name="status_id2[]" multiple>
                                                          <option value="0">هیچکدام</option>

                                                          @foreach($status as $item)
                                                              <option value="{{@$item->id}}" >{{@$item->title}}</option>
                                                          @endforeach
                                                      </select>
                                                  </div>



                                                  <div class="form-group col-md-6">
                                                      <label>از تعداد لینک فالو :</label>
                                                      <input name="from_max_doffolow_link" type="text" class="form-control" placeholder="تایپ کنید..."
                                                             value=""/>
                                                  </div>

                                                  <div class="form-group col-md-6">
                                                      <label>تا تعداد لینک فالو :</label>
                                                      <input name="to_max_doffolow_link" type="text" class="form-control" placeholder="تایپ کنید..."
                                                             value=""/>
                                                  </div>

                                                  <div class="form-group col-md-6">
                                                      <label> از تعداد لینک  :</label>
                                                      <input name="from_max_total_link" type="text" class="form-control" placeholder="تایپ کنید..."
                                                             value=""/>
                                                  </div>

                                                  <div class="form-group col-md-6">
                                                      <label>  تا تعداد لینک  :</label>
                                                      <input name="to_max_total_link" type="text" class="form-control" placeholder="تایپ کنید..."
                                                             value=""/>
                                                  </div>













                                                  <div class="form-group col-md-6">
                                                      <label>Requirements:</label>
                                                      <textarea name="requirements" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید..."></textarea>
                                                  </div>

                                                  <div class="form-group col-md-6">
                                                      <label>Content Requirements:</label>
                                                      <textarea name="content_requirements" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید..."></textarea>
                                                  </div>

                                                  <div class="form-group col-md-12">
                                                      <label>Contact Info :</label>
                                                      <textarea name="contact_info" type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید..."></textarea>
                                                  </div>


                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                                              <button type="submit" class="btn btn-primary">خروجی گرفتن</button>
                                          </div>
                                      </form>
                                  </div>

                              </div>
                          </div>
                      </div>

                  </div>
                <br>



              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>دامنه</th>
                      <th> (تومان) قیمت</th>
                      <th> (دلار) قیمت</th>

                    <th>وضعیت</th>
                    <!--<th>دلیل غیرفعالی</th>-->
                    <!--<th>نمایش در سابت</th>-->
                    <!--<th>نمایش در پنل</th>-->

                      <th>زبان</th>
                      <th>کشور</th>
                      <th>DA</th>
                      <th>DR</th>
                      <!--<th>Related</th>-->
                      <!--<th>Sort</th>-->
                      <th style="width: 117%;">دسته رسانه</th>
                      <th width="100px">وضعیت درکی</th>
                      <!--<th>تعداد لینک فالو</th>-->
                      <!--<th>تعداد لینک ها</th>-->


                      <!--<th>Requirements</th>-->
                      <!--<th>Content Requirements</th>-->
                      <!--<th>Contact Info</th>-->

                      <!--<th>آخرین کرال</th>-->
                      <!--<th>آخرین تغییر قیمت</th>-->
                    <th style="width:174px">عملیات</th>
                  </tr>

                    @foreach($data as $key=>$product)

                    <tr style="font-size: 15px;">
                        <td>{{$product->domain}}</td>
                        <td>{{number_format(intval(@$product->price)) . ' تومان '}}</td>
                        <td>{{@$product->price_dollar . ' دلار '}}</td>
                        <td>{!! $product->active ? '<span class="badge badge-success">فعال</span>' : '<span class="badge badge-danger">غیرفعال</span>' !!}</td>
                        <!--<td>{{$product->inactive_reason ? $product->inactive_reason : '-'}}</td>-->


                        <!--<td>{{ $product->show_in_list ? 'فعال' : 'غیرفعال' }}</td>-->
                        <!--<td>{{ $product->show_before_login ? 'فعال' : 'غیرفعال' }}</td>-->



                        <td>{{@$product->language->title}}</td>
                        <td>{{@$product->country->title}}</td>
                        <td>{{$product->da}}</td>
                        <td>    {{$product->dr !== null ? $product->dr : 'نامشخص'}}</td>
                        <!--<td>{{$product->related}}</td>-->
                        <!--<td>{{$product->sort_number}}</td>-->

                        <td>
                            @php $cat_ids = []; @endphp
                            @foreach($product->categories as $item)
                                @if(!in_array($item->id,$cat_ids))
                                    <span class="badge badge-success" style="background: #84fff9;color:black">
                                {{@$item->title}}
                                    </span>
                                @php $cat_ids[] = $item->id; @endphp
                                @endif
                            @endforeach
                            @php $cat_ids = []; @endphp
                        </td>
                        <td  width="100px">
                            @foreach($product->statuses as $item)
                                <span class="badge badge-success" style="background: {{@$item->color}};color:white;text-align: center">
                                {{@$item->title}}
                                </span>
                                <br>
                            @endforeach
                        </td>

                        <!--<td>-->
                        <!--   {{$product->max_doffolow_link}}-->

                        <!--</td>-->

                        <!--<td>-->
                        <!--    {{$product->max_total_link}}-->

                        <!--</td>-->



                        <!--<td>{{$product->requirements ? $product->requirements : 'ندارد'}}</td>-->
                        <!--<td style="direction: ltr;text-align: left;">{{substr($product->content_requirements, 0, 100) . '...' }}</td>-->
                        <!--<td>{{$product->contact_info ? $product->contact_info : 'ندارد'}}</td>-->

                        <!--<td>{{  $product->crawled_at ? jdate('Y/m/d H:i', DateTime::createFromFormat('Y-m-d H:i:s', $product->crawled_at)->getTimestamp())  : 'ندارد'  }}</td>-->
                        <!--<td>{{  $product->price_updated_at ? jdate('Y/m/d H:i', DateTime::createFromFormat('Y-m-d H:i:s', $product->price_updated_at)->getTimestamp())  : 'ندارد'  }}</td>-->

                        <td>
                        <a href="{{URL::action('Admin\ProductController@getProductEdit' , $product->id)}}" type="button" class="btn btn-primary" >ویرایش</a>
                        <a href="{{URL::action('Admin\ProductController@getProductDelete' , $product->id)}}" type="button" class="btn btn-danger" >حذف</a>
    {{--                    <a href="{{'/product/'. $product->url}}" type="button" class="btn btn-primary" >  مشاهده </a>--}}
    {{--                    <a href="{{URL::action('Admin\ProductController@getProductComment' , $product->id)}}" type="button" class="btn btn-primary" > کامنت ها</a>--}}
                        </td>
                      </tr>
                    @endforeach
                </table>
                <div class="pagii">
                    @if(count($data))
                        {!! $data->appends(Request::except('page'))->render() !!}
                    @endif
                </div>
              </div>
          </div>
      </div>
</div>

@endsection
