<?php include_once('admin_header.php'); ?>
<div class="container">
	<br>
	<div class="row">
	    <div class="col-sm-6">
	      <a href="<?= base_url('index.php/admin/add_article') ?>" class="btn btn-lg btn-info pull-right">Add Article</a>
	    </div>
  	</div>
  	<br>
  	   <?php if($feedback = $this->session->flashdata('feedback')): 
  	   		$feedback_class = $this->session->flashdata('feedback_class');
  	   	?>
      <div class="col-sm-10">
        	<div class="alert alert-dismissible <?= $feedback_class ?>">  
     			 <?=  $feedback //display alert message if article is inserted ?> 
        	</div>
      </div>
       <?php endif; ?>
       <br>
	<table class="table">
		<thead>
			<th>Serial No.</th>
			<th>Title</th>
			<th>Action</th>
		</thead>
		<tbody>
		<?php if( count($articles) ): 
		$count = $this->uri->segment(3,0); // geeting value for seriol number from uri
			foreach ($articles as $article ): ?>
				<tr>	
					<td><?= ++$count ?></td>
					<td><?php echo $article->title ?></td>
					<td>
						<div class="row">
							<div class="col-sm-2">
								<?=  anchor("index.php/admin/edit_article/{$article -> article_id}",'Edit',['class' =>'btn btn-primary']); //using anchor function insetead of base_url() / passing id using GET() ?>
							</div>
							<div class="col-sm-2">
								<?= 
							form_open('index.php/admin/delete_article'),
							form_hidden('article_id', $article -> article_id), //pass A_ID
							form_submit(['name' => 'submit', 'value' => 'Delete',
							'class' => 'btn btn-danger delete_button' ]),
							form_close();
							?>
							</div>
						</div>	
					</td>
				</tr>
			<?php endforeach;?>
		<?php	else: ?>
				
			 <tr>
			 	<td colspan="3">
			 		No Records Found
			 	</td>
			 </tr>

		<?php endif; ?>
		</tbody>
	</table>
	<?= $this->pagination->create_links(); ?>
</div>
<?php include_once('admin_footer.php'); ?>
<script type="text/javascript">
    $('.delete_button').click(function(e){
        var result = confirm("Are you sure you want to delete this Article?");
        if(!result) {
            e.preventDefault();
        }
    });
</script>