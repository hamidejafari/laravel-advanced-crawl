<div class="d-xs-none d-sm-none d-md-block">
	<div class="menu newmenu bg-white shadow-sm">
		<div class="container container-sm container-md container-lg container-xl container-xxl h-100">
			<div class="h-100">
				<nav class="navbar navbar-expand-lg navbar-light h-100">
					<div class="container-fluid">
						<a class="navbar-brand" href="/">
                            <img src="{{asset('assets/site/images/logo.png')}}" alt="" class="w-100">
						</a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
							data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
							aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNav">
							<ul class="navbar-nav me-auto ul-meg">
								<li class="nav-item">
									<a class="nav-link text-custom fw-bold a-dr" aria-current="page" href="/">
										خانه
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-custom fw-bold a-dr dropdown-toggle" href="">
										رپورتاژ بین المللی
									</a>
									<div class="derop">
										<div class="d-flex align-items-start">
											<div class="nav flex-column nav-pills me-3" id="v-pills-tab"
												role="tablist" aria-orientation="vertical">
												<a class="nav-link mb-2 active" id="v-pills-home-tab"
													data-bs-toggle="pill" href="#v-pills-home" role="tab"
													aria-controls="v-pills-home" aria-selected="true">
													کشورها
													<i class="fas fa-angle-left float-end"></i>
												</a>
												<a class="nav-link mb-2" id="v-pills-profile-tab"
													data-bs-toggle="pill" href="#v-pills-profile"
													role="tab" aria-controls="v-pills-profile"
													aria-selected="false">
													زبان ها
													<i class="fas fa-angle-left float-end"></i>
												</a>
											</div>
											<div class="tab-content" id="v-pills-tabContent">
												<div class="tab-pane fade show active" id="v-pills-home"
													role="tabpanel" aria-labelledby="v-pills-home-tab">
													<div class="w-100 p-1">
														<h5 class="px-1">
															<i class="fas fa-caret-left me-2"></i>
															کشورها
														</h5>
														<hr class="my-2">
														<div class="row w-100 m-0">
                                                            @foreach ($countries2->chunk(5) as $key=>$chunk)
                                                                <div class="col-md-4 p-1">
                                                                    <ul class="px-0 m-0">
                                                                        @foreach ($chunk as $row)
                                                                            <li class="list-unstyled py-1">
                                                                                <a href="{{url('/'.$row->url)}}" class="text-decoration-none text-secondary">
                                                                                    <i class="fas fa-caret-left me-2"></i>
                                                                                     خرید رپورتاژ از سایت های کشور {{$row->title}}
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endforeach
														</div>
													</div>
												</div>
												<div class="tab-pane fade" id="v-pills-profile"
													role="tabpanel" aria-labelledby="v-pills-profile-tab">
													<div class="w-100 p-1">
														<h5 class="px-1">
															<i class="fas fa-caret-left me-2"></i>
															زبان ها
														</h5>
														<hr class="my-2">
														<div class="row w-100 m-0">
															@foreach ($languages2->chunk(5) as $key=>$chunk)
                                                                <div class="col-md-4 p-1">
                                                                    <ul class="px-0 m-0">
                                                                        @foreach ($chunk as $row)
                                                                            <li class="list-unstyled py-1">
                                                                                <a href="{{url('/'.$row->url)}}" class="text-decoration-none text-secondary">
                                                                                    <i class="fas fa-caret-left me-2"></i>
                                                                                    خرید رپورتاژ  {{$row->title}}
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endforeach
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</li>
                                <!--<li class="nav-item">-->
                                <!--    <a class="nav-link text-custom fw-bold a-dr dropdown-toggle" href="">-->
                                <!--       خدمات-->
                                <!--    </a>-->
                                <!--    <div class="derop">-->
                                <!--        <div class="w-100 p-1">-->
                                <!--            <h5 class="px-1">-->
                                <!--                <i class="fas fa-caret-left me-2"></i>-->
                                <!--                خدمات لندیپر-->
                                <!--            </h5>-->
                                <!--            <hr class="my-2">-->
                                <!--            <div class="row w-100 m-0">-->
                                <!--                @foreach ($service2->chunk(5) as $key=>$chunk)-->
                                <!--                    <div class="col-md-4 p-1">-->
                                <!--                        <ul class="px-0 m-0">-->
                                <!--                            @foreach ($chunk as $row)-->
                                <!--                                <li class="list-unstyled py-1">-->
                                <!--                                    <a href="{{'/service/'. $row->url}}" class="text-decoration-none text-secondary">-->
                                <!--                                        <i class="fas fa-caret-left me-2"></i>-->
                                <!--                                         {{$row->title}}-->
                                <!--                                    </a>-->
                                <!--                                </li>-->
                                <!--                            @endforeach-->
                                <!--                        </ul>-->
                                <!--                    </div>-->
                                <!--                @endforeach-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</li>-->


                                <li class="nav-item">
									<a class="nav-link text-custom fw-bold a-dr" href="{{url('/contact-us')}}">
										تماس با ما
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link text-custom fw-bold a-dr" href="{{url('/about-us')}}">
										درباره ما
									</a>
								</li>
							</ul>

							<ul class="navbar-nav auth-nav ms-auto">
                                @php
                                    $user = \Illuminate\Support\Facades\Auth::user();
                                    @endphp
                                @if(!$user)
                                   <li class="nav-item">
                                       <a class="nav-link text-custom fw-bold d-grid text-center" href="{{url('/login2')}}">
                                           <i class="fas fa-unlock text-custom-danger"></i>
                                           <!-- <i class="bi bi-unlock text-custom-danger"></i> -->
                                           ورود
                                       </a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link text-custom fw-bold d-grid text-center" href="{{url('/register2')}}">
                                           <i class="fas fa-user text-custom-danger"></i>
                                           <!-- <i class="bi bi-person text-custom-danger"></i> -->
                                           ثبت نام
                                       </a>
                                   </li>
                                @else
                                   @php
                                       $currentOrder = \App\Models\Order::where('user_id',@$user->id)->currentOrder()->first();
                                       $cartItems = \App\Models\OrderItem::whereOrderId(@$currentOrder->id)->count();
                                   @endphp
                                    <li class="nav-item">
                                        <a href="{{route('site.panel.logout')}}"
                                           class="nav-link text-custom fw-bold d-grid text-center">
                                            <i class="fas fa-power-off text-custom-danger"></i>
                                            <span class="text-custom fw-bolder">
												خروج
											</span>
                                        </a>
                                    </li>
                                   <li class="nav-item">
                                       <a class="nav-link text-custom fw-bold d-grid text-center" href="{{route('site.panel.dashboard')}}">
                                           <i class="fas fa-user text-custom-danger"></i>
                                           <i class="bi bi-person text-custom-danger"></i>
                                           پنل کاربری
                                       </a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link text-custom fw-bold d-grid text-center" href="{{route('site.panel.order.cart')}}">
                                           <i class="fas fa-shopping-cart text-custom-danger"></i>
                                           سبد خرید
                                           ({{$cartItems}})
                                       </a>
                                   </li>
                               @endif
                           </ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="d-xs-block d-sm-block d-md-none">
	<div class="menu bg-white h-auto shadow-sm">
		<div id="mySidenav" class="sidenav bg-custom">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
				<i class="fas fa-times"></i>
			</a>
			<div class="dd">
			    @php
                    $user = \Illuminate\Support\Facades\Auth::user();
                    @endphp
                    @if(!$user)
    				<a href="{{route('site.login')}}" class="px-3 py-2">
    					<i class="fas fa-unlock text-custom-danger me-1"></i>
    					ورود
    				</a>
    				<a href="{{route('site.register')}}" class="px-3 py-2">
    					<i class="fas fa-user text-custom-danger me-1"></i>
    					ثبت نام
    				</a>
    				@else
                    @php
                    $currentOrder = \App\Models\Order::where('user_id',@$user->id)->currentOrder()->first();
                    $cartItems = \App\Models\OrderItem::whereOrderId(@$currentOrder->id)->count();
                    @endphp
                    <a href="{{route('site.register')}}" class="px-3 py-2">
    					<i class="fas fa-user text-custom-danger me-1"></i>
    					پنل کاربری
    				</a>
    				<a href="{{route('site.register')}}" class="px-3 py-2">
    					<i class="fas fa-shopping-cart text-custom-danger me-1"></i>
    					سبد خرید
    				</a>
				@endif
				<a href="/" class="px-3 py-2">
					<i class="fas fa-home me-1"></i>
					خانه
				</a>
				<!--<a href="/" class="px-3 py-2">-->
				<!--	<i class="fas fa-th-large me-1"></i>-->
				<!--	خدمات-->
				<!--</a>-->
				<p class="m-0">
					<a class="px-3 py-2" data-bs-toggle="collapse" href="#reportageExample" role="button"
						aria-expanded="false" aria-controls="reportageExample">
						<i class="fas fa-flag me-1"></i>
						رپورتاژ بین المللی
						<i class="fas fa-angle-down bg-transparent text-white ms-1"></i>
					</a>
				</p>
				<div class="collapse" id="reportageExample">
					<div class="card card-body rounded-0 p-0">
						<div class="accordion" id="accordionExample">
							<div class="accordion-item">
								<h2 class="accordion-header" id="headingOne">
									<button class="accordion-button" type="button" data-bs-toggle="collapse"
										data-bs-target="#collapseOne" aria-expanded="true"
										aria-controls="collapseOne">
										کشور ها
										<i class="fas fa-angle-down ms-1"></i>
									</button>
								</h2>
								<div id="collapseOne" class="accordion-collapse collapse show"
									aria-labelledby="headingOne" data-bs-parent="#accordionExample">
									<div class="accordion-body bg-light">
										<ul class="px-0 m-0">
										    @foreach ($chunk as $row)
											<li class="list-unstyled py-1">
												<a href="{{url('/'.$row->url)}}" class="text-custom">
												    خرید رپورتاژ از سایت های کشور {{$row->title}}
												</a>
											</li>
											@endforeach
										</ul>
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="headingTwo">
									<button class="accordion-button collapsed" type="button"
										data-bs-toggle="collapse" data-bs-target="#collapseTwo"
										aria-expanded="false" aria-controls="collapseTwo">
										زبان ها
										<i class="fas fa-angle-down ms-1"></i>
									</button>
								</h2>
								<div id="collapseTwo" class="accordion-collapse collapse"
									aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
									<div class="accordion-body bg-light">
										<ul class="px-0 m-0">
										    @foreach ($chunk as $row)
											<li class="list-unstyled py-1">
												<a href="{{url('/'.$row->url)}}" class="text-custom">
												    خرید رپورتاژ  {{$row->title}}
												</a>
											</li>
											@endforeach
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<a href="{{url('/about-us')}}" class="px-3 py-2">
					<i class="fas fa-info me-1"></i>
					درباره ما
				</a>
				<a href="{{url('/contact-us')}}" class="px-3 py-2">
					<i class="fas fa-phone me-1"></i>
					تماس باما
				</a>
				<a class="px-3 py-2 m-0 text-white">
					<i class="far fa-calendar-alt me-1"></i>
					یکشنبه - ۲۹ آذر ۱۳۹۹
				</a>
				<a class="px-3 py-2 m-0 text-white">
					<i class="far fa-calendar-alt me-1"></i>
					Sunday - 2020 13 December
				</a>
			</div>
		</div>
		<div class="row w-100 m-0 p-1">
			<div class="col-sm-4 col-xs-4 align-self-center p-1">
				<span class="openbtn" onclick="openNav()">
					<i class="fas fa-bars text-custom"></i>
				</span>
			</div>
			<div class="col-sm-8 col-xs-8 align-self-center text-end p-1">
				<a class="navbar-brand m-0" href="/">
					<img src="{{asset('assets/site/images/logo.png')}}" alt="" class="w-75">
				</a>
			</div>
		</div>
	</div>
</div>
