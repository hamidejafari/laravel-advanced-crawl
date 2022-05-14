@extends("layouts.admin.master")

@section('content')
<div class="row">
<div class="col-md-10 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">جدول دسته بندی </h3>

                <div class="card-tools">
                <a href="{{URL::action('Admin\CategoryController@getCategoryAdd')}}" type="button" class="btn btn-primary" >افزودن</a>
                    <a href="{{URL::action('Admin\CategoryController@importAdd')}}" type="button"  class="btn btn-primary" >ایمپورت اکسل</a>


                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>شماره</th>
                    <th>نام</th>
                    <th> دسته </th>
                    <th>وضعیت</th>
                    <th>فعالیت</th>
                  </tr>
                  @foreach($data as $key=>$category)

                  <tr>
                    <td> {{$key+1}} </td>

                    <td>{{$category->title}}</td>

                    <td>{{$category->parent_id ? @$category->parent->title : 'بدون والد'}}</td>

                    <td>{{$category->status ? 'فعال' : 'غیر فعال'}}<span class="badge badge-success"></span></td>
                    <td>
                    <a href="{{URL::action('Admin\CategoryController@getCategoryEdit' , $category->id)}}" type="button" class="btn btn-primary" >ویرایش</a>
                    <a href="{{URL::action('Admin\CategoryController@getCategoryDelete' , $category->id)}}" type="button" class="btn btn-danger" >حذف</a>
                    </td>
                  </tr>
                    @endforeach
                </table>

              </div>
            </div>
          </div>
        </div>

@endsection
