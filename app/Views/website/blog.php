<?= $this->extend('website/main'); ?>
<?= $this->section('blog_content'); ?>

<div class="sidebar-widget">
	<div class="widget-container widget-about">
		<a href="#">
			<img src="https://www.alabamaiada.org/wp-content/uploads/2016/11/your-ad-here.jpg"
				style="height:250px" alt="">
		</a>
	</div>
</div>
	

<?php if($posts): ?>
	<?php foreach($posts as $post): ?>
	<article class="blog-post">
		<div class="blog-post-image">
				<a href="<?= base_url('/post/'.$post['title'])?>">
				<img src="/uploads/<?= $post['post_cover']; ?>" 
					class="img-thumbnail"
					style="width:500px"
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
				<span>
					<i class="fa fa-eye"></i> 
					<a href="#"><?= $post['views'] ?></a>
				</span>
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
				<a href="<?= base_url('post/'.$post['title']) ?>">
					Continue Reading
				</a>
			</div>
		</div>
	</article>
	<!-- article -->
	<?php endforeach; ?>

	<div class="sidebar-widget">
		<div class="widget-container widget-about">
			<a href="#">
				<img src="https://www.alabamaiada.org/wp-content/uploads/2016/11/your-ad-here.jpg"
				 style="height:210px" alt="">
			</a>
		</div>
	</div>
		


	<div class="pagination">
		<div class="pagination-container">
			<?= $pager->links() ?>
		</div>
	</div>

<?php endif; ?>	



<?= $this->endsection(); ?>
