@extends("layouts.admin.master")

@section('content')

 <form method="post"  action="{{URL::action('Admin\CommentController@postCommentRead' , $data->id)}}" enctype="multipart/form-data" >
    @include('admin.comment.form')
</form>



@endsection