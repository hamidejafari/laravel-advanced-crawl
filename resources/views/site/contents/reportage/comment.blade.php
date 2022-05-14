<div class="row w-100 m-0">
	<div class="col-sm-1 p-2">
		<img src="assets/site/images/user.png" alt="" class="bg-secondary rounded-circle w-100">
	</div>
	<div class="col-sm-11 p-2">
	@foreach($category->comments as $item)
	@if($item->status==1)
		<div class="text">
			<h5 class="fw-bolder text-custom mt-1 mb-2">
				{{$item->name}}
				<span class="fw-lighter float-end text-custom-danger h6 m-0">
				{{jdate('Y/m/d',$item->created_at->timestamp)}}
				</span>
			</h5>
			<p class="text-secondary my-2">
				{{$item->text}}
			</p>
			<button class="btn btn-reply d-flex align-items-center rounded-pill fw-bolder mb-1"
				data-bs-toggle="modal" data-bs-target="#addcommentModal">
				<i class="fas fa-reply me-2"></i>
				پاسخ
			</button>
			@include('site.contents.reportage.form-reply' , ['parent_id' => $item->id])
		</div>
		<div class="card shadow-sm p-0">
		<div class="row w-100 m-0">
		@foreach($item->replies as $row)
		@if($row->status==1)
			<div class="col-sm-1 p-2">
				<img src="{{asset('assets/site/images/user.png')}}" alt="" class="bg-secondary rounded-circle w-100">
			</div>
		
			<div class="col-sm-11 p-2">
				<div class="text">
					<h5 class="fw-bolder text-custom mt-1 mb-2">
						{{$row->name}}
						<span class="fw-lighter float-end text-custom-danger h6 m-0">
						{{jdate('Y/m/d',$row->created_at->timestamp)}}
						</span>
					</h5>
					<p class="text-secondary my-2">
						{{$row->text}}
					</p>
					<button class="btn btn-reply d-flex align-items-center rounded-pill fw-bolder mb-1"
						data-bs-toggle="modal" data-bs-target="#addcommentModal">
						<i class="fas fa-reply me-2"></i>
						پاسخ
					</button>
					@include('site.contents.reportage.form-reply' , ['parent_id' => $row->id])
				</div>
			</div>
			@endif
			@endforeach
			</div>
			</div>
			@endif
		@endforeach
	</div>
</div>