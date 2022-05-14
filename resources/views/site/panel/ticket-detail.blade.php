@extends("site.panel.master")
@section('content')
<div class="border dashboard-search p-4 mb-0">
	<h4 class="text-custom mb-4 px-1 d-flex align-items-center justify-content-between">
		جزییات تیکت شماره {{$ticket->id}}
		<a class="btn btn-sm btn-custom-danger rounded-3 m-0" href="{{url('/panel/tickets')}}">
			بازگشت
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
				class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
				<path fill-rule="evenodd"
					d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z" />
			</svg>
		</a>
	</h4>
	<div class="row w-100 m-0">
		<div class="col-xxl-12 col-lg-12 col-sm-12 p-2">
			<div class="well-l chatroom">
				<div class="card card-chat rounded m-auto">
					<form action="{{route('site.panel.ticket.reply')}}" method="post" class="m-0"
						enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="row w-100 m-0" style="padding:1vh 0 2vh">
							<div class="col-sm-12 p-2">
								<div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9 col-sm-10 col-xs-12 p-1 me-auto">
									<div class="bg-light max-cuntent right-chat shadow-sm" style="background:#eee">
										<h5 class="fw-bolder text-custom-danger">
											{{ @$ticket->user->name . ' ' . @$ticket->user->family }}
										</h5>
										<div class="text-secondary text-justify" style="white-space: pre-line;">
											<p class="m-0">
												{{$ticket->content}}
											</p>
										</div>
										<small class="text-secondary smal">
											{{jdate('Y/m/d H:i',$ticket->created_at->timestamp)}}
										</small>
									</div>
								</div>
							</div>
							@foreach($ticket->replies as $row)
							@if($row->user_id == Auth::id())
							<div class="col-sm-12 p-2">
								<div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9 col-sm-10 col-xs-12 p-1 me-auto">
									<div class="bg-light max-cuntent right-chat shadow-sm" style="background:#eee">
										<h5 class="fw-bolder text-custom-danger">
											{{ @$row->user->name . ' ' . @$row->user->family }}
										</h5>
										<div class="text-secondary text-justify" style="white-space: pre-line;">
											<p class="m-0">
												{{$row->content}}
											</p>
										</div>
										<small class="text-secondary smal">
											{{jdate('Y/m/d H:i',$row->created_at->timestamp)}}
										</small>
									</div>
								</div>
							</div>
							@else
							<div class="col-sm-12 p-2">
								<div class="col-xxl-6 col-xl-7 col-lg-8 col-md-9 col-sm-10 col-xs-12 p-1 ms-auto">
									<div class="bg-light max-cuntent left-chat shadow-sm" style="background:#eee">
										<h5 class="fw-bolder text-custom-danger">
											پشتیبانی لندیپر
										</h5>
										<div class="text-secondary text-justify" style="white-space: pre-line;">
											<p class="m-0">
												{{$row->content}}
											</p>
										</div>
										<small class="text-secondary smal">
											{{jdate('Y/m/d H:i',$row->created_at->timestamp)}}
										</small>
									</div>
								</div>
							</div>
							@endif
							@endforeach
						</div>
						<div class="position-absolute input-box">
							<div class="bg-white m-0 rounded-0 border" style="position: relative;">
								<input type="hidden" name="reply_id" value="{{$ticket->id}}" />
								<textarea class="form-control border-0" name="content" id=""
									placeholder="نوشتن پیام"></textarea>
								<input type="submit" value="ارسال" class="btn btn-success rounded-0 px-5"
									style="position: absolute;">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
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
	box-shadow: 0 0 5px 0 rgba(0, 0, 0, .15);
	padding: 1.5vh;
}

.chatroom .max-cuntent .smal {
	padding: 1.5vh 0 0 0;
	display: flex;
	font-size: 1.5vh;
}

.chatroom .btn-success {
	left: 0;
	top: 0;
	bottom: 0;
	margin: 0
}
</style>
@stop