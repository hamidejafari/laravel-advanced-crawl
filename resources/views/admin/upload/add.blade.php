@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\UploadController@postUploadAdd')}}" enctype="multipart/form-data"  >
@include('admin.upload.form')
</form>
@endsection