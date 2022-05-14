<h4 class="text-custom-danger my-1 fw-bolder">
	راه های ارتباط با لندیپر :
</h4>
<hr class="my-2">
<br>
<ul class="px-0 m-0">
	<li class="list-unstyled">
		<a href="tel:{{$setting_header->phone}}" class="text-decoration-none d-flex align-items-center text-secondary">
			<i class="fas fa-phone"></i>
			<span class="me-2 fw-bolder">
				شماره تماس :
			</span>
			<span class="">
			{{$setting_header->phone}}
			</span>
		</a>
	</li>
	<br>
	<li class="list-unstyled">
		<a href="tel:{{$setting_header->phone2}}" class="text-decoration-none d-flex align-items-center text-secondary">
			<i class="fas fa-phone"></i>
			<span class="me-2 fw-bolder">
				شماره تماس :
			</span>
			<span class="">
			{{$setting_header->phone2}}
			</span>
		</a>
	</li>

    @if($setting_header->email)
	<br>
	<li class="list-unstyled">
		<a href="mailto:info@gmail.com " class="text-decoration-none d-flex align-items-center text-secondary">
			<i class="fas fa-envelope"></i>
			<span class="me-2 fw-bolder">
				ایمیل :
			</span>
			<span class="">
			{{$setting_header->email}}
			</span>
		</a>
	</li>
    @endif

    @if($setting_header->address)


    <br>
	<li class="list-unstyled">
		<a class="text-decoration-none d-flex align-items-center text-secondary">
			<i class="fas fa-map-marker-alt"></i>
			<span class="me-2 fw-bolder">
				آدرس :
			</span>
			<span class="">
			{{$setting_header->address}}
			</span>
		</a>
	</li>
    @endif

    <br>
</ul>
<ul class="px-0 m-0">
@foreach($social_so as $row)
	<li class="float-start list-unstyled">
		<a href="{{$row->address}}" target="_blank" class="text-decoration-none text-custom-danger">
			<i class="fab {{$row->image}}"></i>
		</a>
	</li>
@endforeach

</ul>
