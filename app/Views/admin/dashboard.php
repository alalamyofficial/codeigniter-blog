<?= $this->extend('admin/layout',['title' => $title]) ?>
<?= $this->section('content') ?>


<div class="big-div">
    <div class="mb-3">
        <h2 class="username">Hello <?= session()->get('name'); ?> 
                , Welcome to My Dashbaord</h2>
    </div>
    <hr><br>

    <?php 
        $db = \Config\Database::connect();
        $users = $db->table('users')->select('*')->where('status',1)->get();
        $categories = $db->table('categories')->select('*')->where('deleted_at',null)->get();
        $posts = $db->table('articles')->select('*')->where('deleted_at',null)->get();
        $mails = $db->table('mails')->select('*')->where('deleted_at',null)->get();
    ?>

    <div class="container">
        <div class="row">
        
        <div class="col-md-3">
        <h4 class="card-counter primary">
            <i class="fa fa-list"></i>
            <span class="count-numbers">
                <?= count($categories->getResultArray()) ?>
            </span>
            <span class="count-name">Categories</span>
        </h4>
        </div>

        <div class="col-md-3">
        <h4 class="card-counter danger">
            <i class="fa fa-newspaper"></i>
            <span class="count-numbers"><?= count($posts->getResultArray()) ?></span>
            <span class="count-name">Posts</span>
        </h4>
        </div>

        <div class="col-md-3">
        <h4 class="card-counter success">
            <i class="fa fa-envelope"></i>
            <span class="count-numbers"><?= count($mails->getResultArray()) ?></span>
            <span class="count-name">Mails</span>
        </h4>
        </div>

        <div class="col-md-3">
        <h4 class="card-counter info">
            <i class="fa fa-users"></i>
            <span class="count-numbers"><?= count($users->getResultArray()) ?></span>
            <span class="count-name">Users</span>
        </h4>
        </div>
    </div>
    </div>
</div>

<!-- <img src="https://steamuserimages-a.akamaihd.net/ugc/1555388426210414849/31752E894B76E2CDFDE2B62AA8C02A9659E73435/?imw=512&&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=false" alt=""> -->

<?= $this->endsection() ?>

