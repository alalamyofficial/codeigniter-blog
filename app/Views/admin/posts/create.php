<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<?php if (session('errors')) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session('errors') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>


<div class="container mt-5">
    <form method="post" id="add_post" name="add_post" 
        action="<?= site_url('/admin/store/post') ?>"
        enctype="multipart/form-data"
    >
      <div class="form-group mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control">
      </div>
<!-- 
      <div class="form-group mb-3 mb-3">
        <input type="hidden" name="desc" id="desc" value="">
        <div id="editor" style="height: 300px;"></div>
      </div> -->

      <div class="form-group mb-3">
        <textarea name="desc">
          Hey , What's your Mind !!
        </textarea>
      </div>

      <div class="form-group mb-3">
        <label >Upload Post Cover</label>
        <input type="file" class="form-control" name="post_cover" id="">
      </div>

      <div class="form-group mb-3">
        <select class="form-control" name="category_id" aria-label="Default select example">
          <option selected>Category...</option>
          <?php foreach($categories as $category): ?>
            <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
          <?php endforeach; ?>  
        </select>
      </div>

      <div class="form-group mb-3">
  
        <div class="tags-input">
          <ul id="tags-list" name="tags"></ul><br>
          <input type="hidden" name="tags" id="hidden-tags-input">
          <input type="text" class="form-control" id="tag-input" placeholder="Add a tag">
        </div>

      </div>

      <div class="form-group mb-3">
        <label class="form-check-label" for="publishCheckbox">
          Publish 
        </label>
        <input type="checkbox" id="publishCheckbox" onchange="handleCheckboxChange()">
        <input type="hidden" id="statusInput" name="status" value="0">      
      </div>

      <div class="form-group mb-3">
        <button type="submit" id="createButton" class="btn btn-primary btn-block">Create</button>
      </div>
    </form>
</div>


<?= $this->endsection() ?>
