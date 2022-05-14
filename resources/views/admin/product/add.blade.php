@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\ProductController@postProductAdd')}}" enctype="multipart/form-data"  >
@include('admin.product.form')

</form>
@endsection