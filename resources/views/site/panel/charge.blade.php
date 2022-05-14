@extends("site.panel.master")
@section('content')
    <div class="border charge p-4 mb-0">
        <h4 class="text-custom text-center mb-4">
            افزایش اعتبار
        </h4>
        <div class="row w-100 m-0">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-sm-12 mx-auto p-2">
                <div class="card border-0 p-2">
                    <p style="text-align: center;font-size: 22px;color: green;">مبلغ اعتبار :{{number_format(auth()->user()->wallet) . ' تومان '}}‌</p>
                    <form method="post" action="{{route('charge-bank')}}" class="m-0">
                        {{csrf_field()}}
                        <div class="row w-100 m-0">
                            <div class="col-xl-4 col-lg-6 mx-auto p-1">
                                <div class="form-group m-0">
                                    <label for="charge" class="form-label text-secondary">مبلغ شارژ (تومان) :</label>
                                    <input type="text" class="form-control form-control-lg" id="charge" name="charge_price" placeholder="مثلا : ۱۰۰۰۰">
                                </div>
                            </div>
                        </div>
                        <div class="row w-100 m-0">
                            <div class="col-xl-4 col-lg-6 mx-auto p-1">
                                <button type="submit" class="btn btn-custom-danger rounded-3 d-flex align-items-center justify-content-center w-100">
                                    <i class="fas fa-plus-circle me-2"></i>
                                    افزایش اعتبار
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
