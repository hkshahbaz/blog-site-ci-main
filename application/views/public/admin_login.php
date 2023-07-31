<?php include('public_header.php');

echo br(3);
?>

<div class="container">

<?php  echo form_open('index.php/login/admin_login',['class'=> 'form-control']); ?>

  <fieldset>
    <legend>Sign In</legend>
    <div class="form-group row">
      <?php if($error = $this->session->flashdata('login_failed')): ?>
      <div class="col-sm-10">
        <div class="alert alert-dismissible alert-danger">
          
      <?=  $error //display alert message if username or password is incorrect ?> 
        </div>
      </div>
       <?php endif; ?>
    </div>
 
    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <?php echo form_input(['name'=> 'uname','class'=> 'form-control','placeholder'=> 'Enter Username','value'=>set_value('uname')]); ?>
    <div class="col-sm-6" >
    	<?php echo form_error('uname'); ?>
    </div>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <?php echo form_password(['name'=> 'pass','class'=> 'form-control','placeholder'=> 'Enter Password']); ?>
    </div>
    <div class="col-sm-6">
    	<?php echo form_error('pass'); ?>
    </div>
    
    </fieldset>
    <?php  
   echo  form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-sucess']),
    form_submit(['name'=> 'submit','value'=>'submit','class'=>'btn btn-primary']); 
    ?>
  
  </fieldset>
</form>

</div>
<?php include('public_footer.php'); ?>