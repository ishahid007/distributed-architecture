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
					<h3><?=isset($count)?$count:0?></h3>

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
					<h3>0 </h3>

					<p>Upcoming ...</p>
				</div>
				<div class="icon">
					<i class="fa fa-question"></i>
				</div>
				<a href="javascript:void(0)" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->

		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>0</h3>

					<p>Upcoming...</p>
				</div>
				<div class="icon">
					<i class="fa fa-check"></i>
				</div>
				<a href="javascript:void(0)" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->

	</div>
	<!-- /.row -->


</section>
<!-- /.content -->

<?php require_once(__DIR__ .'/inc/footer.php');?>
