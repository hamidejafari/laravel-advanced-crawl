<?php $__env->startSection('content'); ?>
<div class="border dashboard-search p-4 mb-0">
	<h4 class="text-custom text-center mb-4">
		لیست تیکت ها
	</h4>
	<a class="btn btn-custom-outline-danger fw-bolder d-flex align-items-center ms-auto max-content"
		href="<?php echo e(url('/panel/tickets/create')); ?>">
		<i class="fas fa-edit me-2"></i>
		تیکت جدید
	</a>
	<table class="table table-striped m-0">
		<thead>
			<tr>
                <th scope="col" class="text-center text-custom fw-bolder">
                    شماره
                </th>
				<th scope="col" class="text-center text-custom fw-bolder">
					موضوع
				</th>
				<th scope="col" class="text-center text-custom fw-bolder">
                    وضعیت
                </th>
				<th scope="col" class="text-center text-custom fw-bolder">
					تاریخ
				</th>
				<th scope="col" class="text-center text-custom fw-bolder">
					عملیات
				</th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
                <td class="text-center">
                    <?php echo e($row->id); ?>

                </td>
				<th class="text-center" scope="row">
					<?php echo e($row->subject); ?>

				</th>
				<td class="text-center">
					<?php echo e($row->status ? 'پاسخ داده شده' : 'در انتظار پاسخ'); ?>

				</td>
				<td class="text-center">
					<?php echo e(jdate('Y/m/d H:i',$row->created_at->timestamp)); ?>

				</td>
				<td class="text-center">
					<a href="<?php echo e(route('site.panel.ticket.detail',['id'=>$row->id])); ?>"
						class="btn btn-custom-danger rounded-3 btn-sm d-flex align-items-center max-content mx-auto">
                        <i class="fas fa-eye me-2"></i>
						نمایش جزییات
					</a>
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("site.panel.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/saeed/Documents/project-cm/landiper/resources/views/site/panel/tickets.blade.php ENDPATH**/ ?>