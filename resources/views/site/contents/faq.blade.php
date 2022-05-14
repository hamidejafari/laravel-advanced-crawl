<h4 class="text-custom-danger fw-bolder my-1">
	سوالات متداول
</h4>
<hr class="my-2">
@foreach($data as $row)
<div class="accordion accordion-flush" id="accordionFlushExample">
	<div class="accordion-item">
		<h2 class="accordion-header" id="flush-headingOne">
			<button class="accordion-button collapsed text-custom fw-bolder ps-5" type="button"
				data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
				aria-controls="flush-collapseOne">
				{{$row->question}}
			</button>
		</h2>
		<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
			data-bs-parent="#accordionFlushExample">
			<div class="accordion-body">
				{{$row->response}}
			</div>
		</div>
	</div>
@endforeach
</div>