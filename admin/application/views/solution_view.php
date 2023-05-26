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
      <div class="col-xs-10">
         <!-- messages -->
         <?php require_once(__DIR__ .'/inc/messages.php');?>
      </div>
   </div>

   <div class="row">
      <div class="col-md-3">

         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Important</h3>
               <div class="box-tools">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
               </div>
            </div>
            <div class="box-body no-padding">
               <ul class="nav nav-pills nav-stacked">
                  <li><a href="javascript:void(0)"><i class="fa fa-inbox"></i> Deadline:
                     <span class="label label-danger pull-right"><?=$assignment->deadline?></span></a>
                  </li>
                  <li><a href="#"><i class="fa fa-envelope-o"></i> Submitted: <?=$solution->created_at?></a></li>


                   <!-- Rated -->
                   
                  <li>
                     <a href="#"><i class="fa fa-percent"></i> Marks: 
                        <span class="badge <?=isset($result->percentage)? 'bg-green' : 'bg-red'?>"><?=isset($result->percentage) && !empty($result->percentage) ? $result->percentage : 'No Rated Yet'?></span>
                     </a>
                  </li>

                  <!-- Remarks -->
                   
                  <li>
                     <a href="#"><i class="fa fa-list"></i> Remarks: 
                        <span class="badge <?=isset($result->remarks)? 'bg-green' : 'bg-red'?>"><?=isset($result->remarks) && !empty($result->remarks) ? $result->remarks : 'No Rated Yet'?></span>
                     </a>
                  </li>
	             


                  
               </ul>
            </div>
         </div>
         
      </div>
      <div class="col-md-9">
         <div class="box box-primary">
           <form method="POST" action="<?=base_url('results/save/')?>">
            <input type="hidden" name="solution_id" value="<?=$solution->id?>" required>
               <div class="box-body">
                  <div class="mailbox-read-info">
                     <h3><?=$assignment->title?></h3>
                     <h5>Deadline: <?=$assignment->deadline?>
                        <span class="mailbox-read-time pull-right"><?=$solution->created_at?></span>
                     </h5>
                     
                  </div>
                  <!--  -->
                  <div class="form-group margin-bottom">
                     <label>Description:</label>
                     <textarea readonly disabled required class="form-control" id="readonly-textarea"><?=$solution->description?></textarea>
                  </div>
                  <!--  -->
                  <?php if(!isset($result->id)): ?>
	                  <div class="form-group margin-bottom">
	                     <label>% Percentage:</label>
	                     <input class="form-control" type="number" min="0" max="100" name="percentage" required placeholder="Rate the solution between 0-100">
	                  </div>


	                  <div class="form-group margin-bottom">
	                     <label>Description:</label>
	                     <textarea class="form-control" name="remarks" placeholder="Remarks"></textarea>
	                  </div>
	              <?php endif;?>

                  
               </div>

               <!--  -->
               <?php if(!isset($result->id)): ?>
	               <div class="box-footer">
	                  <div class="pull-right">
	                     <button type="submit" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> Submit</button>
	                  </div>
	               </div>
	           <?php endif;?>
            </form>
         </div>
      </div>
   </div>
</section>
<!-- /content -->


<?php require_once(__DIR__ .'/inc/footer.php');?>
<script>
  $(function () {
    //Add text editor
    $("#readonly-textarea").wysihtml5();
    $("#readonly-textarea-2").wysihtml5();
  });
</script>