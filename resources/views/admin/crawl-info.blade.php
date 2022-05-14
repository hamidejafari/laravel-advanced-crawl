@extends("layouts.admin.master")
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-10 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">مشخصات کرول</h3>
                    </div>
                    <div class="card-body">
                        @if($setting->crawling == 1)
                            @php
                                $time_all = intval($setting->crawl_end_count) * 3;
                                $time_passed = intval($setting->crawled_count) * 3;
                                $time_now = $time_all - $time_passed;
                                $min_time = round($time_now/60);
                                $hour_time = round($min_time/60);
                            @endphp
                            <h3 style="text-align: center;">تعداد ریپرتاژ هایی که باید کرول بشود : {{$setting->crawl_end_count}} عدد</h3>
                            <h3 style="text-align: center;">تعداد ریپرتاژ های کرول شده : {{$setting->crawled_count}} عدد</h3>
                            <h4 style="text-align: center;">زمان تقریبی باقی مانده : {{$min_time}}  دقیقه یا {{$hour_time}} ساعت </h4>
                        @else
                            <h3 style="text-align: center;">کرول تمام شده است.</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
