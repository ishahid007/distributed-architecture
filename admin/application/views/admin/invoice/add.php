<?php require_once(__DIR__ .'../../inc/header.php');?>
<?php require_once(__DIR__ .'../../inc/top.php');?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<?=$title ?>
	</h1>
	
</section>


<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-8">

			<!-- messages -->
			<?php require_once(__DIR__ .'../../inc/messages.php');?>

			
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><?=lang('add_invoice')?></h3>
					<a href="<?=base_url('admin/invoices/')?>" class="btn btn-primary pull-right">
						<i class="fa fa-arrow-left"></i> <?=lang('back')?> 
					</a>
				</div>
				<!-- /.box-header -->
				<?=form_open_multipart('admin/invoices/create',['class'=>'form-horizontal','novalidate'=>'novalidate']) ?>
				
				<div class="box-body">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4">
							<?=lang('vendor')?>
						</label>

						<div class="col-sm-8">
							<select class="form-control select2" name="vendor_id" required>
								<option value="" selected disabled>Select vendor...</option>
								<?php foreach($vendors as $vendor): ?>
									<option <?=set_value('vendor_id') == $vendor->id ? 'selected' : '' ?> value="<?=$vendor->id?>"> <?=$vendor->name?></option>
								<?php endforeach;?>
							</select>

							<!-- Validation Error -->
							<?=form_error('vendor_id') ?>
						</div>
					</div>

					<!-- Buildings -->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4">
							<?=lang('building')?>
						</label>

						<div class="col-sm-8">
							<select class="form-control select2" name="building_id" required>
								<option value="" selected disabled>Select Building...</option>
								<?php foreach($buildings as $building): ?>
									<option <?=set_value('building_id') == $building->id ? 'selected' : '' ?> value="<?=$building->id?>"> <?=$building->code.'('.$building->address.')'?></option>
								<?php endforeach;?>
							</select>

							<!-- Validation Error -->
							<?=form_error('building_id') ?>
						</div>
					</div>


					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4">
							<?=lang('work_order_no')?>
						</label>

						<div class="col-sm-8">
							<input type="text" class="form-control" id="inputEmail3" placeholder="Enter Work Order No" name="order_no" required value="<?=set_value('order_no'); ?>">

							<!-- Validation Error -->
							<?=form_error('order_no') ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4">
							<?=lang('total_amount')?>
						</label>

						<div class="col-sm-8">
							<input type="number" class="form-control" id="inputEmail3" placeholder="Enter Total amount" name="total_amount" required value="<?=set_value('total_amount'); ?>">

							<!-- Validation Error -->
							<?=form_error('total_amount') ?>
						</div>
					</div>


					<!--  -->
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4">
							<?=lang('allow_staff_to_pay')?>
						</label>

						<div class="col-sm-8">
							<select class="form-control" name="can_staff_pay" required>
								<option <?=set_value('can_staff_pay') == 0 ? 'selected' : '' ?> value="0">NO</option>
								<option <?=set_value('can_staff_pay') == 1 ? 'selected' : '' ?> value="1">YES</option>
								
							</select>

							<!-- Validation Error -->
							<?=form_error('can_staff_pay') ?>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4">
							<?=lang('requires_vendor_invoice')?>
						</label>

						<div class="col-sm-8">
							<select class="form-control" name="requires_vendor_invoice" required>
								<option <?=set_value('requires_vendor_invoice') == 0 ? 'selected' : '' ?> value="0">NO</option>
								<option <?=set_value('requires_vendor_invoice') == 1 ? 'selected' : '' ?> value="1">YES</option>
								
							</select>

							<!-- Validation Error -->
							<?=form_error('requires_vendor_invoice') ?>
						</div>
					</div>

				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-10">
							<button type="submit" class="btn btn-info"><?=lang('add_invoice')?></button>
						</div>
					</div>

				</div>
				<!-- /.box-footer -->
				<?=form_close() ?>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->

<?php require_once(__DIR__ .'../../inc/footer.php');?>


<!-- Page script -->
<script>
	$(function () {
	    //Initialize Select2 Elements
	    $('.select2').select2()
	});

</script>


