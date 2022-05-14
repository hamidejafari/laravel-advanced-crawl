<footer>
	<div class="bar-footer">
		<img src="{{asset('assets/site/images/barfooter.png')}}" alt="" class="w-100">
	</div>
	<div class="footer bg-custom py-3">
		<div class="container-sm container-md container-lg container-xl container-xxl  px-5">
			<div class="row">
				<div class="col-lg-8 col-sm-12 p-3">
					<div class="row">
						<div class="col-lg-6 col-sm-6 info p-3">
							<h4 class="text-white fw-bolder mb-4">
								اطلاعات تماس
							</h4>
							<ul class="m-0 px-3">
								<li class="list-unstyled">
									<a href="tel:{{$setting_header->phone}}" class="">
										<i class="fas fa-phone-alt text-custom-danger me-2"></i>
										تلفن : {{$setting_header->phone}}
									</a>
								</li>
								<li class="list-unstyled">
									<a href="tel:{{$setting_header->phone2}}" class="">
										<i class="fas fa-phone-alt text-custom-danger me-2"></i>
										تلفن : {{$setting_header->phone2}}
									</a>
								</li>
								@if($setting_header->email !== null)
								<li class="list-unstyled">
									<a href="mailto: {{$setting_header->email}}" class="">
										<i class="fas fa-envelope-open text-custom-danger me-2"></i>
										ایمیل : {{$setting_header->email}}
									</a>
								</li>
								@endif
								@if($setting_header->address !== null)
								<li class="list-unstyled">
									<a href="" class="">
										<i class="fas fa-map-marker-alt text-custom-danger me-2"></i>
										{{$setting_header->address}}
									</a>
								</li>
								@endif
							</ul>
						</div>
						<div class="col-lg-6 col-sm-6 access p-3">
							<h4 class="text-white fw-bolder mb-4">
								دسترسی سریع
							</h4>
							<ul class="m-0 px-3">
								<!--<li class="list-unstyled">-->
								<!--	<a href="{{URL::action('Site\HomeController@getService')}}" class="">-->
								<!--		<i class="fas fa-circle text-custom-danger me-2"></i>-->
								<!--		خدمات-->
								<!--	</a>-->
								<!--</li>-->

								<li class="list-unstyled">
									<a href="{{url('/panel')}}" class="">
										<i class="fas fa-circle text-custom-danger me-2"></i>
										پنل کاربری
									</a>
								</li>
								<li class="list-unstyled">
									<a href="{{URL::action('Site\HomeController@getContactus')}}" class="">
										<i class="fas fa-circle text-custom-danger me-2"></i>
										تماس با ما
									</a>
								</li>
								<li class="list-unstyled">
									<a href="{{URL::action('Site\HomeController@getAboutus')}}" class="">
										<i class="fas fa-circle text-custom-danger me-2"></i>
										درباره ما
									</a>
								</li>
                                <li class="list-unstyled">
                                    <a href="{{url('rules')}}" class="">
                                        <i class="fas fa-circle text-custom-danger me-2"></i>
                                        قوانین و شرایط استفاده
                                    </a>
                                </li>
								<!--<li class="list-unstyled">-->
								<!--	<a href="{{URL::action('Site\HomeController@getFaq')}}" class="">-->
								<!--		<i class="fas fa-circle text-custom-danger me-2"></i>-->
								<!--		سوالات متداول-->
								<!--	</a>-->
								<!--</li>-->
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-12 text-center p-3">
					<div class="social p-3">
						<h4 class="text-white fw-bolder mb-4">
							اطلاعات تماس
						</h4>
						<ul class="px-0 m-0 text-center">
						@foreach($social_so as $row)
							<li class="list-unstyled d-inline mx-2">
								<a  href="{{$row->address}}" target="_blank" class="text-white text-decoration-none">
									<i class="fab {{$row->image}}"></i>
								</a>
							</li>
						@endforeach
						</ul>
						<div class="row text-center">
							<a referrerpolicy="origin" href="https://trustseal.enamad.ir/?id=150656&amp;Code=GnKswJtFPsMtBVXv2c1x" target="_blank" class="">
								<img  referrerpolicy="origin" src="https://Trustseal.eNamad.ir/logo.aspx?id=150656&amp;Code=GnKswJtFPsMtBVXv2c1x" style="cursor:pointer;
                                    background: white;
                                    border-radius: 10px;
                                    padding: 11px;" id="GnKswJtFPsMtBVXv2c1x"  alt="" class="w-25 mx-auto my-4">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--<div class="f-footer bg-custom-dark py-4">-->
	<!--	<p class="text-custom-danger fw-bolder text-center m-0">-->
	<!--		طراحی و توسعه :-->
	<!--		<a href="https://www.rahweb.ir" target="_blank" rel="noopener noreferrer"-->
	<!--			class="text-custom-danger text-decoration-none fw-bolder">-->
	<!--			ره وب-->
	<!--		</a>-->
	<!--	</p>-->
	<!--</div>-->
</footer>
