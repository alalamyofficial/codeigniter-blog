<?= $this->include('website/css'); ?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <?php if($categories): ?>
                    <?php foreach($categories as $category): ?>
                        <li>
                            <a href="<?= base_url('/category/'.$category['name']) ?>">
                            <?= $category['name']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                 <li>
                    <a href="<?= base_url('/contact/form') ?>">
                        Contact Us
                    </a>
                 </li>       
                <?php endif; ?>	
            </ul>


            
            <ul class="nav navbar-nav navbar-right">
                <?php if(session()->has('id')): ?>
                    <li><a href="/logout">Logout</a></li>
                <?php else: ?>
                    <li><a href="/register">Register</a></li>
                    <li><a href="/login">Login</a></li>
                <?php endif; ?>
            </ul>


        </div>
        <!--/.nav-collapse -->
    </div>
</nav>


<?php 
    $db = \Config\Database::connect();
    $query = $db->table('site')
        ->select('*')
        ->orderBy('id', 'DESC')
        ->get();
    $site = $query->getRow(); 
?>

<div class="container">
		<header style="background-color:#f1f1f1">
			<a href="/">
                <img 
                    src="<?= base_url("/uploads/".$site->logo) ?>"
                    class="img-thumbnail rounded-circle"
                    style="width:120px"
                >
            </a>
		</header>


        <section class="main-slider">
            <ul class="bxslider">
                <?php if($posts): ?>
                    <?php foreach($posts as $post): ?>
                        <li>
                            <div class="slider-item">
                                <img src="/uploads/<?= $post['post_cover']; ?>" alt="image"
                                    title="Funky roots" 
                                    style="width:1140px; height:500px"
                                />
                                <h2>
                                    <a href="<?= base_url('post/'.$post['title']) ?>" 
                                    title="Vintage-Inspired Finds for Your Home">
                                        <?= $post['title']; ?>
                                    </a>
                                </h2>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>			
            </ul>
        </section>


		<div id="cookieBanner" class="cookie-banner">
			<div class="cookie-content">
				<p class="cookie-message">We use cookies to enhance your experience. Please click <strong>Allow</strong> to accept the use of cookies.</p>
				<button id="allowCookiesButton" class="allow-cookies-button">Allow</button>
			</div>
		</div>




        <section>
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-lg-8">
                            <?= $this->renderSection('blog_content') ?>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <?= $this->include('website/minibar') ?>    
                        </div>
                    </div>
                </div>
                <div class="col-md-4 sidebar-gutter">
                </div>
            </div>
        </section>

        </div><!-- /.container -->

                <footer class="footer">

                    <div class="footer-socials">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-reddit"></i></a>
                    </div>

                    <div class="footer-bottom">
                        <i class="fa fa-copyright"></i> Copyright 2015. All rights reserved.<br>
                        Theme made by <a href="http://www.moozthemes.com">MOOZ Themes</a>
                    </div>
                </footer>
        </div>       
</div>


<?= $this->include('website/js'); ?>
