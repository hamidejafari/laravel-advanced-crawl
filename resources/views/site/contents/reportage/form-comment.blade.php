<form action="{{URL::action('Site\HomeController@postcomment')}}" method="post" class="m-0">
@csrf
<input type="hidden" name="commentable_id" value="{{$category->id}}">
<input type="hidden" name="commentable_type" value="App\Models\Category">
	<div class="form-floating mb-3">
		<input type="text" name="name" class="form-control bg-transparent rounded-pill" id="floatingPassword" placeholder="Password">
		<label for="floatingPassword" class="text-secondary">نام * :</label>
	</div>
	<div class="form-floating mb-3">
		<input type="email" name="email" class="form-control bg-transparent rounded-pill" id="floatingInput" placeholder="name@example.com">
		<label for="floatingInput" class="text-secondary">ایمیل * :</label>
	</div>
	<div class="form-floating mb-3">
		<textarea class="form-control bg-transparent rounded-3" placeholder="Leave a comment here" id="floatingTextarea2"
			style="height: 140px" name="text"></textarea>
		<label for="floatingTextarea2" class="text-secondary">نظرات خود را بنویسید
			:</label>
	</div>
	<div class="form-floating text-end">
		<button type="submit" class="btn btn-lg btn-custom-danger">
			ارسال نظر
		</button>
	</div>
</form>