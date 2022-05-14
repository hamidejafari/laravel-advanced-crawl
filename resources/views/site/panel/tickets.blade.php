@extends("site.panel.master")
@section('content')
<div class="border dashboard-search p-4 mb-0">
	<h4 class="text-custom text-center mb-4">
		لیست تیکت ها
	</h4>
	<a class="btn btn-custom-outline-danger fw-bolder d-flex align-items-center ms-auto max-content"
		href="{{url('/panel/tickets/create')}}">
		<i class="fas fa-edit me-2"></i>
		تیکت جدید
	</a>
	<table class="table table-striped m-0">
		<thead>
			<tr>
                <th scope="col" class="text-center text-custom fw-bolder">
                    شماره
                </th>
				<th scope="col" class="text-center text-custom fw-bolder">
					موضوع
				</th>
				<th scope="col" class="text-center text-custom fw-bolder">
                    وضعیت
                </th>
				<th scope="col" class="text-center text-custom fw-bolder">
					تاریخ
				</th>
				<th scope="col" class="text-center text-custom fw-bolder">
					عملیات
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tickets as $row)
			<tr>
                <td class="text-center">
                    {{$row->id}}
                </td>
				<th class="text-center" scope="row">
					{{$row->subject}}
				</th>
				<td class="text-center">
					{{$row->status ? 'پاسخ داده شده' : 'در انتظار پاسخ'}}
				</td>
				<td class="text-center">
					{{jdate('Y/m/d H:i',$row->created_at->timestamp)}}
				</td>
				<td class="text-center">
					<a href="{{route('site.panel.ticket.detail',['id'=>$row->id])}}"
						class="btn btn-custom-danger rounded-3 btn-sm d-flex align-items-center max-content mx-auto">
                        <i class="fas fa-eye me-2"></i>
						نمایش جزییات
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
