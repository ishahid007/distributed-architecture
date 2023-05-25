<?php require_once(__DIR__ .'/inc/header.php');?>
<?php require_once(__DIR__ .'/inc/top.php');?>

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		<?=$title ?>
	</h1>
	
</section>


<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">


			<!-- messages -->
			<?php require_once(__DIR__ .'/inc/messages.php');?>

			
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Listings</h3>
					<!--  -->
					<a class="btn btn-info pull-right" href="<?=base_url('assignments/create')?>">Create New</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table  class="table table-bordered table-striped dataTable">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Deadline</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							<?php foreach($assignments as $key => $assignment):?>
								<tr>
									<td>
										<?=$key + 1 ?>
									</td>
									
									<td>
										<a href="<?=isset($assignment->id)?base_url('assignments/view'.'/'.$assignment->id):"javascript:void(0)"?>">
											<?=$assignment->title ?>
										</a>
									</td>
									<td>
										<?=(strtotime($assignment->deadline) < strtotime(date("Y-m-d H:i:s"))) ? 'Expired' : $assignment->deadline?>
									</td>

							
					
									
									<td>
										<a class="btn btn-info" href="<?=isset($assignment->id)?base_url('assignments/view'.'/'.$assignment->id):"javascript:void(0)"?>">
														View
										</a>

										<a class="btn btn-danger" href="<?=isset($assignment->id)?base_url('assignments/delete'.'/'.$assignment->id):"javascript:void(0)"?>">
														Delete
										</a>
									</td>
								</tr>
							<?php endforeach;?>
							

						</tbody>

					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->


<?php require_once(__DIR__ .'/inc/footer.php');?>


<script type="text/javascript">
	$(document).ready(function($) {
		$('.dataTable').dataTable();
	});
</script>