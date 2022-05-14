<?php $__env->startSection('content'); ?>
<div class="border dashboard-search p-4 mb-0">
	<h4 class="text-custom text-center mb-4" style="text-align: center">
		جزییات سفارش
		<br>
		<a class="btn btn-custom-danger rounded-3" href="<?php echo e(url('/panel/orders')); ?>"
			style="background-color: #ff8c00;margin-top: 1%;">
			بازگشت
		</a>
	</h4>

	<div class="row w-100 m-0">
		<div style="margin-right: 24%;margin-bottom: 3%;" class="col-xxl-6 col-lg-6 col-sm-12 p-2">
			<div class="card bg-light rounded-3 shadow-sm p-2">
				<ul class="px-0 m-0">
					<li class="list-unstyled p-1">
						<p class="m-0 text-custom fw-bolder">
							وضعیت کلی فاکتور :
							<span class="text-custom-danger fw-lighter float-end">
								<?php echo e(@$order->orderStatus->title); ?>

							</span>
						</p>
					</li>
					<li class="list-unstyled p-1">
						<p class="m-0 text-custom fw-bolder">
							کد پیگیری بانک :
							<span class="text-custom-danger fw-lighter float-end">
								<?php echo e($order->ref_id ? $order->ref_id :'ندارد'); ?>

							</span>
						</p>
					</li>
					<li class="list-unstyled p-1">
						<p class="m-0 text-custom fw-bolder">
							مبلغ کل :
							<span class="text-custom-danger fw-lighter float-end">
								<?php echo e(number_format($order->total_prices) . ' تومان '); ?>

							</span>
						</p>
					</li>
					<li class="list-unstyled p-1">
						<p class="m-0 text-custom fw-bolder">
							مبلغ پرداخت شده :
							<span class="text-custom-danger fw-lighter float-end">

								<?php echo e(number_format($order->payment) . ' تومان '); ?>

							</span>
						</p>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<table class="table table-striped m-0">
		<thead>
			<tr>
				<th scope="col" class="text-center text-custom fw-bolder">
					شماره ایتم
				</th>
				<th scope="col" class="text-center text-custom fw-bolder">
					DA
				</th>
				<th scope="col" class="text-center text-custom fw-bolder">
					عنوان
				</th>
				<th scope="col" class="text-center text-custom fw-bolder">
					قیمت
				</th>
				<th scope="col" class="text-center text-custom fw-bolder">
					وضعیت
				</th>
				<th scope="col" class="text-center text-custom fw-bolder">
					عملیات
				</th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<th class="text-center" scope="row">
					<?php echo e($row->id); ?>

				</th>
				<td class="text-center">
					<?php echo e(@$row->product->da); ?>

				</td>
				<td class="text-center">
					<?php echo e($row->title); ?>

				</td>
				<td class="text-center">
					<?php echo e(number_format(@$row->product->price) . ' تومان '); ?>

				</td>
				<td class="text-center">
					<?php echo e(@$row->orderStatus->title); ?>

				</td>
				<td class="text-center">
					<button type="button" class="btn btn-custom-danger rounded-3" data-bs-toggle="modal"
						data-bs-target="#orderModal<?php echo e($row->id); ?>">
						<i class="fas fa-edit"></i> ویرایش
					</button>
					<a type="button" class="btn btn-custom-danger rounded-3"
						href="<?php echo e(url('/panel?order_item_id='.$row->id)); ?>">
						<i class="fas fa-edit"></i> ویرایش و تغییر رسانه
					</a>
					<?php if($row->order_item_status_id != 11 && $row->order_item_status_id != 12 &&
					$row->order_item_status_id != 13 && $row->order_item_status_id != 16): ?>
					<a type="button" class="btn btn-custom-danger rounded-3"
						href="<?php echo e(route('site.panel.order.status',['id'=>$row->id,'status'=>16])); ?>"
						style="background-color: red;">
						لغو رپورتاژ
					</a>
					<?php endif; ?>

					<?php if(@$row->orderStatus->id == 11): ?>
					<button type="button" class="btn btn-success rounded-3" data-bs-toggle="modal"
						data-bs-target="#orderDetailModal<?php echo e($row->id); ?>">
						مشخصات رپورتاژ منتشر شده
					</button>
					<?php elseif(@$row->orderStatus->id == 10 || @$row->orderStatus->id == 13 || @$row->orderStatus->id
					== 15 || @$row->orderStatus->id == 14): ?>
					<button type="button" class="btn btn-success rounded-3" data-bs-toggle="modal"
						data-bs-target="#orderDetailModal<?php echo e($row->id); ?>">
						مشاهده توضیحات مدیریت
					</button>
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</div>
<?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- Modal -->
<div class="modal fade" id="orderDetailModal<?php echo e($row->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog">

		<div class="modal-content" style="width: 650px;margin-right: -12%;">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"> جزییات رپورتاژ در رسانه "<?php echo e(@$row->product->domain); ?>"
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php if(@$row->orderStatus->id == 11): ?>

				<p style="text-align: center">
					لینک رپورتاژ :‌ <a href="<?php echo e($row->link); ?>"><?php echo e($row->link); ?></a>
				</p>
				<?php elseif(@$row->orderStatus->id == 10 || @$row->orderStatus->id == 13 || @$row->orderStatus->id == 15
				|| @$row->orderStatus->id == 14): ?>
				<p style="text-align: center">
					<?php echo e($row->problems); ?>

				</p>
				<?php endif; ?>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
			</div>
		</div>
		</form>
	</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- Modal -->
<div class="modal fade" id="orderModal<?php echo e($row->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<form method="post" action="<?php echo e(route('site.panel.order.post-edit')); ?>" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>

			<input type="hidden" name="order_item_id" value="<?php echo e($row->id); ?>" />

			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"> ویرایش رپورتاژ در رسانه
						"<?php echo e(@$row->product->domain); ?>"</h5>
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
										اتوریتی
									</th>
									<th scope="col">
										قیمت
									</th>
									<th scope="col">
										Requirements
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">
										<?php echo e(@$row->product->language->title); ?>

									</th>
									<td>
										<?php echo e(@$row->product->country->title); ?>

									</td>
									<td>
										<?php if(@$row->product->categories): ?>
										<?php $__currentLoopData = @$row->product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php echo e(@$item->title); ?>

										<br>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php endif; ?>
									</td>
									<td>
										<?php echo e(@$row->product->da); ?>

									</td>
									<td>
										<?php echo e(number_format(intval(@$row->product->price))); ?>

									</td>
									<td>
										<?php echo e(@$row->product->requirements); ?>

									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="mb-3">
						<p class="text-end m-0">
							<a class="btn btn-custom-red w-100" data-bs-toggle="collapse" href="#collapseExample"
								role="button" aria-expanded="false" aria-controls="collapseExample">
								ملظومات
							</a>
						</p>
						<div class="collapse" id="collapseExample">
							<div class="card card-body text-danger text-justify">
								<p class="m-0">
									لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
									از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و
									سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای
									متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه
									درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با
									نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان
									خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید
									داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به
									پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی
									سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
								</p>
							</div>
						</div>
					</div>
					<div class="bg-light p-2">
						<div class="row w-100 m-0">
							<div class="col-xl-6 p-1">
								<div class="form-group col-md-12">
									<label>نام کمپین :</label>
									<input name="name" type="text" class="form-control"
										placeholder=" نام کمپین را وارد کنید..." value="<?php echo e(@$row->name); ?>">
								</div>
							</div>
							<div class="col-xl-6 p-1">
								<div class="form-group col-md-12">
									<label>عنوان :</label>
									<input name="title" type="text" class="form-control"
										placeholder=" عنوان رپورتاژ را وارد کنید..." value="<?php echo e(@$row->title); ?>">
								</div>
							</div>
							<div class="col-xl-12 p-1">
								<div class="form-group">
									<label>توضیحات :</label>
									<textarea name="description" type="text" rows="3" cols="3"
										class="form-control"
										placeholder=" اگر توضیح و نکته ای در هنگام انتشار رپورتاژ دارید وارد نمایید."><?php echo e($row->description); ?></textarea>
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
						<input type="file" class="form-control" name="file" id="exampleInputPassword1"
							placeholder="انتخاب فایل">
						<div class="">
							<p class="text-end m-0">
								<?php if($row->file !== null): ?>
								<a href="<?php echo e(asset('/assets/uploads/product/'.$row->file)); ?>"
									class="btn btn-custom-danger my-3">
									دانلود فایل اپلود شده
								</a>
								<?php endif; ?>
							</p>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
					<button type="submit" class="btn  btn-custom-danger rounded-3">ویرایش</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("site.panel.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/saeed/Documents/project-cm/landiper/resources/views/site/panel/order-detail.blade.php ENDPATH**/ ?>