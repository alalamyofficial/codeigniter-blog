<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<?= $this->include('admin/session_msg') ?>


<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?= base_url('admin/add/user') ?>" class="btn btn-success mb-2">Add User</a>
	</div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered pt-2" id="categories-list">
       <thead>
          <tr>
             <th><i class="fas fa-address-card mr-1" aria-hidden="true"></i>ID</th>
             <th><i class="fas fa-fire mr-1"></i>Name</th>
             <th><i class="fas fa-at mr-1"></i>Email</th>
             <th><i class="fas fa-user mr-1"></i>Role</th>
             <th><i class="fas fa-clock mr-1"></i>Created at</th>
             <th><i class="fas fa-tasks mr-1"></i>Action</th>
          </tr>
       </thead>
       <tbody>
         <?php if($users): ?>
            <?php foreach($users as $user): ?>
               <tr>
                     <td><?php echo $user->id; ?></td>
                     <td><?php echo $user->name; ?></td>
                     <td><?php echo $user->email; ?></td>
                     <td>
                        <?php 
                           if($user->role == 0 ){
                              echo "<b> User </b>";
                           }elseif($user->role == 1 ){
                              echo "<b> Moderator </b>";
                           }elseif($user->role == 2 ){
                              echo "<b> Admin </b>";
                           }else{
                              echo "None";
                           }   
                        ?>
                     </td>
                     <td>
                        <?php 
                           helper('time');
                           echo timeAgo($user->updated_at);           
                        ?>
                     </td>
                     <td>
                        <a href="<?php echo base_url('admin/edit/user/'.$user->id);?>" 
                              class="btn btn-primary btn-sm">
                              Edit
                        </a>
                        <a href="<?php echo base_url('admin/delete/user/'.$user->id);?>" 
                              class="btn btn-danger btn-sm">
                              Delete
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

