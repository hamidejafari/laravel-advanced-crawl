<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('assets/site/images/favicon.jpg')}}" type="image/x-icon">

    @php $setting_head = \App\Models\Setting::first(); @endphp
    <title>@yield('title',$setting_head->title_seo)</title>

    <!-- Bootstrap, Style, Color CSS -->
    <link rel="stylesheet" href="{{asset('assets/site/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/style.css?v0.07')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/responsive.css?v0.01')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/color.css?v0.02')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/rtl.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/bgimg.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules/bootstrap-icons/font/bootstrap-icons.css')}}">
    <script src="{{asset('assets/site/js/jquery-3.5.1.slim.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/site/css/toastr.css')}}">
    <script src="{{ asset('assets/site/js/toastr.js')}}"></script>
    <!-- Fontawesome js -->
    <script src="{{asset('assets/site/js/fontawesome.js')}}"></script>

    @yield('schema',$setting_head->schema_code)

    @yield('css','')
</head>
