<?= $this->extend('website/main'); ?>
<?= $this->section('blog_content'); ?>


<div class="container">
   <section>
      <div class="row">
         <div class="col-md-7">
            <article class="blog-post p-3">
               <div class="blog-post-image">
                  <a href="post.html"><img src="images/750x500-5.jpg" alt=""></a>
               </div>
               <div class="blog-post-body">
                  <h2><a href="post.html"><?= $post['title'] ?></a></h2>
                  <div class="post-meta">
                     <span>by <a href="#"><?= $post_user_name->name; ?></a></span>/
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
                  <div class="blog-post-text"> 

                  <?php if ($post['post_cover'] != NULL): ?>
                     <img src="/uploads/<?= $post['post_cover']; ?>" alt="image">
                  <?php endif; ?>
                  <br><br>

                  <br><hr>    
                     
                  <p><?= $post['desc'] ?></p>   
   
                  </div>
               </div>
            </article>
         </div>
   
      </div>
   </section>
</div>




<?= $this->endsection(); ?>


