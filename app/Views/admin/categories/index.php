<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<?= $this->include('admin/session_msg') ?>

<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?= base_url('admin/add/category') ?>" 
            class="btn btn-success mb-2"
            title="Add"
         >
            <i class="fa fa-plus" aria-hidden="true"></i> 
         </a>
	</div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3 p-2">
     <table class="table table-bordered pt-2" id="categories-list">
       <thead>
          <tr>
             <th><i class="fas fa-address-card mr-1" aria-hidden="true"></i>ID</th>
             <th><i class="fas fa-fire mr-1"></i>Name</th>
             <th><i class="fas fa-user mr-1"></i>User</th>
             <th><i class="fas fa-clock mr-1"></i>Created at</th>
             <th><i class="fas fa-tasks mr-1"></i>Action</th>
          </tr>
       </thead>
       <tbody>
         <?php if($categories): ?>
            <?php foreach($categories as $category): ?>
               <tr>
                     <td><?php echo $category['id']; ?></td>
                     <td><?php echo $category['name']; ?></td>
                     <td><?php echo $category['user_name']; ?></td>
                     <td>
                        <?php 
                           helper('time');
                           echo timeAgo($category['created_at']);           
                        ?>
                     </td>
                     <td>
                        <a href="<?php echo base_url('admin/edit/category/'.$category['id']);?>" 
                              class="btn btn-primary btn-sm"
                              title="Edit"
                        >
                              <i class="fas fa-edit" aria-hidden="true"></i>
                        </a>
                        <a href="<?php echo base_url('admin/delete/category/'.$category['id']);?>" 
                              class="btn btn-danger btn-sm"
                              title="Delete"
                        >
                              <i class="fa fa-trash" aria-hidden="true"></i>
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

