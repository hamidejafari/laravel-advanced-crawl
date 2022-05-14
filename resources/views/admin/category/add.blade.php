@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\CategoryController@postCategoryAdd')}}" enctype="multipart/form-data">
@include('admin.category.form')
</form>
@endsection