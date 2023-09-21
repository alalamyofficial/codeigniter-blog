<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <form method="post" id="add_category" name="add_category" action="<?= site_url('/admin/store/category') ?>">
      <div class="form-group mb-3">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control">
        <?php if(isset($validation_errors['name'])): ?>
            <div class="text-danger"><?= $validation_errors['name'] ?></div>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Create</button>
      </div>
    </form>
</div>

<?= $this->endsection() ?>
