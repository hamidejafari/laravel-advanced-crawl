@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\ContentController@postQuestionEdit' , $data->id)}}" enctype="multipart/form-data"  >
@include('admin.question.form')
</form>
@endsection