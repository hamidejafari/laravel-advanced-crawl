@if($setting_header->blog == 1)
<div class="article-home pt-4">
	<div class="container-sm container-md container-lg container-xl container-xxl">
		<h3 class="fw-bolder text-custom text-center py-3">
			وبلاگ لندیپر
		</h3>
		<div class="row">
		@foreach($articles as $row)
			<div class="col-lg-4 col-sm-6 mx-md-0 mx-sm-auto p-3">
				<a href="{{url('/blog/'. $row->url)}}" class="text-decoration-none text-dark">
					<div class="bg-light p-3">
						<!--<img src="{{asset('assets/uploads/content/article/'. $row->image)}}"  alt="" class="w-100">-->
						<h4 class="text-start fw-bolder my-1">
    						{{$row->title}}
    					</h4>
    					<div class="text-secondary text-justify p">
    					              {!! \Illuminate\Support\Str::limit($row->short_text,200) !!}
    					   </div>
					</div>
				</a>
			</div>
		@endforeach
		</div>
	</div>
</div>
@endif