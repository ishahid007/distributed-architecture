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
      <div class="col-md-9">
         <form action="<?=base_url('solution/save')?>" method="POST">
            <input type="hidden" name="assignment_id" value="<?=$assignment->id?>">
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Submit your solution</h3>
               </div>
               <div class="box-body">
                  
                  <div class="form-group">
                     <textarea id="compose-textarea" name="description" id="compose-textarea" class="form-control" style="height: 300px" required></textarea>
                  </div>
                  
               </div>
               <div class="box-footer">
                  <div class="pull-right">
                     <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                  </div>
                  <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</section>
<!-- /content -->


<?php require_once(__DIR__ .'/inc/footer.php');?>
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>