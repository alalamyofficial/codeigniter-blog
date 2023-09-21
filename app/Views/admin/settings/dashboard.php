<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<?php 
    $db = \Config\Database::connect();
    $query = $db->table('dashboard')
        ->select('*')
        ->orderBy('id', 'DESC')
        ->get();
    $dashboard = $query->getRow(); 
?>

<div class="container mt-5">
    <form method="post" id="add_tag" name="add_tag" 
        action="<?= site_url('/admin/settings/dashboard/update') ?>">
        <div class="form-group mb-3">
            <label>Dashboard name</label>
            <input type="text" name="name" 
                    value="<?= ($dashboard) ? ($dashboard->name) : "" ?>" 
                    class="form-control">
        </div>
        <div class="form-group mb-3">
            <label>Font Awesome Icon <small>like (fa fa-user)</small></label>
            <input type="text" name="icon" 
                value="<?= ($dashboard) ? ($dashboard->icon) : "" ?>"    
                class="form-control">
        </div>
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary btn-block">Edit</button>
        </div>
    </form>
</div>


<?= $this->endsection() ?>
