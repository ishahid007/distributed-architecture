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
         <div class="box box-primary">
           <form method="POST" action="<?=base_url('assignments/save')?>">
               <div class="box-body">
                  
                  
                  <div class="form-group margin-bottom">
                     <label>Title:</label>
                     <input name="title" type="text" class="form-control pull-right" value="" required>
                  </div>

                  <div class="form-group margin-bottom">
                     <label>Deadline:</label>
                     <input name="deadline" type="date" class="form-control pull-right" value="" required>
                  </div>

                  <div class="form-group margin-bottom">
                     <label>Description:</label>
                     <textarea name="description" required class="form-control" id="readonly-textarea"></textarea>
                  </div>

                  
               </div>

               <!--  -->
               <div class="box-footer">
                  <div class="pull-right">
                     <button type="submit" class="btn btn-success">Create</button>
                  </div>
               </div>
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
  });
</script>