@extends("layouts.site.master")
@section('schema')
    {{$data->schema_code}}
@endsection
@section('title')
    {{$data->title_seo}}
@endsection
@section('content')
    <br>
    <div class="aboutus-home position-relative">
        <img src="{{asset('assets/site/images/bac.png')}}" style="height: 435px;" alt="" class="w-100">
        <div class="overlay position-absolute top-0 bottom-0 end-0 start-0 d-flex align-items-end py-3">
            <div class="container-sm container-md container-lg container-xl container-xxl">
                <div class="row">
                    <div class="col-md-6 col-sm-12 align-self-center text-center p-xl-4 p-lg-3 p-md-2 p-sm-1">
                        <div class="caption">
                            <h4 class="text-custom text-center my-3">
                                {{@$data->title_content}}
                            </h4>
                            <p class="">
                               {!! @$data->content !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 align-self-center text-center p-xl-4 p-lg-3 p-md-2 p-sm-1">
                        @if($type== 'country')
                            <img src="{{ $data->image ? asset('assets/uploads/country/'.$data->image) : asset('assets/notFound.jpg')}}" alt="" class="w-75">
                        @else
                            <img src="{{ $data->image ? asset('assets/uploads/language/'.$data->image) : asset('assets/notFound.jpg')}}" alt="" class="w-75">

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container-sm container-md container-lg container-xl container-xxl">
        <div class="row px-4">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-8 col-sm-12 p-2">
                <h4 class="text-custom-danger fw-bolder my-1">
                    لیست رپورتاژهای {{$data->title}}
                </h4>
                <hr class="my-2">
                <div
                    class="table-br table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
                    <table class="table table-striped">
                        <thead class="table table-light">
                        <tr>
                            <th scope="col" class="text-center">
                                نام سایت
                            </th>
                            @if($type== 'country')
                                <th scope="col" class="text-center">
                                    زبان
                                </th>
                            @else
                                <th scope="col" class="text-center">
                                    کشور
                                </th>
                            @endif


                            <th scope="col" class="text-center">
                                DA
                            </th>
                            <th scope="col" class="text-center">
                                موضوع
                            </th>
                            <th scope="col" class="text-center">
                                مبلغ (تومان)
                            </th>
                        </tr>
                        </thead>
                        <tbody class="position-relative">
                            @foreach(@$data->products->where('show_before_login',1)->take(10) as $row)
                                <tr>
                                    <th scope="row" class="text-center">
                                        @php
                                            $domain = explode('.',$row->domain);
                                            $star_string = "";
                                            for ($i = 1; $i <= strlen($domain[0]) / 2; $i++){
                                                $star_string = $star_string.'*';
                                            }
                                        @endphp

                                        <a href="">{{substr_replace($domain[0], $star_string, strlen($domain[0]) / 2, -1).'.'.$domain[1]}}</a>
                                    </th>
                                    @if($type== 'country')
                                        <td class="text-center">
                                            {{@$row->language->title}}
                                        </td>
                                    @else
                                        <td class="text-center">
                                            {{@$row->country->title}}
                                        </td>
                                    @endif
                                    <td class="text-center">
                                        {{$row->da}}
                                    </td>
                                    <td class="text-center">
                                       @foreach($row->categories as $item)
                                {{@$item->title}}
                                <br>
                                @endforeach
                                    </td>
                                    <td class="text-center">
                                        {{number_format(intval($row->price))}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{route('site.panel.dashboard')}}" class="my-3 btn btn-lg btn-custom-danger float-end">
                    مشاهده همه
                </a>
            </div>
        </div>


        <h3 style="text-align: center;">
            خرید بک لینک از سایت های {{$data->title}}
        </h3>
        <p>
            {!! $data->content_more !!}
        </p>




  <!--      <div class="px-4 py-5">-->
		<!--	<div class="bg-light comment py-5">-->
  <!--          	<div class="col-xxl-6 mx-auto">-->
  <!--          		<h4 class="text-custom-danger fw-bolder my-1">-->
  <!--          			ارسال نظرات-->
  <!--          		</h4>-->
  <!--          		<hr class="my-2">-->
  <!--                  <form action="" class="m-0">-->
  <!--                  	<div class="form-floating mb-3">-->
  <!--                  		<input type="text" class="form-control bg-transparent rounded-pill" id="floatingPassword" placeholder="Password">-->
  <!--                  		<label for="floatingPassword" class="text-secondary">نام * :</label>-->
  <!--                  	</div>-->
  <!--                  	<div class="form-floating mb-3">-->
  <!--                  		<input type="email" class="form-control bg-transparent rounded-pill" id="floatingInput" placeholder="name@example.com">-->
  <!--                  		<label for="floatingInput" class="text-secondary">ایمیل * :</label>-->
  <!--                  	</div>-->
  <!--                  	<div class="form-floating mb-3">-->
  <!--                  		<textarea class="form-control bg-transparent rounded-3" placeholder="Leave a comment here" id="floatingTextarea2"-->
  <!--                  			style="height: 140px"></textarea>-->
  <!--                  		<label for="floatingTextarea2" class="text-secondary">نظرات خود را بنویسید-->
  <!--                  			:</label>-->
  <!--                  	</div>-->
  <!--                  		   <div style="margin-right: 10%;">-->
  <!--                          {!! app('captcha')->display($attributes = [], $options = ['lang'=> 'fa']) !!}-->
  <!--                      </div>-->
  <!--                  	<div class="form-floating text-end">-->
  <!--                  		<button type="submit" class="btn btn-lg btn-custom-danger">-->
  <!--                  			ارسال نظر-->
  <!--                  		</button>-->
  <!--                  	</div>-->
  <!--                  </form>-->
  <!--          	</div>-->
  <!--          </div>-->
		<!--</div>-->
    </div>


@endsection

