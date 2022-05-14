@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\LanguageController@postLanguageEdit' , $data->id)}}" enctype="multipart/form-data"  >
@include('admin.language.form')
</form>
@endsection