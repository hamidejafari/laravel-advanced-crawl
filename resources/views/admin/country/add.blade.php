@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\CountryController@postCountryAdd')}}" enctype="multipart/form-data">
@include('admin.country.form')
</form>
@endsection