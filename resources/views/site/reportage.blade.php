@extends("layouts.site.master")

@section('content')

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0e2ea1" fill-opacity="1" d="M0,64L60,90.7C120,117,240,171,360,197.3C480,224,600,224,720,192C840,160,960,96,1080,74.7C1200,53,1320,75,1380,85.3L1440,96L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
<div class="content reportage py-5">
	<div class="container-sm container-md container-lg container-xl container-xxl py-2">

		<div class="row px-4">

			<div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 p-2">

				@include('site.contents.reportage.sidebar-reportage')
			</div>
			<div class="col-xxl-9 col-xl-9 col-lg-9 col-md-8 col-sm-12 p-2">
				@include('site.contents.reportage.table-reportage')
			</div>
		</div>
	</div>
	@include('site.contents.reportage.aboutus-reportage')
	<div class="container-sm container-md container-lg container-xl container-xxl">
		<div class="px-4 py-5">
			@include('site.contents.reportage.comment-reportage')
		</div>
	</div>
</div>
@endsection