<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/admin/" class="brand-link">

        <span class="brand-text font-weight-light">
        پنل مدیریت
        <img src="{{asset('assets/uploads/setting/'.$setting_header->logo)}}" style = "width: 100px;
        background-color:aliceblue;">
        </span>
    </a>
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="/admin/" class="d-block">
                    {{Auth::User()->name}}
                    </a>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{url('/admin/')}}" class="nav-link">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                               داشبورد
                            </p>
                        </a>
                    </li>

                    @php $ordersCount = \App\Models\Order::where('order_status_id',3)->orWhere('order_status_id',44)->count(); @endphp
                    <li class="nav-item">
                        <a href="{{url('/admin/order')}}" class="nav-link">
                            <i class="nav-icon fa fa-list"></i>
                            <p>
                                سفارشات ({{$ordersCount}})
                            </p>
                        </a>
                    </li>



                    @php $ticketsCount = \App\Models\Ticket::where('status',0)->whereNull('reply_id')->count(); @endphp
                    <li class="nav-item">
                        <a href="{{url('/admin/ticket')}}" class="nav-link">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                تیکت ها ({{$ticketsCount}})
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{url('/admin/user')}}" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                               کاربران سایت
                            </p>
                        </a>
                    </li>



                    <li class="nav-item">
                        <a href="{{url('/admin/transactions')}}" class="nav-link">
                            <i class="nav-icon fa fa-credit-card"></i>
                            <p>
                               تراکنش ها
                            </p>
                        </a>
                    </li>




                    <li class="nav-item">
                        <a href="{{url('/admin/crawl-setting')}}" class="nav-link">
                            <i class="nav-icon fa fa-list-alt"></i>
                            <p>
                                تنظیمات کرول
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/admin/crawl-info')}}" class="nav-link">
                            <i class="nav-icon fa fa-list-alt"></i>
                            <p>
                                مشخصات کرول
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/admin/price-setting')}}" class="nav-link">
                            <i class="nav-icon fa fa-dollar"></i>
                            <p>
                                تنظیمات قیمت
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            <p>
                                رپورتاژ
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/category/" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p> دسته بندی رپورتاژ </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/product/" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p> رپورتاژ </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/language/" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p> زبان </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/country/" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p> کشور </p>
                                </a>
                            </li>
                             <li class="nav-item">
                                <a href="/admin/status/" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p> وضعیت درکی </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-table"></i>
                            <p>
                                محتوا
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <!--<li class="nav-item">-->
                            <!--    <a href="/admin/articlecat/" class="nav-link">-->
                            <!--        <i class="fa fa-circle-o nav-icon"></i>-->
                            <!--        <p> دسته بندی مقاله </p>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <li class="nav-item">
                                <a href="/admin/article/" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p> مقاله </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/uploader/" class="nav-link">
                                    <i class=" fa fa-circle-o nav-icon"></i>
                                    <p> آپلودر </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-pie-chart"></i>
                            <p>
                                تنظیمات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="/admin/setting/edit/" class="nav-link">
                                    <i class="nav-icon fa fa-cogs"></i>
                                    <p>
                                    تنظیمات
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/social/" class="nav-link">
                                    <i class="nav-icon fa fa-share-alt"></i>

                                    <p>
                                    فضای مجازی
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/sitemap/edit/" class="nav-link">
                                    <i class="nav-icon fa fa-map"></i>
                                    <p>
                                    sitemap
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/cropper/" class="nav-link">
                                    <i class="nav-icon fa fa-crop"></i>
                                    <p>
                                    cropper
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">

                                <a href="/admin/redirect" class="nav-link">
                                    <i class="nav-icon fa fa-external-link"></i>
                                    <p>
                                    Redirect
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="/admin/service/" class="nav-link">
                            <i class="nav-icon fa fa-plus-square-o"></i>
                            <p>
                               خدمات
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/question/" class="nav-link">
                            <i class="fa fa-comments-o"></i>
                            <p>
                               سوالات متدوال
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/sloagens/" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                              شعار
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/comment/" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <div class="float-right badge badge-danger position-absolute badgeee">
                                @php $comment =App\Models\Comment::whereread_at(0)->count(); echo$comment; @endphp
                            </div>
                            <i>کامنت ها</i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/contact/" class="nav-link">
                            <i class="nav-icon fa fa-th"></i>
                            <div class="float-right badge badge-danger position-absolute badgeee">
                                @php $contact =App\Models\Contact::whereread_at(0)->count(); echo$contact; @endphp
                            </div>
                            <i>تماس با ما</i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/logout/" class="nav-link">
                            <i class="nav-icon fa fa-sign-out"></i>
                            <p>
                            خروج
                            </p>
                        </a>
                    </li>


                </ul>
            </nav>
        </div>
    </div>
</aside>
