<?php 
    $db = \Config\Database::connect();
    $query = $db->table('site')
                ->select('*')
                ->orderBy('id', 'DESC')
                ->get();
    $site = $query->getRow(); 
?>

<aside>
    <!-- sidebar-widget -->
    <div class="sidebar-widget">
        <h3 class="sidebar-title">About Us</h3>
        <p><?= $site->about ?></p>    
        <div class="sidebar-widget">
		<div class="widget-container widget-about">
                <a href="#">
                    <img src="https://www.alabamaiada.org/wp-content/uploads/2016/11/your-ad-here.jpg"
                    style="height:210px" alt="">
                </a>
            </div>
        </div>
		
    </div>
    <!-- sidebar-widget -->
    <div class="sidebar-widget">
        <h3 class="sidebar-title">Featured Posts</h3>
        <div class="widget-container">
        <?php
            $db = \Config\Database::connect(); 
            $min_posts = $db->table('articles')
                ->orderBy('views', 'DESC')
                ->limit(5)
                ->get()
                ->getResultArray(); 
        ?>
        <?php if($min_posts): ?>
            <?php foreach($min_posts as $post): ?>
            <article class="widget-post">
                <div class="post-image">
                    <a href="<?= base_url('post/'.$post['title']) ?>">
                        <img src="/uploads/<?= $post['post_cover']; ?>" alt="image"
                            style="width:90px; height:60px">

                    </a>
                </div>
                <div class="post-body">
                    <h2><a href="post.html"><?= $post['title']; ?></a></h2>
                    <div class="post-meta">
                        <span><i class="fa fa-clock-o"></i> 
                            <?php 
                                helper('time');
                                echo timeAgo($post['created_at']);           
                            ?>
                        </span> 
                        <span><a href="post.html"><i class="fa fa-eye"></i>
                                <?= $post['views']; ?>
                        </a></span>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        <?php endif; ?>	    

        </div>
    </div>
    <!-- sidebar-widget -->
    <div class="sidebar-widget">
        <h3 class="sidebar-title">Socials</h3>
        <div class="widget-container">
            <div class="widget-socials">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-reddit"></i></a>
            </div>
        </div>
    </div>
    <!-- sidebar-widget -->
    <div class="sidebar-widget">
        <h3 class="sidebar-title">Categories</h3>
        <div class="widget-container">
            <ul>
                <?php if($categories): ?>
                    <?php foreach($categories as $category): ?>
                        <li><a href="<?= base_url('/category/'.$category['name']) ?>"><?= $category['name']; ?></a></li>
                    <?php endforeach; ?>
                <?php endif; ?>	
            </ul>
        </div>
    </div>
    </div>
</aside>
