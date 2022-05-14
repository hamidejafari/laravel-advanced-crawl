@extends("layouts.admin.master")

@section('content')
<div class="row">
<div class="col-md-10 mx-auto">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">جدول شعار  </h3>

                <div class="card-tools">
                <a href="{{URL::action('Admin\ContentController@getSloagensAdd')}}" type="button" class="btn btn-primary" >افزودن</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
                    <th>شماره</th>
                    <th>عکس شعار</th>
                    <th>نام شعار</th>
                    <th>وضعیت</th>
                    <th>فعالیت</th>
                  </tr>
                  @foreach($data as $key=>$sloagens)
                    
                  <tr>
                    <td>{{$key+1}}</td>
                    <td> 
                    <img src="{{asset('assets/uploads/content/sloagens/'.$sloagens->icon)}}" alt="{{$sloagens->icon}}" style ="width: 50px">
                    </td>
                    <td>{{$sloagens->title}}</td>
                    
                    <td>{{$sloagens->status ? 'فعال' : 'غیر فعال'}}<span class="badge badge-success"></span></td>
                    <td> 
                    <a href="{{URL::action('Admin\ContentController@getSloagensEdit' , $sloagens->id)}}" type="button" class="btn btn-primary" >ویرایش</a>
                    <a href="{{URL::action('Admin\ContentController@getSloagensDelete' , $sloagens->id)}}" type="button" class="btn btn-danger" >حذف</a>
                    </td>
                  </tr>
                    @endforeach
                </table>
                
              </div>
            </div>
          </div>
        </div>

@endsection