@extends("layouts.site.master")

@section('content')

@include('layouts.site.blocks.content')


@endsection

@section('css')
    <style>
        .navbar-expand-lg .navbar-nav .nav-link {
            padding-left: .8rem !important;
            padding-right: .8rem !important;
        }
    </style>
    @stop
