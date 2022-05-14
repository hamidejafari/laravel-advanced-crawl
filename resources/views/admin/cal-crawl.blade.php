@extends("layouts.admin.master")
@section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-10 mx-auto">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">محاصبه زمان کرول</h3>
                        </div>
                        <div class="card-body">

                            @php
                                $repors_count = (intval($cal_crawl) * 30) + $last_count;
                                $sec_time = $repors_count * 3;
                                $min_time = round($sec_time/60);
                                $hour_time = round($min_time/60);
                            @endphp

                            <h3 style="text-align: center;">تعداد ریپرتاژ ها : {{$repors_count}} عدد</h3>
                            <h4 style="text-align: center;">زمان تقریبی : {{$min_time}}  دقیقه یا {{$hour_time}} ساعت </h4>

                            <form method="POST" action="{{url('admin/start-crawling')}}">
                                @csrf
                                <input type="hidden" value="{{$repors_count}}" name="count" />
                                <input type="hidden" value="{{$base_url_pass}}" name="url" />
                                <button type="submit" class="btn btn-primary" style="margin-right: 43%;margin-top: 2%;color: white;font-size: 19px;background-color: green;">شروع کرول</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
