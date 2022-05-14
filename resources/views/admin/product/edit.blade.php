@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\ProductController@postProductEdit' , $data->id)}}" enctype="multipart/form-data"  >
@include('admin.product.form')
</form>
@endsection