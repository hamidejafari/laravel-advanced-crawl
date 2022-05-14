{{csrf_field()}}


<section class="content">
    <div class="container-fluid">
        <div class="row">
         
            <div class="col-md-12">
                
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> مشاهده پیام </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                        <label>نام :</label>
                        <input name="name" type="text" class="form-control" placeholder="تایپ کنید..."
                        value = "@if(isset($data->name)){{$data->name}} @endif" disabled>
                        </div>
                    </div>  
                    <div class="card-body">
                        <div class="form-group">
                        <label>ایمیل :</label>
                        <input name="email" type="text" class="form-control" placeholder="تایپ کنید..."
                        value = "@if(isset($data->email)){{$data->email}} @endif" disabled>
                        </div>
                    </div>  
                    
                    <div class="card-body">
                        <div class="form-group">
                        <label>تلفن :</label>
                        <input name="phone" type="text" class="form-control" placeholder="تایپ کنید..."
                        value = "@if(isset($data->phone)){{$data->phone}} @endif" disabled>
                        </div>
                    </div> 
                    <div class="card-body">
                        <div class="form-group">
                        <label>موضوع :</label>
                        <input name="subject" type="text" class="form-control" placeholder="تایپ کنید..."
                        value = "@if(isset($data->subject)){{$data->subject}} @endif" disabled>
                        </div>
                    </div> 
                    <div class="card-body">
                        <div class="form-group">
                        <label>متن پیام :</label>
                        <textarea name="description" disabled type="text" rows="5" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->text)){{$data->text}}@endif
                        </textarea>
                    </div>  
                
                    <div class="card-footer">
                     <button type="submit" class="btn btn-primary">ارسال</button>
                    </div>
            </div>
        </div>
    </div>
</section>