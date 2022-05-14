
@if(isset($errors))
    @if($errors->any() || Session::has('error'))
        @if(Session::has('error'))


            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {!!Session::get('error')!!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        @endif
        @if(isset($errors))
            @foreach($errors->all() as $error )

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {!! $error !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            @endforeach
        @endif
    @endif
@endif

@if(Session::has('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!!Session::get('success')!!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@endif
@if(isset($success))


    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!!$success!!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>


@endif

@if(Session::has('info'))


    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {!!Session::get('info')!!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>


@endif
