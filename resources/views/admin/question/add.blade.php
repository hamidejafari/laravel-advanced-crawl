@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\ContentController@postQuestionAdd')}}" enctype="multipart/form-data">
@include('admin.question.form')
</form>
@endsection