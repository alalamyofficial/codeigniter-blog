<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<?php 
    $db = \Config\Database::connect();
    $query = $db->table('site')
        ->select('*')
        ->orderBy('id', 'DESC')
        ->get();
    $site = $query->getRow(); 
?>

<div class="container mt-5">
    <form method="post" id="add_tag" name="add_tag" 
        action="<?= site_url('/admin/settings/site/update') ?>"
        enctype="multipart/form-data"
        >
        <div class="form-group mb-3">
            <div class="d-flex">
                <div class="mr-2">
                    <label>Site Logo</label>
                    <input type="file" name="logo" class="form-control"
                        value="<?= ($site) ? ($site->logo) : "" ?>">
                </div>
                <div>
                    <img src="<?php echo base_url("/uploads/".$site->logo) ?>" 
                        style="width:80px"
                        class="img-thumbnail"
                        alt="">
                </div>
            </div>
        </div>
        <div class="form-group mb-3">
            <label>About</label>
            <textarea name="about" id="" cols="30" rows="10"
                    class="form-control">
                    <?= ($site) ? ($site->about) : "" ?>
            </textarea>
        </div>
        <div class="form-group mb-3">
            <label>Put Your Banner Ads 1 Here</label>
            <input type="text" class="form-control" name="ads1" id=""
            value="<?= ($site) ? ($site->ads1) : "" ?>">
        </div>
        <div class="form-group mb-3">
            <label>Put Your Banner Ads 2 Here</label>
            <input type="text" class="form-control" name="ads2" id=""
            value="<?= ($site) ? ($site->ads2) : "" ?>">
        </div>
        <div class="form-group mb-3">
            <label>Put Your Banner Ads 3 Here</label>
            <input type="text" class="form-control" name="ads3" id=""
            value="<?= ($site) ? ($site->ads2) : "" ?>">
        </div>
        
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary btn-block">Edit</button>
        </div>
    </form>
</div>


<?= $this->endsection() ?>
