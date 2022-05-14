<div class="modal fade" id="addcommentModal" tabindex="-1" aria-labelledby="addcommentModalLabel"
				aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="addcommentModalLabel">
								پاسخ به نظر
							</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal"
								aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form action="{{URL::action('Site\HomeController@postReply')}}" method="post" class="m-0">
                            @csrf
                        <input type="hidden" name="commentable_id" value="{{$category->id}}">
                        <input type="hidden" name="commentable_type" value="App\Models\Category">
                        <input type="hidden" name="id" value="{{$parent_id}}">
								<div class="form-floating mb-3">
									<input type="text" name="name" class="form-control bg-transparent rounded-pill"
										id="floatingPassword" placeholder="Password">
									<label for="floatingPassword" class="text-secondary">
										نام * :
									</label>
								</div>
								<div class="form-floating mb-3">
									<input type="email" name="email"class="form-control bg-transparent rounded-pill" id="floatingInput"
										placeholder="name@example.com">
									<label for="floatingInput" class="text-secondary">
										ایمیل * :
									</label>
								</div>
								<div class="form-floating mb-3">
									<textarea name="text" class="form-control bg-transparent rounded-3"
										placeholder="Leave a comment here" id="floatingTextarea2"
										style="height: 140px"></textarea>
									<label for="floatingTextarea2" class="text-secondary">
										نظرات خود را بنویسید :
									</label>
								</div>
								<div class="form-floating text-end">
									<button type="submit" class="btn btn-lg btn-custom-danger">
										ارسال نظر
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>