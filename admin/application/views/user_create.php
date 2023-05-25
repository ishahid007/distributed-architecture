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
           <form method="POST" action="<?=base_url('users/save/')?>">
               <div class="box-body">
          
                  
                  <div class="form-group margin-bottom">
                     <label>Name:</label>
                     <input name="name" type="text" class="form-control pull-right" value="" required>
                  </div>

                  <div class="form-group margin-bottom">
                     <label>Email:</label>
                     <input name="email" type="email" class="form-control pull-right" value="" required>
                  </div>

                  <div class="form-group margin-bottom">
                     <label>Password:</label>
                     <input name="password" type="password" class="form-control pull-right" value="" required>
                  </div>

                   <div class="form-group margin-bottom">
                     <label>Role:</label>
                     <select class="form-control" name="role" id="">
                     	<option value="student">Student</option>
                     	<option value="admin">Admin</option>
                     </select>
                     
                  </div>

                  
               </div>

               <!--  -->
               <div class="box-footer">
                  <div class="pull-right">
                     <button type="submit" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> Create</button>
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