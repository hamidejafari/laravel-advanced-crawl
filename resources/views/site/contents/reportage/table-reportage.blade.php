<h4 class="text-custom-danger fw-bolder my-1">
{{$category->title}}
</h4>
<hr class="my-2">
<div
	class="table-br table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl">
	<table class="table table-striped">
		<thead class="table table-light">
			<tr>
				<th scope="col" class="text-center">
					نام سایت
				</th>
				<th scope="col" class="text-center">
					زبان
				</th>
				<th scope="col" class="text-center">
					کشور
				</th>
				<th scope="col" class="text-center">
					DA
				</th>
				<th scope="col" class="text-center">
					موضوع
				</th>
				<th scope="col" class="text-center">
					مبلغ (تومان)
				</th>
			</tr>
		</thead>
		<tbody class="position-relative">
		@foreach($pro as $row)
			<tr>
				<th scope="row" class="text-center">
					{{@$row->title}}
				</th>
				<td class="text-center">
					{{@$row->language->title}}
				</td>
				<td class="text-center">
				{{@$row->country->title}}
				</td>
				<td class="text-center">
				{{@$row->da}}
				</td>
				<td class="text-center">
				{{@$row->subject}}
				</td>
				<td class="text-center">
					{{$row->price}}
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>
<a href="" class="my-3 btn btn-lg btn-custom-danger float-end">
	مشاهده همه
</a>