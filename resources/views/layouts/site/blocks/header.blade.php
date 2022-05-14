<header class="header">
	<div class="header-img position-relative h-100">
		<img src="assets/site/images/header.png" alt="" class="w-100 h-100">
		<div class="overlay position-absolute top-0 bottom-0 end-0 start-0 d-flex">
			<div class="container container-sm container-md container-lg container-xl container-xxl">
				<div class="row">
					<div class="col-xxl-5 col-xl-6 col-lg-7 col-md-8 col-sm-12 text-center me-auto p-2">
						<h1 class="text-white fw-bolder mb-3">
						{!! $setting_header->slider_title !!}
						</h1>
						<p class="text-custom-danger my-3">
							{!! $setting_header->slider_description !!}
						</p>
						<a href="{!! $setting_header->slider_link !!}" class="btn btn-lg btn-custom-danger px-4 mt-3">
							{!! $setting_header->slider_button !!}
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>