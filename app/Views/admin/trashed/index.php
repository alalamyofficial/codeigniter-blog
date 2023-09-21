<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<?= $this->include('admin/session_msg') ?>


<div class="container mt-4">
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered pt-2" id="categories-list">
       <thead>
          <tr>
          <tr>
             <th><i class="fas fa-address-card mr-1" aria-hidden="true"></i>ID</th>
             <th><i class="fas fa-fire mr-1"></i>Title</th>
             <th><i class="fas fa-user mr-1"></i>User</th>
             <th><i class="fas fa-tasks mr-1"></i>Action</th>
          </tr>
          </tr>
       </thead>
       <tbody>
         <?php if($posts): ?>
            <?php foreach($posts as $post): ?>
               <tr>
                     <td><?php echo $post['id']; ?></td>
                     <td><?php echo $post['title']; ?></td>
                     <td><?php echo $post['user_name']; ?></td>
                     <td>
                        <a href="<?php echo base_url('admin/restore/post/'.$post['id']);?>" 
                              class="btn btn-info btn-sm"
                              title="Restore"
                        >
                           <i class="fa fa-reply-all" aria-hidden="true"></i>
                        </a>
                        <a href="<?php echo base_url('admin/force/delete/post/'.$post['id']);?>" 
                              class="btn btn-danger btn-sm"
                              title="Force Delete"
                        >
                              <i class="fas fa-trash" aria-hidden="true"></i>
                        </a>
                     </td>
               </tr>
            <?php endforeach; ?>
 
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 




<?= $this->endsection() ?>

