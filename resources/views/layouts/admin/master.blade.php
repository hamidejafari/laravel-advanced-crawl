<!DOCTYPE html>
<html>
@include('layouts.admin.blocks.head')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.admin.blocks.navbar')
        @include('layouts.admin.blocks.sidebar')
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">

                    </div>
                </div>
            </div>
            <section class="content">
                @yield('content')
            </section>
        </div>
        @include('layouts.admin.blocks.footer')
    </div>
    @include('layouts.admin.blocks.script')
    @include('layouts.admin.blocks.message')

</body>

</html>
