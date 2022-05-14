<!doctype html>
<html lang="fa">
@include('layouts.site.blocks.head')

<body dir="rtl">

	@include('layouts.site.blocks.menu')
	@if(isset($data))
        <div class="header-in bg-custom d-flex align-items-center">
            <div class="container-sm container-md container-lg container-xl container-xxl">

            </div>
        </div>
    @endif
	<div class="content">
		 @yield('content')
	</div>
	 @include('layouts.site.blocks.footer')
	 @include('layouts.site.blocks.script')
	 @include('layouts.site.blocks.message')
</body>

</html>
