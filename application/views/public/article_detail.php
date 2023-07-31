<?php include_once('public_header.php'); echo br(3);?>
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<h2><?= $article->title; ?></h2>
			</div>
			<div class="col-sm-4">
				<p >Published on: <?= $article->created_at ?></p>
				<hr>
			</div>

		</div>
		<hr>
		<div class="row">
			<div class="col-sm-12">
				<p><?= $article->body ?></p>
			</div>
		</div>
	</div>
<?php include_once('public_footer.php'); ?>