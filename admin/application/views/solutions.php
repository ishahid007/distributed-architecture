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
					
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table  class="table table-bordered table-striped dataTable">
						<thead>
							<tr>
								<th>#</th>
								<th>Assignment</th>
								<th>Student</th>
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							<?php foreach($solutions as $key => $solution):?>
								<tr>
									<td>
										<?=$key + 1 ?>
									</td>
									
									<td>
										<a href="<?=isset($solution->assignment_id)?base_url('assignments/view'.'/'.$solution->assignment_id):"javascript:void(0)"?>">
											<?=$solution->title ?>
										</a>
									</td>

									<td>
										<a href="<?=isset($solution->user_id)?base_url('users/view'.'/'.$solution->user_id):"javascript:void(0)"?>">
											<?=$solution->name ?>
										</a>
									</td>

									<td>
										<?=$solution->created_at?>
									</td>
									<td>
										<span class="badge">
											<?=(strtotime($solution->deadline) < strtotime($solution->created_at)) ? 'Late' : "On Time"?>
										</span>
										
									</td>

							
					
									
									<td>
										<a class="btn btn-info" href="<?=isset($solution->id)?base_url('solutions/view'.'/'.$solution->id):"javascript:void(0)"?>">
														View
										</a>

										<a class="btn btn-danger" href="<?=isset($solution->id)?base_url('solutions/delete'.'/'.$solution->id):"javascript:void(0)"?>">
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