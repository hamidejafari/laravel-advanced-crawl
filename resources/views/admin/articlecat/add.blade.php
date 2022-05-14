@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\ArticleController@postArticlecatAdd')}}" enctype="multipart/form-data"  >
@include('admin.articlecat.form')
</form>
@endsection