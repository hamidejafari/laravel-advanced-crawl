<div class="border dashboard-search p-4 mb-0">
	<h4 class="text-custom text-center mb-4">
		اطلاعات کابری
	</h4>
	<div class="row w-100 m-0">
		<div class="col-md-6 border p-3">
			<h5 class="fw-bolder my-1">
				<i class="fas fa-user me-2 text-custom-danger"></i>
				نام و نام خانوادگی :
			</h5>
			<p class="text-end fw-light my-1">
				نام و نام خانوادگی
			</p>
		</div>
		<div class="col-md-6 border p-3">
			<h5 class="fw-bolder m-0">
				<i class="fas fa-phone me-2 text-custom-danger"></i>
				شماره تماس :
			</h5>
			<p class="text-end fw-light my-1">
				۰۹۱۲۳۴۵۶۷۸۹
			</p>
		</div>
		<div class="col-md-6 border p-3">
			<h5 class="fw-bolder m-0">
				<i class="fas fa-at me-2 text-custom-danger"></i>
				ایمیل :
			</h5>
			<p class="text-end fw-light my-1">
				gmail@gmail.com
			</p>
		</div>
		<div class="col-md-6 border p-3">
			<h5 class="fw-bolder m-0">
				<i class="fas fa-key me-2 text-custom-danger"></i>
				رمز عبور :
			</h5>
			<p class="text-end fw-light my-1">
				******
			</p>
		</div>
		<div class="col-md-6 ms-auto px-0 py-2">
			<!-- Button trigger modal -->
			<button type="button"
				class="btn btn-custom-outline-danger fw-bolder btn-lg d-flex align-items-center ms-auto"
				data-bs-toggle="modal" data-bs-target="#exampleModal">
				<i class="fas fa-user-edit me-2"></i>
				ویرایش پروفایل
			</button>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">ویرایش اطلاعات کاربری</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form class="form-floating">
						<div class="row g-2">
							<div class="col-md-12">
								<div class="form-floating">
									<input type="text" class="form-control" id="floatingInputGrid"
										placeholder="نام و نام خانوادگی" value="نام و نام خانوادگی">
									<label for="floatingInputGrid">
										<i class="fas fa-user me-2 text-custom-danger"></i>
										نام و نام خانوادگی
										<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating">
									<input type="tel" class="form-control" id="floatingInputGrid"
										placeholder="۰۹۱۲۳۴۵۶۷۸۹" value="۰۹۱۲۳۴۵۶۷۸۹">
									<label for="floatingInputGrid">
										<i class="fas fa-phone me-2 text-custom-danger"></i>
										شماره تماس
										<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating">
									<input type="email" class="form-control" id="floatingInputGrid"
										placeholder="gmail@gmail.com" value="gmail@gmail.com">
									<label for="floatingInputGrid">
										<i class="fas fa-at me-2 text-custom-danger"></i>
										آدرس ایمیل
										<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating">
									<input type="password" class="form-control" id="floatingInputGrid"
										placeholder="۱۲۳۴۵۶" value="۱۲۳۴۵۶">
									<label for="floatingInputGrid">
										<i class="fas fa-key me-2 text-custom-danger"></i>
										رمز عبور
										<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating">
									<input type="password" class="form-control" id="floatingInputGrid"
										placeholder="۱۲۳۴۵۶" value="۱۲۳۴۵۶">
									<label for="floatingInputGrid">
										<i class="fas fa-key me-2 text-custom-danger"></i>
										تکرار رمز عبور
										<span class="text-danger">*</span>
									</label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-floating">
									<button type="submit"
										class="btn btn-custom-danger w-100 d-flex align-items-center justify-content-center">
										<i class="far fa-check-circle me-2"></i>
										ثبت اطلاعات
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>