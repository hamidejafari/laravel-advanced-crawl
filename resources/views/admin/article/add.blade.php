@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\ArticleController@postArticleAdd')}}" enctype="multipart/form-data"  >
@include('admin.article.form')
</form>
@endsection