@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\UploadController@postUploadEdit' , $data->id)}}" enctype="multipart/form-data"  >
@include('admin.upload.form')
</form>
@endsection