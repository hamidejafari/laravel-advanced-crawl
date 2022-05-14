<h4 class="text-custom-danger fw-bolder my-1">
	خدمات لندیپر
</h4>
<hr class="my-2">
<div class="bg-light border siderep p-0">
	<ul class="px-0 m-0">
	@foreach($row as $service)
		<li class="list-unstyled">
			<a href="{{'/service/'. $service->url}}" class="text-decoration-none text-custom d-flex align-items-center">
				<img src="{{asset('assets/uploads/service/' . $service->image)}}">
				{{$service->title}}
			</a>
		</li>
		<hr class="my-0">
	@endforeach
	</ul>
</div>