<?php  include_once('admin_header.php'); 
echo br(3);
?>
<div class="container">
  <?php  echo form_open('index.php/admin/store_article',['class'=> 'form-control ']); ?>
    <?php  echo form_hidden('id',$this->session->userdata('id'));
      echo form_hidden('created_at',date('Y-m-d H:i:s'));
  	// addding this article to against user id which is currentlt logined  ?>
  <fieldset>
    <legend>Add Article</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Article Title</label>
      <?php echo form_input(['name'=> 'title','class'=> 'form-control','placeholder'=> 'Write Article Title','value'=>set_value('title')]); ?>
      <br>
    <div class="col-sm-6"  >
    	<?php echo form_error('title'); ?>
    </div>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Article Body</label>
      <?php echo form_textarea(['name'=> 'body','class'=> 'form-control','placeholder'=> 'Write Article ','value'=>set_value('body')]); ?>
    </div>
    <br>
    <div class="col-sm-6">
    	<?php echo form_error('body'); ?>
    </div>
    </fieldset>
    <?php  
   echo  form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-sucess']),
    form_submit(['name'=> 'submit','value'=>'submit','class'=>'btn btn-primary']); 
    ?>
  </fieldset>
</form>
</div>
<?php include_once('admin_footer.php');  echo br(3);?>
