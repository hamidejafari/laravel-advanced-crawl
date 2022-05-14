@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\ContentController@postSloagensAdd')}}" enctype="multipart/form-data">
@include('admin.sloagens.form')
</form>
@endsection