<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>


<div class="container mt-5">
    <div class="container posts-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                <div class="card-body">
                    <div class="media mb-3">
                        <div class="d-flex">
                            <a href="<?php echo previous_url(); ?>"
                                title="Go Back">
                                <i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i>
                            </a>
                            <div class="media-body ml-3">
                                <b class="mt-3">
                                    <i class="fa fa-user"></i>
                                    <?= $post_user_name->name ?> 
                                </b><br>
                                <small>
                                <i class="fa fa-clock"></i>  
                                    <?php 
                                        helper('time');
                                        echo timeAgo($post->created_at);           
                                    ?>
                                </small>    
                            </div>
                        </div>
                    </div>
                    <hr>
                
                    <h3 class="mb-2"><?php echo $post->title; ?></h3>
                    <h3 class="mb-2">
                        <img src="/uploads/<?= $post->post_cover; ?>" alt="image">
                    </h3>
                    <br>
                    <h3 class="mb-1">Description</h3>
                    <p>
                        <?php echo $post->desc; ?>
                    </p>
                     <br><br>       
                    <label for="">
                        <b><i class="fa fa-bookmark mr-1"></i>Category : </b>
                        <?php if(!$post_category_name == Null){

                            echo $post_category_name->name; 
                        }else{
                            echo "No Categories Found";  
                        } 
                        ?>
                    </label>
                    <br>

                    <b><i class="fa fa-tags mr-1"></i>Tags:</b>
                    <?php
                        if(!$post->tags == Null ){
                            $tags = explode(',', $post->tags);
                            foreach ($tags as $tag) {
                                echo '<span class="btn btn-primary">' . trim($tag) . '</span>, ';
                            }
                        }else{
                            echo "No Tags Found";
                        }
                    ?>

                    

                </div>
                <div class="card-footer">
                    <a href="javascript:void(0)" class="d-inline-block text-muted">
                        <strong>123</strong> <small class="align-middle">Likes</small>
                    </a>
                    <a href="javascript:void(0)" class="d-inline-block text-muted ml-3">
                        <strong>12</strong> <small class="align-middle">Comments</small>
                    </a>
                    <a href="" class="d-inline-block text-muted ml-3"
                    style="text-decoration: none;">
                    <small class="align-middle">
                        <i class="fa fa-eye"></i>
                        <?= $post->views; ?>
                    </small>
                    </a>
                </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?= $this->endsection() ?>
