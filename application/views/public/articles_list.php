<?php include('public_header.php'); ?>
<div class="container">
	<?= br(2); ?>
	<h2>All Articles</h2>
	<hr>
	<table class="table">
		<thead>
			<tr>
				<td>Sr. No.</td>
				<td>Article Title</td>
				<td>Published on</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php if(count($articles)): ?>
				<?php $count = $this->uri->segment(3,0); ?>
				<?php foreach ($articles as $article): ?>
				<td><?= ++$count ?></td>
				<td><?= anchor("index.php/users/article/{$article->article_id}",$article->title) ?></td>
				<td><?= $article->created_at ?></td>
			</tr>
				<?php endforeach; ?>
			<?php else: ?>
			<tr>
				<td colspan="3">No Records Found.</td>
				<?php endif; ?>
			</tr>
		</tbody>
	</table>
	<?= $this->pagination->create_links(); ?>
</div>
<?php include('public_footer.php'); ?>
