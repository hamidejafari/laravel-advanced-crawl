@extends("layouts.admin.master")

@section('content')

 <form method="post"  action="{{URL::action('Admin\ContactController@postContactRead' , $data->id)}}" enctype="multipart/form-data" >
    @include('admin.contact.form')
</form>


@endsection