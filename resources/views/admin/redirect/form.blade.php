{{csrf_field()}}


<section class="content">
    <div class="container-fluid">
        <div class="row">
         
        <div class="col-md-10 mx-auto">
                
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> افزودن redirect </h3>
                    </div>
                    
                    <div class="card-body">        
                    <div class="form-group">
                        <label> آدرس قدیم :</label>
                        <textarea name="old_address" type="text" rows="3" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->old_address)){{$data->old_address}}@endif</textarea>
                    </div>
                    </div>
                    <div class="card-body">        
                    <div class="form-group">
                        <label> آدرس جدید:</label>
                        <textarea name="new_address" type="text" rows="3" cols="5" class="form-control" placeholder="تایپ کنید...">@if(isset($data->new_address)){{$data->new_address}}@endif</textarea>
                    </div>
                    </div>
                    
                </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">ارسال</button>
                    </div>
                
            </div>
        </div>
    </div>
</section>