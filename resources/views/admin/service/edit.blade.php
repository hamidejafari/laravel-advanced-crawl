@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\ServiceController@postServiceEdit' , $data->id)}}" enctype="multipart/form-data"  >
@include('admin.service.form')
</form>
@endsection