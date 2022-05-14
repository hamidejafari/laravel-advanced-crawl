@extends("site.panel.master")
@section('content')
<div class="border dashboard-search p-4 mb-0">
	<h4 class="text-custom text-center mb-4">
		تیکت جدید
	</h4>
	<div class="row w-50 m-0  " style="margin-right: 24% !important;margin-bottom: 3%;">
		<form method="post" action="{{route('site.panel.tickets.post-create')}}" class="form-floating">
			{{csrf_field()}}

			<div class="row g-2">
				<div class="col-md-12">
					<div class="form-floating">
						<input type="text" class="form-control" id="floatingInputGrid" placeholder="  موضوع تیکت "
							value="" name="subject">
						<label for="floatingInputGrid">
							موضوع تیکت

						</label>
					</div>
				</div>

				<div class="col-md-12">
					<div class="form-floating">
						<textarea class="form-control border-0" name="content" id=""
							placeholder="نوشتن  توضیحات تیکت"
							style="border: 1px solid #ced4da !important;height: 146px;"></textarea>
						<label for="floatingInputGrid">
							توضیحات تیکت

						</label>
					</div>
				</div>


				<div class="col-md-12">
					<div class="form-floating">
						<button type="submit"
							class="btn btn-custom-danger w-50 mx-auto d-flex align-items-center justify-content-center">
							<i class="far fa-check-circle me-2"></i>
							ذخیره
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>

</div>

@endsection
@section('css')
<style>
.chatroom {
	background: #FFF
}

.chatroom .card-chat {
	padding: 1vh 1vh 7vh 1vh;
}

.chatroom .input-box {
	bottom: 0;
	left: 0;
	right: 0;
	background: #ddd;
	height: 6vh;
}

.chatroom .input-box textarea {
	height: 6vh;
}

.chatroom .right-chat {
	margin-left: auto;
	border-radius: 2vh 0 2vh 2vh;
}

.chatroom .left-chat {
	margin-right: auto;
	border-radius: 0 2vh 2vh 2vh;
	text-align: left
}

.chatroom .max-cuntent {
	width: 50%;
	box-shadow: 0 0 5px 0 rgba(0, 0, 0, .15);
	padding: 1.5vh;
}

.chatroom .max-cuntent .smal {
	padding: 1.5vh 0 0 0;
	display: flex;
	font-size: 1.5vh;
}

.chatroom .btn-custom {
	left: 0;
	top: 0;
	bottom: 0;
	margin: 0
}
</style>
@stop