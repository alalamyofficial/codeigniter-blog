<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>


  <div class="container mt-5">
    <form method="post" id="add_user" name="add_user" 
        action="<?= site_url('/admin/store/user/') ?>">
      <div class="form-group mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
      </div>
      <div class="form-group mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
      </div>
      <div class="form-group mb-3">
        <label>password</label>
        <input type="password" name="password" class="form-control">
      </div>

      <div class="form-group mb-3">
          <label for="role">Role</label>
          <select name="role" id="role" class="form-control">
              <option value="">---Select---</option>
              <option value="2">Admin</option>
              <option value="1">Moderator</option>
              <option value="0">User</option>
          </select>
      </div>



      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Create</button>
      </div>
    </form>
  </div>


<?= $this->endsection() ?>
