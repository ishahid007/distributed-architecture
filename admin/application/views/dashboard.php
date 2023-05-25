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
	<!-- Small boxes (Stat box) -->
	<div class="row">


		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3><?=isset($count_assignments)?$count_assignments:0?></h3>

					<p>Total Assignments</p>
				</div>
				<div class="icon">
					<i class="fa fa-list"></i>
				</div>
				<a href="<?=base_url('assignments')?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->

		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3><?=isset($count_users)?$count_users:0?></h3>
					<p>Total Users </p>

				</div>
				<div class="icon">
					<i class="fa fa-users"></i>
				</div>
				<a href="<?=base_url('users')?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->

		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3><?=isset($count_solutions)?$count_solutions:0?></h3>
					<p>Total Solutions</p>

					
				</div>
				<div class="icon">
					<i class="fa fa-check"></i>
				</div>
				<a href="<?=base_url('solutions')?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->

	</div>
	<!-- /.row -->


</section>
<!-- /.content -->

<?php require_once(__DIR__ .'/inc/footer.php');?>
