@extends("layouts.admin.master")

@section('content')
<form method="post"  action="{{URL::action('Admin\SettingController@postEditSetting' , $data->id)}}" enctype="multipart/form-data"  >
@include('admin.setting.form')
</form>
@endsection