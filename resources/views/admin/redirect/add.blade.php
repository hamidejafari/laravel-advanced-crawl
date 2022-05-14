@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\RedirectController@postRedirectAdd')}}" enctype="multipart/form-data"  >
@include('admin.redirect.form')
</form>
@endsection