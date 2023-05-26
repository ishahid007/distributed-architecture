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
                  <li><a href="#"><i class="fa fa-envelope-o"></i> Publish on: <?=$assignment->created_at?></a></li>

                  <!-- Rated -->
                  <li>
                     <a href="#"><i class="fa fa-percent"></i> Marks: 
                        <span class="badge <?=isset($result->percentage)? 'bg-green' : 'bg-red'?>"><?=isset($result->percentage) && !empty($result->percentage) ? $result->percentage : 'No Rated Yet'?></span>
                     </a>
                  </li>

                  <!-- Submit -->
                  <?php if(!isset($solution->id)): ?>
                     <li>
                         <a href="<?=base_url('assignments/submit/'.$assignment->id.'')?>"><i class="fa fa-bell-o"></i> Action: 
                           <span class="badge bg-red">
                              Submit Now
                           </span>
                        </a>
                        
                     </li>
                  <?php endif;?>
                  
               </ul>
            </div>
         </div>
         
      </div>
      <div class="col-md-9">
         <div class="box box-primary">
           
            <div class="box-body no-padding">
               <div class="mailbox-read-info">
                  <h3><?=$assignment->title?></h3>
                  <h5>Deadline: <?=$assignment->deadline?>
                     <span class="mailbox-read-time pull-right"><?=$assignment->created_at?></span>
                  </h5>
                  <h4 style="margin-top:20px;"><b>Description</b></h4>
               </div>
               

               <div class="mailbox-read-message">
                  <textarea style="height: 500px;" readonly disabled class="form-control" id="readonly-textarea"><?=$assignment->description?></textarea>
                 
               </div>
            </div>

            <!-- Your solution -->
            <?php if(isset($solution->id) && !empty($solution->description)): ?>
               <div class="box-body no-padding">
                  <div class="mailbox-read-info">
                    
                     <h4 class="bg-green" style="padding:10px;margin-top:20px;font-weight: bold;"><b>Your Solution:</b></h4>
                  </div>
                  

                  <div class="mailbox-read-message">
                     <textarea style="height: 500px;" readonly disabled class="form-control" id="readonly-textarea-2"><?=$solution->description?></textarea>
                    
                  </div>
               </div>
            <?php endif;?>
            
            <!-- End to solution -->

             <!-- Not able to submit if solution is already submitted -->
            <?php if(isset($result->remarks) && !empty($result->remarks)): ?>
               <div class="box-body no-padding">
                  <div class="mailbox-read-info">
                    
                     <h4 style="margin-top:20px;"><b>Remarks:</b> <?=$result->remarks?></h4>
                  </div>
                  
               </div>
            <?php endif;?>
            
            <!-- Not able to submit if solution is already submitted -->
            <?php if(!isset($solution->id)): ?>
               <div class="box-footer">
                  <div class="pull-right">
                     <button onclick="window.location.href='<?=base_url('assignments/submit/'.$assignment->id.'')?>'" type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                  </div>
               </div>
            <?php endif;?>
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