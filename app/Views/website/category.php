<?= $this->extend('website/main'); ?>
<?= $this->section('blog_content'); ?>

<h1>

<label for=""> Category : </label>

<button class="btn btn-danger btn-lg" disabled="disabled">
    <?=  $category['name'] ?>
</button>

</h1>
<br><hr>


<?php if($posts): ?>
	<?php foreach($posts as $post): ?>
	<article class="blog-post">
		<div class="blog-post-image">
			<a href="<?= base_url('post/'.$post['title']) ?>">
				<img src="/uploads/<?= $post['post_cover']; ?>" 
					class="img-thumbnail"
					style="width:400px"
					alt="image">
			</a>
			<h2><a href="post.html"><?= $post['title']; ?></a></h2>
		</div>
		<div class="blog-post-body">
			<div class="post-meta">
				<span>by <a><?= $post['user_name']; ?></a></span>/
				<span><i class="fa fa-clock-o"></i>
					<?php 
						helper('time');
						echo timeAgo($post['created_at']);           
					?>
				</span>/
				<span><i class="fa fa-comment-o"></i> <a href="#">343</a></span>
			</div>
			

			<?php
				$desc = $post['desc']; // Assuming $post['desc'] contains the database description

				// Remove any <img> tags from the description
				$desc = preg_replace("/<img[^>]+\>/i", "", $desc);

				// Filter the description to get only the first 50 characters
				$trimmedDesc = substr($desc, 0, 50);

				echo "<p>" . $trimmedDesc . "</p>";
			?>


			<div class="read-more">
				<a href="<?= base_url('post/'.$post['id']) ?>">
					Continue Reading
				</a>
			</div>
		</div>
	</article>
	<!-- article -->
	<?php endforeach; ?>
<?php endif; ?>	





<?= $this->endsection(); ?>
