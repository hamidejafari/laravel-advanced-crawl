{{csrf_field()}}


<section class="content">
    <div class="container-fluid">
        <div class="row">
         
        <div class="col-md-10 mx-auto">
                
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> مشاهده پیام </h3>
                    </div>
                    <div class="card-body">
                    <div class="row col-md-12">
                        <div class="form-group col-md-6">
                        <label>نام :</label>
                        <input name="name" type="text" class="form-control" placeholder="تایپ کنید..."
                        value = "@if(isset($data->name)){{$data->name}} @endif" disabled>
                        </div>
                    
                        <div class="form-group col-md-6">
                        <label>ایمیل :</label>
                        <input name="email" type="text" class="form-control" placeholder="تایپ کنید..."
                        value = "@if(isset($data->email)){{$data->email}} @endif" disabled>
                        </div>
                        </div>
                    </div>  
                     
                    <div class="card-body">
                        <div class="form-group">
                        <label>متن پیام :</label>
                        <input name="text" type="text" class="form-control" placeholder="تایپ کنید..."
                        value = "@if(isset($data->text)){{$data->text}} @endif" disabled>
                        </div>
                    </div>
                    <div class="form-check">
                    <input name="status" type="checkbox" class="switchery" checked="checked"
                    value="1" @if(isset($data->status) && $data->status==1)checked="checked"  @endif>
                    فعال
                    </div>
                    <div class="card-footer">
                     <button type="submit" class="btn btn-primary">ارسال</button>
                    </div>
            </div>
        </div>
    </div>
</section>