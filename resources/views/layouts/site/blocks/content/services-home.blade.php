<div class="services-home text-center position-relative p-5">
	<img src="{{asset('assets/site/images/dotmap.png')}}" alt="" class="w-75 mx-auto bg">
	<div class="overlay position-absolute top-0 bottom-0 end-0 start-0 d-flex align-items-center">
		<div class="container-sm container-md container-lg container-xl container-xxl px-5">
			<h3 class="fw-bolder text-custom text-center mb-5">
				خدمات لندیپر
			</h3>
			<div class="row w-100 m-0 gy-2">
			@foreach($service as $row)
				<div class="col-xl-4 col-md-6 col-sm-6 p-lg-4 p-md-2 p-sm-1">
                    @if($row->url != null && $row->linked == 1)
                        <a href="{{'/service/'. $row->url}}" class="text-decoration-none">
                    @endif
						<div class="bg-white overflow-hidden shadow-sm rounded-3 position-relative p-3">
							<div class="row w-100 m-0">
								<div class="col-sm-9 p-2">
									<h4 class="fw-bolder m-0">
										{{$row->title}}
									</h4>
									<div class="p text-secondary">
										<p class="m-0">
											{{$row->lid}}
										</p>
									</div>
								</div>
								<div class="col-sm-3 col-xs-6 overflow-hidden p-2">
									<img src="{{asset('assets/uploads/service/'.$row->image)}}" alt="لندیپر" class="w-200">
								</div>
							</div>
						</div>
                    @if($row->url != null)
                        </a>
                    @endif
				</div>
			@endforeach
			</div>
		</div>
	</div>
</div>
