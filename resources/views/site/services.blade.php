@extends("layouts.site.master")

@section('content')

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0e2ea1" fill-opacity="1" d="M0,64L60,90.7C120,117,240,171,360,197.3C480,224,600,224,720,192C840,160,960,96,1080,74.7C1200,53,1320,75,1380,85.3L1440,96L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
<div class="content">
	<div class="container-sm container-md container-lg container-xl container-xxl py-2">
		<div class="px-3 list-sd">
			@foreach($row as $service)
			<div class="row">
				<div class="col-xxl-3 col-lg-4 col-sm-6 p-1">
					<a href="{{'/service/'. $service->url}}" class="text-decoration-none">
						<div class="card shadow border-0 position-relative p-1">
							<div class="overlay shadow position-absolute">
								<span class="text-dark">
									{{jdate('Y/m/d',$service->created_at->timestamp)}}
								</span>
							</div>
							<div class="img-box">
								<img src="{{asset('assets/uploads/service/'.$service->image)}}"
									alt="{{$service->iamge_seo}}" class="">
							</div>
							<div class="title-box text-center">
								<h5 class="text-dark my-0">
									{{$service->title}}
								</h5>
							</div>
						</div>
					</a>
				</div>

			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection