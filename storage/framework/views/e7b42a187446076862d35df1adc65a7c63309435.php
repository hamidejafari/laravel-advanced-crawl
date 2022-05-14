<?php $__env->startSection('content'); ?>
    <div class="dashboard">
        <div class="border dashboard-search p-4 mb-2">
            <?php if(@$order_item_id): ?>
                <h4 class="text-custom text-center mb-4">
                    ویرایش و تغییر رسانه
                </h4>
            <?php endif; ?>
            <form method="get" action="<?php echo e(URL::current()); ?>" class="m-0">
                <input name="search"  value="1" type="hidden" />
                <input type="hidden" name="order_item_id" value="<?php echo e(@$order_item_id); ?>"/>
                <div class="row w-100 m-0">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 p-0">
                        <div class="row w-100 m-0">
                            <div class="col-xxl-4 col-lg-12 col-sm-6 p-1">
                                <label for="" class="text-secondary d-flex align-items-center">
                                    حداقل DA
                                </label>
                                <input type="number" name="da" id="" class="form-control"  placeholder="15" value="<?php echo e($da ? $da : ''); ?>">
                            </div>
                            <div class="col-xxl-4 col-lg-12 col-sm-6 p-1">
                                <label for="" class="text-secondary d-flex align-items-center">
                                    حداقل DR
                                </label>
                                <input type="number" name="dr" id="" class="form-control"  placeholder="0" value="<?php echo e($dr ? $dr : ''); ?>">
                            </div>
                            <div class="col-xxl-4 col-lg-12 col-sm-6 p-1">
                                <label for="" class="text-secondary d-flex align-items-center">
                                    حداکثر قیمت (تومان)
                                </label>
                                <input type="number" name="price" id="" class="form-control"  placeholder="1,000,000" value="<?php echo e($price ? $price : ''); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 p-0 subject sddd">
                        <div class="row w-100 m-0">
                            <div class="col-xxl-4 col-lg-12 col-sm-4 p-1">
                                <div class="position-relative sc">
                                    <div class="position-absolute top-0 end-0 start-0" style="z-index: 99;">
                                        <label for="" class="text-secondary d-flex align-items-center">
                                            انتخاب موضوع
                                        </label>
                                        <button class="btn form-select border select" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse3"
                                                aria-expanded="false" aria-controls="collapse3">
                                            انتخاب کنید
                                        </button>
                                        <div class="collapse border" id="collapse3">
                                            <input type="search" name="" id="" class="form-control rounded-0" placeholder="جستجو"/>
                                            <div class="card card-body p-2">
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="form-check py-1">
                                                        <input class="form-check-input " name="category_id[]" type="checkbox" <?php if($category_id && in_array($row->id,$category_id)): ?> checked <?php endif; ?>  value="<?php echo e($row->id); ?>" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            <?php echo e($row->title); ?>

                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-12 col-sm-4 p-1">
                                <div class="position-relative sc">
                                    <div class="position-absolute top-0 end-0 start-0" style="z-index: 99;">
                                        <label for="" class="text-secondary d-flex align-items-center">
                                            انتخاب کشور
                                        </label>
                                        <button class="btn form-select border select" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse1"
                                                aria-expanded="false" aria-controls="collapse1">
                                            انتخاب کنید
                                        </button>
                                        <div class="collapse border" id="collapse1">
                                            <input type="search" name="" id="" class="form-control rounded-0" placeholder="جستجو"/>
                                            <div class="card card-body border-0 p-2">
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="form-check py-1">
                                                        <input class="form-check-input " name="country_id[]" type="checkbox" <?php if($country_id &&  in_array($row->id,$country_id) ): ?> checked <?php endif; ?>  value="<?php echo e($row->id); ?>" id="flexCheckDefault3">
                                                        <label class="form-check-label" for="flexCheckDefault3">
                                                            <?php echo e($row->title); ?>

                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-12 col-sm-4 p-1">
                                <div class="position-relative sc">
                                    <div class="position-absolute top-0 end-0 start-0" style="z-index: 99;">
                                        <label for="" class="text-secondary d-flex align-items-center">
                                            انتخاب زبان رسانه
                                        </label>
                                        <button class="btn form-select border select" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse2"
                                                aria-expanded="false" aria-controls="collapse2">
                                            انتخاب کنید
                                        </button>
                                        <div class="collapse border" id="collapse2">
                                            <input type="search" name="" id="" class="form-control rounded-0" placeholder="جستجو"/>
                                            <div class="card card-body border-0 p-2">
                                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="form-check py-1">
                                                        <input class="form-check-input " name="language_id[]" type="checkbox" <?php if($language_id && in_array($row->id,$language_id) ): ?> checked <?php endif; ?>  value="<?php echo e($row->id); ?>" id="flexCheckDefault2">
                                                        <label class="form-check-label" for="flexCheckDefault2">
                                                            <?php echo e($row->title); ?>

                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                    <div class="col-xxl-3 col-lg-12 col-sm-4 p-1 text-center">
                        <!-- <label for="" class="text-secondary d-flex align-items-center">
                            دامین
                        </label> -->
                        <input type="text" name="domain" value="<?php echo e(@$domain); ?>" id="" class="form-control"  placeholder="دامین"/>
                    </div>
                    <div class="col-xxl-3 col-lg-12 col-sm-4 p-1 text-center">
                        <label for="" class="text-secondary d-flex align-items-center justify-content-center">
                            <input type="radio" id="other" name="sort" value="da|desc" <?php if(@$sort[0] == "da" && @$sort[1] == "desc"): ?>) checked="" <?php endif; ?>  style="margin-left: 4px;">ترتیب  بر اساس DA
                        </label>
                    </div>
                    <div class="col-xxl-3 col-lg-12 col-sm-4 p-1 text-center">
                        <label for="" class="text-secondary d-flex align-items-center justify-content-center">
                            <input type="radio" id="other" name="sort" value="dr|desc" <?php if((@$sort[0] == "dr" && @$sort[1] == "desc")): ?> checked="" <?php endif; ?>  style="margin-left: 4px;">ترتیب  بر اساس DR
                        </label>
                    </div>
                    <div class="col-xxl-3 col-lg-12 col-sm-4 p-1 text-center">
                        <label for="" class="text-secondary d-flex align-items-center justify-content-center">
                            <input type="radio" id="other" name="sort" value="price|desc" <?php if((@$sort[0] == "price" && @$sort[1] == "desc")): ?> checked="" <?php endif; ?>  style="margin-left: 4px;">ترتیب   بر اساس قیمت
                        </label>
                    </div>
                    <div class="col-xxl-12 col-xl-12 col-lg-12 ms-auto p-0">
                        <div class="row w-100 m-0">
                            <div class="col-xxl-3 col-xl-12 ms-auto p-1" style="margin: 0px !important;">
                                <button type="submit"
                                        class="btn w-100 btn-custom-danger rounded-3 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-search me-3"></i>
                                    جستجوی رپورتاژ
                                </button>
                                <?php if($search): ?>
                                    <a href="<?php echo e(url('/panel')); ?>" style="width: 53% !important;font-size: 10px;margin-top: 3%;margin-right: 24%;text-align: center;background-color: #8a8989;"
                                       class="btn w-100 btn-custom-danger rounded-3 d-flex align-items-center justify-content-center">
                                        پاک کردن جستجو
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <div class="alert alert-primary text-custom fw-bolder alert-dismissible fade mx-0 my-2 show" role="alert">
            دسته بندی ها بر حسب تشخیص لندیپر و موارد اعلام شده توسط رسانه اعلام شده است
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="border dashboard-table p-2 mb-2 table-responsive">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        DA
                        <?php if((@$sort[0] == "da" && @$sort[1] == "asc")): ?>
                            <button type="submit" value="da|desc" name="sort" style="background: none !important;border: none !important;color: blue;">
                                <i class="fas fa-arrow-down me-3"></i>
                            </button>
                        <?php elseif(@$sort[0] == "da" && @$sort[1] == "desc"): ?>
                            <button type="submit" value="da|asc" name="sort" style="background: none !important;border: none !important;color: blue;">
                                <i class="fas fa-arrow-up me-3"></i>
                            </button>
                        <?php else: ?>
                            <button type="submit" value="da|desc" name="sort" style="background: none !important;border: none !important;color: blue;">
                                <i class="fas fa-arrow-down me-3"></i>
                            </button>
                        <?php endif; ?>
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        DR
                        <?php if(@$sort[0] == "dr" && @$sort[1] == "asc"): ?>
                            <button type="submit" value="dr|desc" name="sort" style="background: none !important;border: none !important;color: blue;"><i class="fas fa-arrow-down me-3"></i></button>
                        <?php elseif(@$sort[0] == "dr" && @$sort[1] == "desc"): ?>
                            <button type="submit" value="dr|asc" name="sort" style="background: none !important;border: none !important;color: blue;"><i class="fas fa-arrow-up me-3"></i></button>
                        <?php else: ?>
                            <button type="submit" value="dr|desc" name="sort" style="background: none !important;border: none !important;color: blue;"><i class="fas fa-arrow-down me-3"></i></button>
                        <?php endif; ?>
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        کشور
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        زبان
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        دامنه
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        قیمت

                        <?php if(@$sort[0] == "price" && @$sort[1] == "asc"): ?>
                            <button type="submit" value="price|desc" name="sort" style="background: none !important;border: none !important;color: blue;"><i class="fas fa-arrow-down me-3"></i></button>
                        <?php elseif(@$sort[0] == "price" && @$sort[1] == "desc"): ?>
                            <button type="submit" value="price|asc" name="sort" style="background: none !important;border: none !important;color: blue;"><i class="fas fa-arrow-up me-3"></i></button>
                        <?php else: ?>
                            <button type="submit" value="price|desc" name="sort" style="background: none !important;border: none !important;color: blue;"><i class="fas fa-arrow-down me-3"></i></button>
                        <?php endif; ?>
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        موضوع
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        افزودن به سبد
                    </th>
                </tr>
                </form>
                </thead>
                <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th class="text-center" scope="row">
                            <?php echo e($row->da); ?>

                        </th>
                        <th class="text-center" scope="row">
                            <?php echo e($row->dr !== null ? $row->dr : 'نامشخص'); ?>

                        </th>
                        <td class="text-center">
                            <?php echo e(@$row->country->title); ?>

                        </td>
                        <td class="text-center">
                            <?php echo e(@$row->language->title); ?>

                        </td>
                        <td class="text-center">
                            <a target="_blank" href="<?php echo e($row->domain); ?>"><?php echo e($row->domain); ?></a>
                        </td>

                        <td class="text-center">
                            <?php echo e(number_format(intval($row->price))); ?> تومان
                        </td>
                        <td class="text-center">
                            <?php $__currentLoopData = $row->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e(@$item->title); ?>

                                <br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td class="text-center">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-custom-danger rounded-3" data-bs-toggle="modal" data-bs-target="#orderModal<?php echo e($row->id); ?>">
                                <i class="fas fa-shopping-bag"></i>
                            </button>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>


        </div>

        <center>
        <!--<?php echo e($products->links()); ?>-->
            <?php echo e($products->appends(request()->input())->render()); ?>

        </center>
    </div>



    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


        <!-- Modal -->
        <div class="modal fade" id="orderModal<?php echo e($row->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <?php
                    $my_item = null;
                    if(@$order_item_id){
                        $my_item = \App\Models\OrderItem::find($order_item_id);
                    }
                ?>
                <?php if(@$my_item): ?>
                    <form method="post" action="<?php echo e(route('shop-item-bank')); ?>" enctype="multipart/form-data" >
                        <?php else: ?>
                            <form method="post" action="<?php echo e(route('site.panel.order.post-add')); ?>" enctype="multipart/form-data" >
                                <?php endif; ?>
                                <input type="hidden" name="product_id" value="<?php echo e($row->id); ?>"/>
                                <input type="hidden" name="order_item_id" value="<?php echo e(@$order_item_id); ?>"/>

                                <?php echo e(csrf_field()); ?>

                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">    ثبت رپورتاژ در رسانه "<?php echo e($row->domain); ?>"</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">
                                                        زبان
                                                    </th>
                                                    <th scope="col">
                                                        کشور
                                                    </th>
                                                    <th scope="col">
                                                        موضوع
                                                    </th>
                                                    <th scope="col">
                                                        DA
                                                    </th>
                                                    <th scope="col">
                                                        DR
                                                    </th>
                                                    <th scope="col">
                                                        قیمت
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <?php echo e(@$row->language->title); ?>

                                                    </th>
                                                    <td>
                                                        <?php echo e(@$row->country->title); ?>

                                                    </td>
                                                    <td>
                                                        <?php $__currentLoopData = $row->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e(@$item->title); ?>

                                                            <br>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo e($row->da); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($row->dr); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e(number_format(intval($row->price))); ?> تومان
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php if($row->requirements !== null || $row->content_requirements !== null): ?>
                                            <div class="mb-3">
                                                <p class="text-end m-0">
                                                    <a class="btn btn-custom-red w-100" data-bs-toggle="collapse" href="#collapseExample"
                                                       role="button" aria-expanded="true" aria-controls="collapseExample">
                                                        شرایط
                                                    </a>
                                                </p>
                                                <div class="collapse show" id="collapseExample">
                                                    <div class="card card-body text-danger text-justify">
                                                        <p class="m-0">
                                                            <?php echo e($row->requirements ? $row->requirements : ''); ?>

                                                            <br>
                                                            <?php echo e($row->content_requirements ? $row->content_requirements : ''); ?>


                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="bg-light p-2">
                                            <div class="row w-100 m-0">
                                                <div class="col-xl-6 p-1">
                                                    <div class="form-group col-md-12">
                                                        <label>نام کمپین :</label>
                                                        <input name="name" type="text" class="form-control"
                                                               placeholder=" نام کمپین را وارد کنید..." value="<?php echo e(@$my_item->name); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 p-1">
                                                    <div class="form-group col-md-12">
                                                        <label>عنوان :</label>
                                                        <input name="title" type="text" class="form-control"
                                                               placeholder=" عنوان رپورتاژ را وارد کنید..." value="<?php echo e(@$my_item->title); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 p-1">
                                                    <div class="form-group">
                                                        <label>توضیحات :</label>
                                                        <textarea name="description" type="text" rows="3" cols="3"
                                                                  class="form-control"
                                                                  placeholder=" اگر توضیح و نکته ای در هنگام انتشار رپورتاژ دارید وارد نمایید."><?php echo e(@$my_item->description); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="my-2">
                                                <small class="text-success">
                                                    فایل Word حاوی متن و لینک رپورتاژ های خود را وارد نمایید. لینک های خود را در
                                                    Word به
                                                    صورت Hyper Link در وسط متن، درج نمایید.
                                                    <br>
                                                    برای ارسال عکس، فایل Word و عکس ها را در یک فایل RAR آپلود نمایید.
                                                </small>
                                            </div>
                                            <label> آپلود فایل</label>
                                            <?php if(!@$my_item): ?>
                                            <input type="file" class="form-control" name="file" id="exampleInputPassword1"
                                                   placeholder="انتخاب فایل" required>
                                            <?php else: ?>
                                                <input type="file" class="form-control" name="file" id="exampleInputPassword1"
                                                       placeholder="انتخاب فایل" >
                                                <?php endif; ?>
                                            <div class="">
                                                <p class="text-end m-0">
                                                    <?php if(@$my_item->file !== null): ?>
                                                        <a href="<?php echo e(asset('/assets/uploads/product/'.@$my_item->file)); ?>"
                                                           class="btn btn-custom-danger my-3">
                                                            دانلود فایل اپلود شده
                                                        </a>
                                                    <?php endif; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if(@$my_item): ?>
                                        <div class="modal-body">
                                            <div class="row w-100 m-0">
                                                <div style="margin-right: 24%;margin-top: -1%;" class="col-xxl-6 col-lg-6 col-sm-12 p-2">
                                                    <div class="card bg-light rounded-3 shadow-sm p-2">
                                                        <ul class="px-0 m-0">
                                                            
                                                            <li class="list-unstyled p-1">
                                                                <p class="m-0 text-custom fw-bolder">
                                                                    مبلغ پرداختی برای رپورتاژ   :
                                                                    <span class="text-custom-danger fw-lighter float-end">
                                                            <?php echo e(number_format($row->price)); ?> تومان
                                                        </span>
                                                                </p>
                                                            </li>
                                                            <?php if($row->price > Auth::user()->wallet): ?>
                                                                <li class="list-unstyled p-1">
                                                                    <p class="m-0 text-custom fw-bolder">
                                                                        اعتبار شما :
                                                                        <span class="text-custom-danger fw-lighter float-end">
                                                                <?php echo e(number_format(Auth::user()->wallet)); ?> تومان
                                                            </span>
                                                                    </p>
                                                                </li>
                                                                <li class="list-unstyled p-1">
                                                                    <p class="m-0 text-custom fw-bolder">
                                                                        مبلغ قابل پرداخت :
                                                                        <span class="text-custom-danger fw-lighter float-end">
                                                                <?php echo e(number_format(($row->price) - Auth::user()->wallet)); ?> تومان
                                                            </span>
                                                                    </p>
                                                                </li>
                                                                <input name="type" value="2" type="hidden" />

                                                                <li class="list-unstyled p-1">
                                                                    <button type="submit" class="btn btn-custom-danger rounded-3 w-100">
                                                                        پرداخت آنلاین
                                                                    </button>
                                                                </li>
                                                            <?php else: ?>
                                                                <input name="type" value="1" type="hidden" />

                                                                <li class="list-unstyled p-1">
                                                                    <button  type="submit" class="btn btn-custom-danger rounded-3 w-100">
                                                                        کسر از کیف پول
                                                                    </button>
                                                                </li>
                                                            <?php endif; ?>
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>


                                    <?php $user_cart_check = \App\Models\Order::where('user_id',Auth::id())->whereHas('orderItems')->count(); ?>
                                    <?php if(@$user_cart_check <= 0): ?>
                                        <div class="px-3 pb-3">
                                            <div class="form-check d-flex align-items-center justify-content-center p-0">
                                            <!-- Button trigger modal -->
                                                <!-- <button type="button" id="myBtn<?php echo e($row->id); ?>" class="btn border border-secondary rounded-3 w-100 d-flex align-items-center justify-content-center">
                                                    <h4 class="fw-bolder m-0">
                                                        ویدیو شرایط و قوانین استفاده از لندیپر
                                                    </h4>
                                                </button> -->
                                                <div class="border border-secondary rounded-3 w-100 d-flex align-items-center justify-content-center" style="padding: 1vh 1vh 1.5vh;" id="myBtn<?php echo e($row->id); ?>">
                                                    <?php if(@$user_cart_check <= 0): ?>
                                                        <input class="form-check-input me-2" type="checkbox" value="1" name="accept_rules"
                                                            id="flexCheckChecked" style="width:3vh;height:3vh;cursor:pointer;" required>
                                                    <?php else: ?>
                                                        <input class="form-check-input me-2" type="checkbox" value="1" name="accept_rules"
                                                            id="flexCheckChecked" style="width:3vh;height:3vh;cursor:pointer;"  checked required>
                                                    <?php endif; ?>
                                                    <label class="form-check-label text-black"
                                                        for="flexCheckChecked">
                                                        <a type="button" class="text-ch text-decoration-none"
                                                        href="<?php echo e(url('/rules')); ?>" target="_blank">
                                                            ویدیو شرایط و قوانین
                                                        </a>
                                                        استفاده از لندیپر را با دقت و کامل دیده ام و همه موارد آن رامی پذیرم.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="myModal<?php echo e($row->id); ?>" class="modalsd">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg px-5">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <span class="closesd<?php echo e($row->id); ?>" style="cursor: pointer;">&times;</span>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="border rounded-3 w-100 d-flex align-items-center justify-content-center my-2 shadow-sm" style="padding: 1vh 1vh 1.5vh; background: rgb(254,140,1);background: linear-gradient(31deg, rgba(254,140,1,1) 0%, rgba(14,46,161,1) 100%);height: 7vh;">
                                                            <a type="button" class="text-white fw-bolder text-decoration-none"
                                                            href="<?php echo e(url('/rules')); ?>" target="_blank">
                                                                <h6 class="fw-bolder m-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-book me-2" viewBox="0 0 16 16">
                                                                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                                                    </svg>
                                                                    لینک مشاهده قوانین و مقرارات لندیپر
                                                                </h6>
                                                            </a>
                                                        </div>
                                                        <div class="border border-secondary rounded-3 w-100 d-flex align-items-center justify-content-center my-2 shadow-sm" style="padding: 1vh 1vh 1.5vh;">
                                                            <a type="button" class="text-dark text-decoration-none"
                                                            href="<?php echo e(url('/rules')); ?>" target="_blank">
                                                                <h6 class="fw-bolder m-0">
                                                                    ویدئو قوانین و مقرارات را ندیده ام
                                                                </h6>
                                                            </a>
                                                        </div>
                                                        <div class="border border-secondary rounded-3 w-100 d-flex align-items-center justify-content-center my-2 shadow-sm" style="padding: 1vh 1vh 1.5vh;">
                                                            <a type="button" class="text-dark text-decoration-none"
                                                            href="<?php echo e(url('/rules')); ?>" target="_blank">
                                                                <h6 class="fw-bolder m-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-circle-fill text-success me-2" viewBox="0 0 16 16">
                                                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                                                    </svg>
                                                                    ویدئو قوانین و مقرارات را دیده ام و تمام شرایط آن را پذیرفته ام
                                                                </h6>
                                                            </a>
                                                        </div>
                                                        <!-- <div class="border border-secondary rounded-3 w-100 d-flex align-items-center justify-content-center" style="padding: 1vh 1vh 1.5vh;">
                                                            <input class="form-check-input me-2" type="checkbox" value="1" name="accept_rules"
                                                                   id="flexCheckChecked" style="width:3vh;height:3vh;cursor:pointer;" required>
                                                            <label class="form-check-label text-black"
                                                                for="flexCheckChecked">
                                                                <a type="button" class="text-ch text-decoration-none"
                                                                href="<?php echo e(url('/rules')); ?>" target="_blank">
                                                                    ویدیو شرایط و قوانین
                                                                </a>
                                                                استفاده از لندیپر را با دقت و کامل دیده ام و همه موارد آن رامی پذیرم.
                                                            </label>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal content -->
                                        </div>
                                    <?php else: ?>
                                        <div class="border border-secondary rounded-3 w-100 d-flex align-items-center justify-content-center" style="padding: 1vh 1vh 1.5vh;" id="myBtn<?php echo e($row->id); ?>">
                                            <?php if(@$user_cart_check <= 0): ?>
                                                <input class="form-check-input me-2" type="checkbox" value="1" name="accept_rules"
                                                       id="flexCheckChecked" style="width:3vh;height:3vh;cursor:pointer;" required>
                                            <?php else: ?>
                                                <input class="form-check-input me-2" type="checkbox" value="1" name="accept_rules"
                                                       id="flexCheckChecked" style="width:3vh;height:3vh;cursor:pointer;"  checked required>
                                            <?php endif; ?>
                                            <label class="form-check-label text-black"
                                                   for="flexCheckChecked">
                                                <a type="button" class="text-ch text-decoration-none"
                                                   href="<?php echo e(url('/rules')); ?>" target="_blank">
                                                    ویدیو شرایط و قوانین
                                                </a>
                                                استفاده از لندیپر را با دقت و کامل دیده ام و همه موارد آن رامی پذیرم.
                                            </label>
                                        </div>
                                    <?php endif; ?>


                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>

                                        <?php if(!@$my_item): ?>


                                            <button type="submit" class="btn  btn-custom-danger rounded-3"  >اضافه کردن به سبد خرید</button>

                                        <?php endif; ?>
                                    </div>
                                </div>

                            </form>
            </div>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <style>
        .pagination {
            margin-right: 20%;
            margin-top: 4%;
            overflow: scroll;
        }
        @media (max-width:576px) {
            .pagination {
                margin-right: 0% !important;
            }
        }
        /* The Modal (background) */
        .modalsd {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 1s;
            animation-name: animatetop;
            animation-duration: 1s
        }

        /* The Close Button */
        .closesd {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .closesd:hover,
        .closesd:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
        }

        @keyframes  animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
        }
    </style>

    <script>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            // Get the modal
            var modalsd<?php echo e($row->id); ?> = document.getElementById("myModal<?php echo e($row->id); ?>");

            var btn<?php echo e($row->id); ?> = document.getElementById("myBtn<?php echo e($row->id); ?>");

            var span<?php echo e($row->id); ?> = document.getElementsByClassName("closesd<?php echo e($row->id); ?>")[0];

            btn<?php echo e($row->id); ?>.onclick = function () {
                modalsd<?php echo e($row->id); ?>.style.display = "block";
            }

            span<?php echo e($row->id); ?>.onclick = function () {
                modalsd<?php echo e($row->id); ?>.style.display = "none";
            }

            window.onclick = function (event) {
                if (event.target == modalsd<?php echo e($row->id); ?>) {
                    modalsd<?php echo e($row->id); ?>.style.display = "none";
                }
            }
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("site.panel.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/saeed/Documents/project-cm/landiper/resources/views/site/panel/dashboard.blade.php ENDPATH**/ ?>