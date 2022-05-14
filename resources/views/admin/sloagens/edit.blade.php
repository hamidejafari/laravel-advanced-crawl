@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\ContentController@postSloagensEdit' , $data->id)}}" enctype="multipart/form-data"  >
@include('admin.sloagens.form')
</form>
@endsection