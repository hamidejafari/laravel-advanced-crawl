<?php $__env->startSection('content'); ?>
    <div class="border dashboard-search p-4 mb-0">
        <h4 class="text-custom text-center mb-4">
            لیست سفارشات
        </h4>
        <table class="table table-striped m-0">
            <thead>
                <tr>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        کد پیگیری
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        تعداد رپورتاژ ها
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        وضعیت
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        مبلغ کل
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        مبلغ پرداختی
                    </th>
                    <th scope="col" class="text-center text-custom fw-bolder">
                        عملیات
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th class="text-center" scope="row">
                        <?php echo e($row->id); ?>

                    </th>
                    <td class="text-center">
                        <?php echo e(count($row->orderItems)); ?>

                    </td>
                    <td class="text-center">
                        <?php echo e($row->orderStatus->title); ?>

                    </td>
                    <td class="text-center">
                        <?php echo e(number_format($row->total_prices) . ' تومان '); ?>

                    </td>
                    <td class="text-center">
                        <?php echo e(number_format($row->payment) . ' تومان '); ?>

                    </td>
                    <td class="text-center">
                        <a href="<?php echo e(route('site.panel.order.detail',['id'=>$row->id])); ?>" class="btn btn-custom-danger rounded-3">
                            <i class="fas fa-eye"></i>
                        </a>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("site.panel.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/saeed/Documents/project-cm/landiper/resources/views/site/panel/orders.blade.php ENDPATH**/ ?>