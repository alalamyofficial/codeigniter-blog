<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>


  <div class="container mt-5">
    <form method="post" id="add_category" name="add_category" 
        action="<?= site_url('/admin/update/mail/'.$mail['id']) ?>">
      <div class="form-group mb-3">
        <label>Name</label>
        <input type="text" name="name" value="<?= $mail['name'] ?>" class="form-control">
        <?php if(isset($validationErrors['name'])): ?>
          <div class="text-danger"><?= $validationErrors['name'] ?></div>
        <?php endif; ?>
      </div>
      <div class="form-group mb-3">
        <label>Email</label>
        <input type="text" name="email" value="<?= $mail['email'] ?>" class="form-control">
        <?php if(isset($validationErrors['email'])): ?>
          <div class="text-danger"><?= $validationErrors['email'] ?></div>
        <?php endif; ?>  
      </div>
      <div class="form-group mb-3">
        <label>Message</label>
        <textarea name="message" id="" cols="30" rows="10"
                  class="form-control"
        ><?= $mail['message'] ?></textarea>
        <?php if(isset($validationErrors['message'])): ?>
            <div class="text-danger"><?= $validationErrors['message'] ?></div>
        <?php endif; ?>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Update</button>
      </div>
    </form>
  </div>


<?= $this->endsection() ?>
