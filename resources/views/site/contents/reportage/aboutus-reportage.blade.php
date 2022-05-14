<div class="aboutus-home position-relative">
	<img src="{{asset('assets/site/images/bac.png')}}" alt="" class="w-100">
	<div class="overlay position-absolute top-0 bottom-0 end-0 start-0 d-flex align-items-end py-3">
		<div class="container-sm container-md container-lg container-xl container-xxl">
			<div class="row">
				<div class="col-md-6 col-sm-12 align-self-center text-center p-xl-4 p-lg-3 p-md-2 p-sm-1">
					<div class="caption">
						<h4 class="text-custom text-center my-3">
							{{$category->title}}
						</h4>
						<p class="">
						{{$category->description_seo}}
						</p>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 align-self-center text-center p-xl-4 p-lg-3 p-md-2 p-sm-1">
					<img src="{{asset('assets/uploads/category/' .$category->image)}}" alt="" class="w-75">
				</div>
			</div>
		</div>
	</div>
</div>