<div class="border tickets p-4 mb-0">
	<h4 class="text-custom text-center mb-4">
		لیست تیکت ها
	</h4>
	<div class="mb-2">
		<button type="button" class="btn btn-lg btn-custom-danger d-flex align-items-center" data-bs-toggle="modal"
			data-bs-target="#exampleModal">
			<i class="fas fa-edit me-2"></i>
			نوشتن تیکت جدید
		</button>
		<?php include('tickets/add-ticket.php')?>
	</div>
	<?php include('tickets/tickets-table.php')?>
</div>