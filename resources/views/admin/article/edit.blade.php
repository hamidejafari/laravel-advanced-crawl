@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\ArticleController@postArticleEdit' , $data->id)}}" enctype="multipart/form-data"  >
@include('admin.article.form')
</form>
@endsection