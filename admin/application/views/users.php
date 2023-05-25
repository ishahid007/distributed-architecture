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
					<a class="btn btn-info pull-right" href="<?=base_url('users/create')?>">Create New</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table  class="table table-bordered table-striped dataTable">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
							<?php foreach($users as $key => $user):?>
								<tr>
									<td>
										<?=$key + 1 ?>
									</td>
									
									<td>
										<a href="<?=isset($user->id)?base_url('users/view'.'/'.$user->id):"javascript:void(0)"?>">
											<?=$user->name ?>
										</a>
									</td>
									<td>
										<?=$user->email?>
									</td>

									<td>
										<?=$user->role?>
									</td>

							
					
									
									<td>
										<a class="btn btn-info" href="<?=isset($user->id)?base_url('users/view'.'/'.$user->id):"javascript:void(0)"?>">
														View
										</a>

										<a class="btn btn-danger" href="<?=isset($user->id)?base_url('users/delete'.'/'.$user->id):"javascript:void(0)"?>">
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