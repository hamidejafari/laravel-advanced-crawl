<form method="post"  action="{{URL::action('Site\HomeController@postContactus')}}" class="m-0">
{{csrf_field()}}
    <div class="form-floating mb-3">
        <input type="text" name="name" class="form-control bg-transparent" id="floatingInput"
            placeholder="نام و نام خانوادگی">
        <label class="text-secondary" for="floatingInput">نام و نام
            خانوادگی</label>
    </div>
    <div class="form-floating mb-3">
        <input type="tel" name="phone" class="form-control bg-transparent" id="floatingPassword"
            placeholder="شماره تماس">
        <label class="text-secondary" for="floatingPassword">شماره تماس</label>
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control bg-transparent" placeholder="متن درخواست"
            id="floatingTextarea2" name="text" style="height:15vh"></textarea>
        <label class="text-secondary" for="floatingTextarea2">متن درخواست</label>
    </div>
    <div class="form-floating text-end">
        <button type="submit" class="btn btn-lg btn-custom-danger rounded-3 px-5">
            ارسال
        </button>
    </div>
</form>