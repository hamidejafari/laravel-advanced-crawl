@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\ArticleController@postArticlecatEdit' , $data->id)}}" enctype="multipart/form-data"  >
@include('admin.articlecat.form')
</form>
@endsection