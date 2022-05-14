@if($setting_header->req == 1 && $setting_header->faq == 1 )
<div class="faq-home position-relative">
	<img src="assets/site/images/bac.png" alt="" class="w-100 bg">
	<div class="overlay position-absolute top-0 bottom-0 end-0 start-0 d-flex align-items-center py-3">
		<div class="container-sm container-md container-lg container-xl container-xxl">
			<div class="row">
			    @if($setting_header->req == 1)
				<div class="col-md-5 col-sm-12 text-center p-xl-4 p-lg-3 p-md-2 p-sm-1">
					<h4 class="text-custom fw-bolder my-5">
						فرم ارسال سوال و درخواست
					</h4>
					@include('layouts.site.blocks.content.contact')
				</div>
				@endif
				 @if($setting_header->faq == 1)
				<div class="col-md-6 col-sm-12 text-center ms-auto p-xl-4 p-lg-3 p-md-2 p-sm-1">
					<h4 class="text-custom fw-bolder my-5">
						سوالات متداول
					</h4>
					<div class="accordion" id="accordionExample">
					@foreach($questions as $row)
						<div class="accordion-item">
							<h2 class="accordion-header" id="heading{{$row->id}}">
								<button class="accordion-button collapsed position-relative text-custom"
									type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$row->id}}"
									aria-expanded="true" aria-controls="collapse{{$row->id}}">
									{{$row->question}}
								</button>
							</h2>
							<div id="collapse{{$row->id}}" class="accordion-collapse collapse"
								aria-labelledby="heading{{$row->id}}" data-bs-parent="#accordionExample">
								<div class="accordion-body text-start">
								{{$row->response}}
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endif