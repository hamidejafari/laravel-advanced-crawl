@extends("layouts.site.master")

@section('content')

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0e2ea1" fill-opacity="1" d="M0,64L60,90.7C120,117,240,171,360,197.3C480,224,600,224,720,192C840,160,960,96,1080,74.7C1200,53,1320,75,1380,85.3L1440,96L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>
<div class="content">
	<div class="container-sm container-md container-lg container-xl container-xxl py-2">
		<div class="contactus px-3">
			<div class="row">
				<div class="col-lg-6 col-sm-12 border-end p-4">

					<form class="form-floating m-0" method="post" action="{{url('/post/contact-us')}}">
						@csrf
						@include('site.contents.form-contact')
					</form>
				</div>
				<div class="col-lg-6 col-sm-12 border-start social-c p-4">
					@include('site.contents.info-contact')
				</div>
				<div class="col-sm-12 p-4">
{{--					<iframe--}}
{{--						src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12947.860112261504!2d51.3816411!3d35.7762354!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd2c06bece140dc48!2srahweb!5e0!3m2!1sen!2s!4v1562602387043!5m2!1sen!2s"--}}
{{--						style="border:0" allowfullscreen="" width="100%" height="350" frameborder="0">--}}
{{--					</iframe>--}}
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
