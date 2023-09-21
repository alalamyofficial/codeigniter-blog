<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>


  <div class="container mt-5">
    <form method="post" id="add_user" name="add_user" 
        action="<?= site_url('/admin/update/user/'.$user['id']) ?>">
      <div class="form-group mb-3">
        <label>Name</label>
        <input type="text" name="name" value="<?= $user['name'] ?>" class="form-control">
      </div>
      <div class="form-group mb-3">
        <label>Email</label>
        <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control">
      </div>
      <div class="form-group mb-3">
        <label>password</label>
        <input type="password" name="password" class="form-control">
      </div>

      <div class="form-group mb-3">
          <label for="role">Role</label>
          <select name="role" id="role" class="form-control">
              <option value="2" <?= ($user['role'] == 2) ? 'selected' : '' ?>>Admin</option>
              <option value="1" <?= ($user['role'] == 1) ? 'selected' : '' ?>>Moderator</option>
              <option value="0" <?= ($user['role'] == 0) ? 'selected' : '' ?>>User</option>
          </select>
      </div>



      <div class="form-group">
        <button type="submit" class="btn btn-success btn-block">Update</button>
      </div>
    </form>
  </div>


<?= $this->endsection() ?>
