@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\SocialController@postSocialEdit' , $data->id)}}" enctype="multipart/form-data"  >
@include('admin.social.form')
</form>
@endsection