<?= $this->extend('website/main'); ?>
<?= $this->section('blog_content'); ?>

<?= $this->include('admin/session_msg') ?>

<h1>Contact Form</h1>

<form action="/contact/us" method="POST">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" class="form-control" required>
    <!-- Display validation error for the 'name' field -->
    <?php if (is_array(session('validation_errors')) && array_key_exists('name', session('validation_errors'))): ?>
      <div class="text-danger"><?= session('validation_errors')['name'] ?></div>
    <?php endif; ?>
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" class="form-control" required>
    <!-- Display validation error for the 'email' field -->
    <?php if (is_array(session('validation_errors')) && array_key_exists('email', session('validation_errors'))): ?>
      <div class="text-danger"><?= session('validation_errors')['email'] ?></div>
    <?php endif; ?>
  </div>
  <div class="form-group">
    <label for="message">Message:</label>
    <textarea name="message" id="message" class="form-control" required></textarea>
    <!-- Display validation error for the 'message' field -->
    <?php if (is_array(session('validation_errors')) && array_key_exists('message', session('validation_errors'))): ?>
      <div class="text-danger"><?= session('validation_errors')['message'] ?></div>
    <?php endif; ?>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?= $this->endsection(); ?>
