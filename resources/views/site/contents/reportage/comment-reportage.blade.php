<div class="bg-light comment py-5">
	<div class="col-xxl-6 mx-auto">
		<h4 class="text-custom-danger fw-bolder my-1">
			ارسال نظرات
		</h4>
		<hr class="my-2">
		@include('site.contents.reportage.form-comment')
	</div>
	<div class="col-xxl-8 mx-auto">
		<h4 class="text-custom-danger fw-bolder my-1">
			نظرات کاربران
		</h4>
		<hr class="my-2">
		<div class="reviews">
			<div class="card my-2">
				<!-- start comment -->
				@include('site.contents.reportage.comment')
				<!-- end comment -->
				
			</div>
		</div>
	</div>
</div>