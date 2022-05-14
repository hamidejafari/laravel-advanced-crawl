<h4 class="text-custom-danger my-1 fw-bolder">
	فرم ارتباط با لندیپر :
</h4>
<hr class="my-2">

	<div class="form-floating mb-2">
		<input type="text" name="name" class="form-control bg-white shadow-sm" placeholder="">
		<label  class="text-secondary">
			<i class="fas fa-user me-1 text-custom-danger"></i>
			نام و نام خانودگی :
		</label>
	</div>
	<div class="form-floating mb-2">
		<input type="text" name="phone" class="form-control bg-white shadow-sm"  placeholder="">
		<label  class="text-secondary">
			<i class="fas fa-phone me-1 text-custom-danger"></i>
			شماره همراه :
		</label>
	</div>
	<div class="form-floating mb-2">
		<input type="email" name="email" class="form-control bg-white shadow-sm"  placeholder="">
		<label  class="text-secondary">
			<i class="fas fa-envelope me-1 text-custom-danger"></i>
			ایمیل :
		</label>
	</div>
	<div class="form-floating mb-2">
		<div class="form-floating">
			<textarea class="form-control bg-white shadow-sm" type="text"  placeholder="" 
				style="height: 150px"></textarea>
			<label  class="text-secondary">
				<i class="fas fa-comment-alt me-1 text-custom-danger"></i>
				پیام خود را بنویسید :
			</label>
		</div>
	</div>
	   <div style="margin-right: 10%;">
                            {!! app('captcha')->display($attributes = [], $options = ['lang'=> 'fa']) !!}
                        </div>


	<div class="form-floating text-end mb-2">
		<button type="submit" class="btn btn-lg btn-custom-danger shadow-sm">
			<i class="fas fa-paper-plane me-1"></i>
			ارسال پیام
		</button>
	</div>
