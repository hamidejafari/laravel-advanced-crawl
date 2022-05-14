@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\RedirectController@postRedirectEdit' , $data->id)}}" enctype="multipart/form-data"  >
@include('admin.redirect.form')
</form>
@endsection